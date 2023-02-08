import React, { useEffect } from "react";
import "../../styles/guest.css";
import Topbar from "../Navigations/Topbar";

const Layout = ({ children, title, className }) => {
    useEffect(() => {
        document.title = title;
    }, [title]);

    return (
        <div className={className}>
            <Topbar />

            <main>{children}</main>
        </div>
    );
};

export default Layout;
