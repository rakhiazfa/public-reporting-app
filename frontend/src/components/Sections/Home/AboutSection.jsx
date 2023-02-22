import React from "react";
import { FcAbout } from "react-icons/fc";

const AboutSection = () => {
    return (
        <section id="about">
            <div className="wrapper">
                <h1 className="text-[clamp(1.5rem,8vw,3rem)] font-bold max-w-[450px] mb-20 lg:mb-24">
                    Tentang LAPMAS
                </h1>
                <div className="mb-10 lg:mb-36">
                    <div className="grid grid-cols-1 lg:grid-cols-[450px,1fr] items-center gap-10">
                        <div className="hidden lg:block">
                            <FcAbout className="text-[20rem] mx-auto" />
                        </div>
                        <div>
                            <h1 className="text-2xl md:text-3xl font-semibold mb-7">
                                - Apa Itu Lapmas?
                            </h1>
                            <p className="text-gray-500 font-medium leading-7 lg:leading-9">
                                Lapmas adalah aplikasi layanan masyarakat yang
                                berfokus pada keluhan, aspirasi, dan permintaan
                                informasi dari masyarakat yang nantinya akan
                                ditindaklanjuti oleh instansi pemerintahan.
                            </p>
                        </div>
                    </div>
                </div>
                <div>
                    <h1 className="text-2xl md:text-3xl font-semibold mb-14 lg:mb-24">
                        - Cara Kerja
                    </h1>
                    <ul className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-16">
                        <li className="flex flex-col gap-5 items-center">
                            <svg
                                stroke="currentColor"
                                fill="currentColor"
                                strokeWidth="0"
                                viewBox="0 0 24 24"
                                className="text-5xl md:text-6xl text-blue-600"
                                height="1em"
                                width="1em"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="m21.555 8.168-9-6a1 1 0 0 0-1.109 0l-9 6A1 1 0 0 0 2 9v11c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V9c0-.334-.167-.646-.445-.832zM12 4.202 19.197 9 12 13.798 4.803 9 12 4.202zM4 20v-9.131l7.445 4.963a1 1 0 0 0 1.11 0L20 10.869 19.997 20H4z"></path>
                            </svg>
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
                            <svg
                                stroke="currentColor"
                                fill="currentColor"
                                strokeWidth="0"
                                viewBox="0 0 24 24"
                                className="text-5xl md:text-6xl text-blue-600"
                                height="1em"
                                width="1em"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M2.002 9.63c-.023.411.207.794.581.966l7.504 3.442 3.442 7.503c.164.356.52.583.909.583l.057-.002a1 1 0 0 0 .894-.686l5.595-17.032c.117-.358.023-.753-.243-1.02s-.66-.358-1.02-.243L2.688 8.736a1 1 0 0 0-.686.894zm16.464-3.971-4.182 12.73-2.534-5.522a.998.998 0 0 0-.492-.492L5.734 9.841l12.732-4.182z"></path>
                            </svg>
                            <div className="text-center">
                                <h3 className="font-medium mb-3">
                                    2. Verifikasi
                                </h3>
                                <p className="text-sm text-gray-500 font-medium">
                                    Laporan akan diverifikasi terlebih dahulu
                                    dan akan dilanjutkan kepada instansi.
                                </p>
                            </div>
                        </li>
                        <li className="flex flex-col gap-5 items-center">
                            <svg
                                stroke="currentColor"
                                fill="currentColor"
                                strokeWidth="0"
                                viewBox="0 0 24 24"
                                className="text-5xl md:text-6xl text-blue-600"
                                height="1em"
                                width="1em"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M5 2c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h3.586L12 21.414 15.414 18H19c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2H5zm14 14h-4.414L12 18.586 9.414 16H5V4h14v12z"></path>
                                <path d="M7 7h10v2H7zm0 4h7v2H7z"></path>
                            </svg>
                            <div className="text-center">
                                <h3 className="font-medium mb-3">
                                    3. Memberi Tanggapan
                                </h3>
                                <p className="text-sm text-gray-500 font-medium">
                                    Instansi akan memberikan tanggapan terhadap
                                    laporan yang dikirim.
                                </p>
                            </div>
                        </li>
                        <li className="flex flex-col gap-5 items-center">
                            <svg
                                stroke="currentColor"
                                fill="currentColor"
                                strokeWidth="0"
                                viewBox="0 0 24 24"
                                className="text-5xl md:text-6xl text-blue-600"
                                height="1em"
                                width="1em"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path>
                                <path d="M9.999 13.587 7.7 11.292l-1.412 1.416 3.713 3.705 6.706-6.706-1.414-1.414z"></path>
                            </svg>
                            <div className="text-center">
                                <h3 className="font-medium mb-3">4. Selesai</h3>
                                <p className="text-sm text-gray-500 font-medium">
                                    Laporan sudah berhasil ditindaklanjuti.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    );
};

export default AboutSection;
