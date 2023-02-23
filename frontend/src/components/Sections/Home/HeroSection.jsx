import React from "react";
import { Link } from "react-router-dom";
import heroImage from "../../../assets/images/illustrations/hero-image.svg";

const HeroSection = () => {
    return (
        <section>
            <div className="wrapper">
                <div className="grid grid-cols-1 lg:grid-cols-2 items-center gap-10">
                    <div className="order-2 lg:order-1">
                        <h1 className="text-[clamp(1.5rem,8vw,3rem)] font-bold max-w-[450px] mb-5">
                            Selamat datang di LAPMAS
                        </h1>
                        <p className="text-lg text-gray-400 font-normal mb-5">
                            Sigap dalam menangani laporan anda.
                        </p>
                        <Link
                            className="button bg-blue-600 hover:bg-blue-700 text-white rounded-full"
                            to="/reports"
                        >
                            Sampaikan Laporan Anda
                        </Link>
                    </div>
                    <img
                        className="order-1 lg:order-2"
                        src={heroImage}
                        alt="Hero Image"
                    />
                </div>
            </div>
        </section>
    );
};

export default HeroSection;
