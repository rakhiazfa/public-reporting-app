import React from "react";
import { Route, Routes } from "react-router-dom";
import About from "../pages/About";
import Home from "../pages/Home";
import Report from "../pages/Report";
import SignIn from "../pages/SignIn";
import SignUp from "../pages/SignUp";

const Router = () => {
    return (
        <Routes>
            <Route index element={<Home />} loading />
            <Route path="about" element={<About />} loading />
            <Route path="report" element={<Report />} loading />
            <Route path="signin" element={<SignIn />} loading />
            <Route path="signup" element={<SignUp />} loading />
        </Routes>
    );
};

export default Router;
