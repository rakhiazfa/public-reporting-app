import React from "react";

const PageLoader = () => {
    return (
        <div>
            <div className="wrapper min-h-screen flex justify-center items-center">
                <div className="flex flex-col items-center text-center">
                    <img
                        className="w-[150px] mb-10 animate-bounce"
                        src={
                            import.meta.env.VITE_BACKEND_URL +
                            "/assets/images/logo.png"
                        }
                        alt="Logo"
                    />
                    <p className="text-lg font-medium text-gray-500">
                        Mohon tunggu beberapa saat . . .
                    </p>
                </div>
            </div>
        </div>
    );
};

export default PageLoader;
