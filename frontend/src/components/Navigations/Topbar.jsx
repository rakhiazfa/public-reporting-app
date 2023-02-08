import React from "react";
import TopbarDropdown from "./Topbar/TopbarDropdown";
import TopbarLink from "./Topbar/TopbarLink";
import { AiOutlineMenu } from "react-icons/ai";

const links = [
    {
        content: "Home",
        to: "/",
    },
    {
        content: "Tentang Lapor Pak",
        to: "/about",
    },
    {
        content: "Laporan",
        to: "/report",
    },
];

const Topbar = () => {
    return (
        <header className="topbar">
            <div className="topbar-container">
                <div className="topbar-brand">
                    <img
                        className="logo"
                        src={
                            import.meta.env.VITE_BACKEND_URL +
                            "/assets/images/logo.png"
                        }
                        alt="Logo"
                    />
                    <span className="hidden sm:block text-lg md:text-xl lg:text-2xl font-bold text-blue-600 whitespace-nowrap">
                        LAPOR PAK
                    </span>
                </div>
                <nav className="topbar-center">
                    <ul className="topbar-menu">
                        {links?.map((link, index) => (
                            <li key={index}>
                                <TopbarLink
                                    content={link?.content}
                                    to={link?.to}
                                />
                            </li>
                        ))}
                    </ul>
                </nav>
                <div className="topbar-right">
                    <ul className="topbar-menu">
                        <li>
                            <TopbarDropdown
                                text="Rakhi Azfa Rifansya"
                                items={[
                                    {
                                        content: "Profil Saya",
                                        to: "/profile",
                                    },
                                    {
                                        content: "Logout",
                                        to: "/",
                                    },
                                ]}
                            />
                        </li>
                    </ul>
                </div>
            </div>
        </header>
    );
};

export default Topbar;
