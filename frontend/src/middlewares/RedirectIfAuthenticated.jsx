import React from "react";
import { useSelector } from "react-redux";
import { Navigate, Outlet } from "react-router-dom";

const RedirectIfAuthenticated = () => {
    const { user } = useSelector(({ auth }) => ({
        user: auth.user,
    }));

    return !user ? <Outlet /> : <Navigate to="/" />;
};

export default RedirectIfAuthenticated;
