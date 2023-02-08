import React from "react";
import Layout from "../components/Layouts/Layout";
import {
    BiMessageAltDetail,
    BiCheckCircle,
    BiEnvelopeOpen,
    BiNavigation,
} from "react-icons/bi";

const About = () => {
    return (
        <Layout title="Tentang Lapmas - Lapmas">
            <section className="pt-10 pb-16 md:pt-16">
                <div className="wrapper">
                    <div className="mb-10">
                        <h1 className="text-2xl md:text-3xl font-semibold mb-7">
                            Apa Itu Lapmas?
                        </h1>
                        <p className="text-base md:text-lg text-gray-500 font-medium leading-7 lg:leading-9">
                            Lapmas adalah aplikasi layanan masyarakat yang
                            berfokus pada keluhan, aspirasi, dan permintaan
                            informasi dari masyarakat yang nantinya akan
                            ditindaklanjuti oleh instansi pemerintahan.
                        </p>
                    </div>
                    <div className="mb-10">
                        <h1 className="text-2xl md:text-3xl font-semibold mb-7">
                            Fitur Yang Tersedia
                        </h1>
                        <ul>
                            <li>
                                <p className="text-base md:text-lg text-gray-500 font-medium leading-7 lg:leading-10">
                                    &emsp;&emsp;&emsp; 1. Mengirim laporan
                                    secara anonim.
                                </p>
                            </li>
                            <li>
                                <p className="text-base md:text-lg text-gray-500 font-medium leading-7 lg:leading-10">
                                    &emsp;&emsp;&emsp; 2. Pelacakan ID Laporan.
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h1 className="text-2xl md:text-3xl font-semibold mb-16">
                            Cara Kerja
                        </h1>
                        <ul className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-16">
                            <li className="flex flex-col gap-5 items-center">
                                <BiEnvelopeOpen className="text-5xl md:text-6xl text-blue-600" />
                                <div className="text-center">
                                    <h3 className="font-medium mb-2">
                                        1. Membuat Laporan
                                    </h3>
                                    <p className="text-sm text-gray-500 font-medium">
                                        Sampaikan laporan sedetail mungkin, lalu
                                        kirim laporan tersebut.
                                    </p>
                                </div>
                            </li>
                            <li className="flex flex-col gap-5 items-center">
                                <BiNavigation className="text-5xl md:text-6xl text-blue-600" />
                                <div className="text-center">
                                    <h3 className="font-medium mb-3">
                                        2. Verifikasi
                                    </h3>
                                    <p className="text-sm text-gray-500 font-medium">
                                        Laporan akan diverifikasi terlebih
                                        dahulu dan akan dilanjutkan kepada
                                        instansi.
                                    </p>
                                </div>
                            </li>
                            <li className="flex flex-col gap-5 items-center">
                                <BiMessageAltDetail className="text-5xl md:text-6xl text-blue-600" />
                                <div className="text-center">
                                    <h3 className="font-medium mb-3">
                                        3. Memberi Tanggapan
                                    </h3>
                                    <p className="text-sm text-gray-500 font-medium">
                                        Instansi akan memberikan tanggapan
                                        terhadap laporan yang dikirim.
                                    </p>
                                </div>
                            </li>
                            <li className="flex flex-col gap-5 items-center">
                                <BiCheckCircle className="text-5xl md:text-6xl text-blue-600" />
                                <div className="text-center">
                                    <h3 className="font-medium mb-3">
                                        4. Selesai
                                    </h3>
                                    <p className="text-sm text-gray-500 font-medium">
                                        Laporan sudah berhasil ditindaklanjuti.
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </Layout>
    );
};

export default About;
