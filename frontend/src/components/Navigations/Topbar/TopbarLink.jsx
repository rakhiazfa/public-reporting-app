import React from "react";
import { NavLink } from "react-router-dom";

const TopbarLink = ({ content, to, icon: Icon }) => {
    return (
        <NavLink
            className={({ isActive }) =>
                isActive ? "topbar-link active" : "topbar-link"
            }
            to={to}
        >
            {Icon && <Icon className="block lg:hidden text-2xl" />}
            <span>{content}</span>
        </NavLink>
    );
};

export default TopbarLink;
