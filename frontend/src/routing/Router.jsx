import React, { useEffect } from "react";
import { Route, Routes, useLocation } from "react-router-dom";
import GuestMiddleware from "../middlewares/GuestMiddleware";
import SignIn from "../pages/Auth/SignIn";
import SignUp from "../pages/Auth/SignUp";
import Home from "../pages/Home";
import Report from "../pages/Report";

const Router = () => {
    const { pathname, hash, key } = useLocation();

    useEffect(() => {
        if (hash === "") {
            window.scrollTo(0, 0);
        } else {
            setTimeout(() => {
                const id = hash.replace("#", "");
                const element = document.getElementById(id);

                if (element) {
                    element.scrollIntoView();
                }
            }, 0);
        }
    }, [pathname, hash, key]);

    return (
        <Routes>
            <Route index element={<Home />} />
            <Route path="report" element={<Report />} />
            <Route element={<GuestMiddleware />}>
                <Route path="auth/signup" element={<SignUp />} />
                <Route path="auth/signin" element={<SignIn />} />
            </Route>
        </Routes>
    );
};

export default Router;
