import React from "react";
import { Link } from "react-router-dom";
import Layout from "../components/Layouts/Layout";

const Home = () => {
    return (
        <Layout title="Lapmas - Home">
            <section className="py-16">
                <div className="wrapper">
                    <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                        <div className="order-2 lg:order-1">
                            <h1 className="text-[clamp(1.5rem,8vw,3rem)] font-bold max-w-[450px] mb-5">
                                Selamat datang di{" "}
                                <span className="text-blue-600 font-bold">
                                    LAPMAS
                                </span>
                            </h1>
                            <p className="text-lg text-gray-400 font-medium mb-7">
                                Cepat dalam menangani laporan anda.
                            </p>
                            <Link
                                className="button bg-blue-600 hover:bg-blue-700 text-white rounded-full"
                                to="/report"
                            >
                                Sampaikan Laporan Anda
                            </Link>
                        </div>
                        <img
                            className="w-[400px] order-1 lg:order-2"
                            src={
                                import.meta.env.VITE_BACKEND_URL +
                                "/assets/images/hero-image.svg"
                            }
                            alt="Hero Image"
                        />
                    </div>
                </div>
            </section>
        </Layout>
    );
};

export default Home;
