import React from "react";
import { IoIosArrowBack } from "react-icons/io";
import { useNavigate } from "react-router-dom";

const BackButton = () => {
    const navigate = useNavigate();

    return (
        <div className="wrapper pt-10">
            <button
                className="button bg-blue-500 hover:bg-blue-600 text-white p-3"
                onClick={() => navigate(-1)}
            >
                <IoIosArrowBack className="text-2xl" />
            </button>
        </div>
    );
};

export default BackButton;
