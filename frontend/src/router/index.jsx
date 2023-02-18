import React from "react";
import { Route, Routes } from "react-router-dom";
import Authenticate from "../middlewares/Authenticate";
import RedirectIfAuthenticated from "../middlewares/RedirectIfAuthenticated";
import About from "../pages/About";
import Home from "../pages/Home";
import Profile from "../pages/Profile";
import Report from "../pages/Report";
import SignIn from "../pages/SignIn";
import SignUp from "../pages/SignUp";

const Router = () => {
    return (
        <Routes>
            <Route index element={<Home />} />
            <Route path="about" element={<About />} />
            <Route path="report" element={<Report />} />
            <Route element={<Authenticate />}>
                <Route path="profile" element={<Profile />} />
            </Route>
            <Route element={<RedirectIfAuthenticated />}>
                <Route path="signin" element={<SignIn />} />
                <Route path="signup" element={<SignUp />} />
            </Route>
        </Routes>
    );
};

export default Router;
