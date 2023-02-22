import React, { useEffect } from "react";
import { Link } from "react-router-dom";
import Topbar from "../Navigations/Topbar";

const Layout = ({ children, title, className }) => {
    useEffect(() => {
        document.title = title;
    }, [title]);

    return (
        <div className={className}>
            <Topbar />

            <main>{children}</main>

            <footer className="pb-20 lg:pb-0 mt-16">
                <div className="wrapper lg:border-t py-10">
                    <p className="text-sm lg:text-base text-center">
                        Copyright &copy; {new Date().getFullYear()} by{" "}
                        <Link
                            className="text-blue-500"
                            to="https://rakhiazfa.netlify.app/"
                            target="_blank"
                        >
                            Rakhi Azfa Rifansya
                        </Link>
                    </p>
                </div>
            </footer>
        </div>
    );
};

export default Layout;
