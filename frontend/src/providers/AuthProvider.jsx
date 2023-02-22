import axios from "axios";
import { createContext, useEffect, useState } from "react";

/**
 * Setup axios jwt.
 *
 */

const axiosJWT = axios.create({
    baseURL: import.meta.env.VITE_BACKEND_API,
    headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
    },
});

axiosJWT.interceptors.request.use((config) => {
    const token = localStorage.getItem("at") ?? null;

    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }

    return config;
});

/**
 * Auth context.
 *
 */

export const AuthContext = createContext();

/**
 * Auth provider.
 *
 */

export default function AuthProvider({ children }) {
    const [pending, setPending] = useState(true);

    const [loading, setLoading] = useState(false);
    const [errors, setErrors] = useState(null);

    const [user, setUser] = useState(null);

    const login = async (payload) => {
        setErrors(null);
        setLoading(true);

        try {
            const { data } = await axios.post("/auth/login", payload);

            localStorage.setItem("at", data?.token);

            setUser(data?.user);
        } catch (error) {
            setErrors(error.response.data.errors);
        } finally {
            setLoading(false);
        }
    };

    const register = async (payload) => {
        setErrors(null);
        setLoading(true);

        try {
            const { data } = await axios.post("/societies", payload);

            login({
                email_or_username: payload?.email,
                password: payload?.password,
            });
        } catch (error) {
            setErrors(error.response.data.errors);
        } finally {
            setLoading(false);
        }
    };

    const logout = async () => {
        setLoading(true);

        try {
            await axiosJWT.post("/auth/logout");

            localStorage.removeItem("at");

            setUser(null);
        } catch (_) {
        } finally {
            setLoading(false);

            window.location.reload();
        }
    };

    const getUser = async () => {
        try {
            const { data } = await axiosJWT.get("/user");

            setUser(data?.user);
        } catch (_) {
        } finally {
            setTimeout(() => setPending(false), 1000);
        }
    };

    useEffect(() => {
        getUser();
    }, []);

    const values = {
        pending,
        user,
        setUser,
        login,
        register,
        logout,
        loading,
        errors,
        setErrors,
    };

    return (
        <AuthContext.Provider value={values}>{children}</AuthContext.Provider>
    );
}
