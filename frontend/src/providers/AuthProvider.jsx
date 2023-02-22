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
    const [user, setUser] = useState(null);

    const getUser = async () => {
        try {
            const { data } = await axiosJWT.get("/user");

            setUser(data?.user);
        } catch (_) {
        } finally {
            setPending(false);
        }
    };

    useEffect(() => {
        getUser();
    }, []);

    const values = {
        pending,
        user,
        setUser,
    };

    return (
        <AuthContext.Provider value={values}>{children}</AuthContext.Provider>
    );
}
