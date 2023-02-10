import React from "react";
import loadingImage from "../../assets/images/loading.svg";

const PageLoader = () => {
    return (
        <div>
            <div className="wrapper min-h-screen flex justify-center items-center">
                <div className="flex flex-col items-center text-center">
                    <img
                        className="w-[150px] mb-10"
                        src={loadingImage}
                        alt="Logo"
                    />
                </div>
            </div>
        </div>
    );
};

export default PageLoader;
