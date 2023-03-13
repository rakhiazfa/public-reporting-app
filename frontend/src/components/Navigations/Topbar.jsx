import React, { useContext, useState } from "react";
import TopbarDropdown from "./Topbar/TopbarDropdown";
import TopbarLink from "./Topbar/TopbarLink";
import { FcHome, FcAbout, FcDocument } from "react-icons/fc";
import { Link } from "react-router-dom";
import logo from "../../assets/images/logo.png";
import { AuthContext } from "../../providers/AuthProvider";

const links = [
    {
        content: "Home",
        to: "/",
        icon: FcHome,
    },
    {
        content: "Tentang Lapmas",
        to: {
            pathname: "/",
            hash: "#about",
        },
        icon: FcAbout,
    },
    {
        content: "Laporan",
        to: "/reports",
        icon: FcDocument,
    },
];

const Topbar = () => {
    const { user, logout, loading } = useContext(AuthContext);

    //

    return (
        <header className="topbar">
            <div className="topbar-container">
                <Link className="topbar-brand" to="/">
                    <img className="logo" src={logo} alt="Logo" />
                    <span
                        className="
                            hidden sm:block text-lg md:text-xl lg:text-2xl 
                            font-bold text-blue-600 whitespace-nowrap
                        "
                    >
                        LAPMAS
                    </span>
                </Link>
                <nav className="topbar-center">
                    <ul className="topbar-menu">
                        {links?.map((link, index) => (
                            <li key={index}>
                                <TopbarLink
                                    content={link?.content}
                                    to={link?.to}
                                    icon={link?.icon}
                                />
                            </li>
                        ))}
                    </ul>
                </nav>
                <div className="topbar-right">
                    <ul className="flex items-center gap-7">
                        {user ? (
                            <li>
                                <TopbarDropdown
                                    text={user?.name}
                                    items={[
                                        {
                                            content: "Laporan Saya",
                                            to: `/${user?.username}/reports`,
                                        },
                                        {
                                            type: "button",
                                            content: "Logout",
                                            onClick: logout,
                                            disabled: loading,
                                        },
                                    ]}
                                />
                            </li>
                        ) : (
                            <>
                                <li>
                                    <Link to="/auth/signin">Masuk</Link>
                                </li>
                                <li>
                                    <Link to="/auth/signup">Daftar</Link>
                                </li>
                            </>
                        )}
                    </ul>
                </div>
            </div>
        </header>
    );
};

export default Topbar;
