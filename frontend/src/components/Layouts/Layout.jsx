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

            <main className="pb-20 lg:pb-0">{children}</main>
        </div>
    );
};

export default Layout;
