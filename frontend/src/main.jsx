import React from "react";
import ReactDOM from "react-dom/client";
import "./styles/globals.css";
import App from "./App";
import { BrowserRouter } from "react-router-dom";
import axios from "axios";

/**
 * Setup axios.
 *
 */

axios.defaults.baseURL = import.meta.env.VITE_BACKEND_API;

ReactDOM.createRoot(document.getElementById("root")).render(
    <React.StrictMode>
        <BrowserRouter>
            <App />
        </BrowserRouter>
    </React.StrictMode>
);
