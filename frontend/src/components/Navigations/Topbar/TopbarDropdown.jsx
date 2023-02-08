import React, { useRef, useState } from "react";
import { Link } from "react-router-dom";
import { IoMdArrowDropdown } from "react-icons/io";
import useClickOutside from "../../../hooks/useClickOutside";

const TopbarDropdown = ({ text, items }) => {
    const dropdownRef = useRef(null);

    const [isActive, setIsActive] = useState(false);

    useClickOutside(dropdownRef, () => setIsActive(false));

    return (
        <div className="dropdown" ref={dropdownRef}>
            <button
                type="button"
                className="dropdown-toggler"
                onClick={() => setIsActive(!isActive)}
            >
                <span className="text-smd md:text-base font-medium whitespace-nowrap">
                    {text}
                </span>
                <IoMdArrowDropdown className="text-xl" />
            </button>
            <ul className={`dropdown-menu ${isActive ? "active" : ""}`}>
                {items?.map((item, index) => (
                    <li key={index}>
                        <Link className="topbar-link" to={item?.to}>
                            {item?.content}
                        </Link>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default TopbarDropdown;
