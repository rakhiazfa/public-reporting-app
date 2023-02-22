import axios from "axios";
import React from "react";
import ReactDOM from "react-dom/client";
import { BrowserRouter } from "react-router-dom";
import "./styles/globals.css";
import App from "./App";
import AuthProvider from "./providers/AuthProvider";

/**
 * Setup axios.
 *
 */

axios.defaults.baseURL = import.meta.env.VITE_BACKEND_API;

/**
 * Render application.
 *
 */

ReactDOM.createRoot(document.getElementById("root")).render(
    <React.StrictMode>
        <BrowserRouter>
            <AuthProvider>
                <App />
            </AuthProvider>
        </BrowserRouter>
    </React.StrictMode>
);
