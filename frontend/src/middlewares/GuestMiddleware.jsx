import React, { useContext } from "react";
import { Navigate, Outlet } from "react-router-dom";
import { AuthContext } from "../providers/AuthProvider";

const GuestMiddleware = () => {
    const { user } = useContext(AuthContext);

    return user ? <Navigate to="/" /> : <Outlet />;
};

export default GuestMiddleware;
