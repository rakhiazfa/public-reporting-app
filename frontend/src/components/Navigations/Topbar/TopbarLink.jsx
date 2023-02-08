import React from "react";
import { NavLink } from "react-router-dom";

const TopbarLink = ({ content, to }) => {
    return (
        <NavLink
            className={({ isActive }) =>
                isActive ? "topbar-link active" : "topbar-link"
            }
            to={to}
        >
            {content}
        </NavLink>
    );
};

export default TopbarLink;
