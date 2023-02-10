import React from "react";
import { Route, Routes } from "react-router-dom";
import RedirectIfAuthenticated from "../middlewares/RedirectIfAuthenticated";
import About from "../pages/About";
import Home from "../pages/Home";
import Report from "../pages/Report";
import SignIn from "../pages/SignIn";
import SignUp from "../pages/SignUp";

const Router = () => {
    return (
        <Routes>
            <Route index element={<Home />} />
            <Route path="about" element={<About />} />
            <Route path="report" element={<Report />} />
            <Route element={<RedirectIfAuthenticated />}>
                <Route path="signin" element={<SignIn />} />
                <Route path="signup" element={<SignUp />} />
            </Route>
        </Routes>
    );
};

export default Router;
