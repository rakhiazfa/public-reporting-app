import React, { useContext } from "react";
import { Navigate, Outlet } from "react-router-dom";
import { AuthContext } from "../providers/AuthProvider";

const AuthMiddleware = () => {
    const { user } = useContext(AuthContext);

    return !user ? <Navigate to="/auth/signin" /> : <Outlet />;
};

export default AuthMiddleware;
