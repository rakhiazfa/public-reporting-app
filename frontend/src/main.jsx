import React from "react";
import ReactDOM from "react-dom/client";
import "./styles/globals.css";
import { BrowserRouter } from "react-router-dom";
import { Provider } from "react-redux";
import App from "./App";
import axios from "axios";
import store from "./store";

/**
 * Setup axios.
 *
 */

axios.defaults.baseURL = import.meta.env.VITE_BACKEND_API;

ReactDOM.createRoot(document.getElementById("root")).render(
    <React.StrictMode>
        <BrowserRouter>
            <Provider store={store}>
                <App />
            </Provider>
        </BrowserRouter>
    </React.StrictMode>
);
