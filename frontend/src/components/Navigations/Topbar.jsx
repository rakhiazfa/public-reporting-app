import React from "react";
import TopbarDropdown from "./Topbar/TopbarDropdown";
import TopbarLink from "./Topbar/TopbarLink";
import { FcHome, FcAbout, FcDocument } from "react-icons/fc";
import { useDispatch, useSelector } from "react-redux";
import { Link } from "react-router-dom";
import { logout } from "../../features/auth/authActions";

const links = [
    {
        content: "Home",
        to: "/",
        icon: FcHome,
    },
    {
        content: "Tentang Lapmas",
        to: "/about",
        icon: FcAbout,
    },
    {
        content: "Laporan",
        to: "/report",
        icon: FcDocument,
    },
];

const Topbar = () => {
    const { user } = useSelector(({ auth }) => ({
        user: auth.user,
    }));

    const dispatch = useDispatch();

    const handleLogout = () => {
        dispatch(logout());
    };

    return (
        <header className="topbar">
            <div className="topbar-container">
                <Link className="topbar-brand" to="/">
                    <img
                        className="logo"
                        src={
                            import.meta.env.VITE_BACKEND_URL +
                            "/assets/images/logo.png"
                        }
                        alt="Logo"
                    />
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
                                            content: "Profil Saya",
                                            to: "/profile",
                                        },
                                        {
                                            type: "button",
                                            content: "Logout",
                                            onClick: handleLogout,
                                        },
                                    ]}
                                />
                            </li>
                        ) : (
                            <>
                                <li>
                                    <Link to="/signin">Masuk</Link>
                                </li>
                                <li>
                                    <Link to="/signup">Daftar</Link>
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
