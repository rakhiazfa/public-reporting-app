import React, { useEffect } from "react";
import { Route, Routes, useLocation } from "react-router-dom";
import AuthMiddleware from "../middlewares/AuthMiddleware";
import GuestMiddleware from "../middlewares/GuestMiddleware";
import SignIn from "../pages/Auth/SignIn";
import SignUp from "../pages/Auth/SignUp";
import NotFound from "../pages/Errors/NotFound";
import Home from "../pages/Home";
import MyReport from "../pages/MyReport";
import MyReportDetail from "../pages/MyReportDetail";
import Report from "../pages/Report";
import ReportDetail from "../pages/ReportDetail";

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
            <Route path="reports">
                <Route index element={<Report />} />
                <Route path=":slug" element={<ReportDetail />} />
            </Route>
            <Route element={<GuestMiddleware />}>
                <Route path="auth/signup" element={<SignUp />} />
                <Route path="auth/signin" element={<SignIn />} />
            </Route>
            <Route path=":username">
                <Route index element={<NotFound />} />
                <Route path="reports" element={<AuthMiddleware />}>
                    <Route index element={<MyReport />} />
                    <Route path=":slug" element={<MyReportDetail />} />
                </Route>
            </Route>
            <Route path="404" element={<NotFound />} />
            <Route path="*" element={<NotFound />} />
        </Routes>
    );
};

export default Router;
