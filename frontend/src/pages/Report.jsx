import React, { useState } from "react";
import Date from "../components/Fields/Date";
import Input from "../components/Fields/Input";
import Select from "../components/Fields/Select";
import Layout from "../components/Layouts/Layout";

const Report = () => {
    const [date, setDate] = useState({
        startDate: null,
        endDate: null,
    });

    const handleDateChange = (newValue) => {
        setDate(newValue);
    };

    return (
        <Layout title="Laporan - Lapmas">
            <section className="pt-10 pb-16">
                <div className="wrapper">
                    <h1 className="text-2xl md:text-3xl font-semibold mb-16">
                        Kirim Laporan
                    </h1>

                    <div className="grid grid-cols-1 lg:grid-cols-[1fr,400px] gap-16">
                        <div>
                            <form className="grid md:grid-cols-2 gap-5">
                                <Select
                                    label="Bentuk Laporan"
                                    className="md:col-span-2 mb-5"
                                    placeholder="Pilih bentuk laporan"
                                    options={[
                                        {
                                            key: "complaint",
                                            value: "Pengaduan",
                                        },
                                        {
                                            key: "aspiration",
                                            value: "Aspirasi",
                                        },
                                        {
                                            key: "information_request",
                                            value: "Permintaan Informasi",
                                        },
                                    ]}
                                />
                                <Input
                                    label="Judul Laporan"
                                    placeholder="Masukan judul laporan . . ."
                                    className="md:col-span-2 mb-5"
                                />
                                <Input
                                    type="textarea"
                                    label="Isi Laporan"
                                    placeholder="Masukan isi laporan . . ."
                                    className="md:col-span-2 mb-5"
                                />
                                <Date
                                    label="Tanggal Laporan"
                                    value={date}
                                    onChange={handleDateChange}
                                    className="mb-5"
                                />
                                <Input
                                    label="Asal Pelapor"
                                    placeholder="Masukan asal pelapor . . ."
                                    className="mb-5"
                                />
                                <Select
                                    label="Kategori Laporan"
                                    className="mb-7 md:col-span-2"
                                    placeholder="Pilih kategori laporan"
                                    options={[
                                        {
                                            key: "religion",
                                            value: "Agama",
                                        },
                                        {
                                            key: "health",
                                            value: "Kesehatan",
                                        },
                                        {
                                            key: "environmental_and_forestry",
                                            value: "Lingkungan Hidup dan Kehutanan",
                                        },
                                    ]}
                                />
                                <div className="flex justify-end md:col-span-2">
                                    <button
                                        type="submit"
                                        className="button bg-blue-600 hover:bg-blue-700 text-white rounded-full"
                                    >
                                        Kirim Laporan
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div className="grid gap-7 pt-5">
                            <div className="w-full h-[300px] bg-gray-300 rounded-md"></div>
                            <div className="w-full h-[300px] bg-gray-300 rounded-md"></div>
                            <div className="w-full h-[300px] bg-gray-300 rounded-md"></div>
                        </div>
                    </div>
                </div>
            </section>
        </Layout>
    );
};

export default Report;
