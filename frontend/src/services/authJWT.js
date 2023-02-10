import axios from "axios";

/**
 * Auth JWT.
 *
 */

const authJWT = axios.create({
    baseURL: import.meta.env.VITE_BACKEND_API,
    headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
    },
});

authJWT.interceptors.request.use((config) => {
    const token = localStorage.getItem("at") ?? false;

    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }

    return config;
});

export default authJWT;
