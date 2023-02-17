import React, { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import Date from "../components/Fields/Date";
import File from "../components/Fields/File";
import Input from "../components/Fields/Input";
import Select from "../components/Fields/Select";
import Layout from "../components/Layouts/Layout";
import { getAgencies } from "../features/agency/agencyActions";
import { getReportCategories } from "../features/report_category/reportCategoryActions";

const reportTypes = [
    { value: 1, label: "Pengaduan" },
    { value: 2, label: "Aspirasi" },
    { value: 3, label: "Permintaan Informasi" },
];

const Report = () => {
    const [reportDate, setReportDate] = useState({
        startDate: null,
        endDate: null,
    });
    const [reportTitle, setReportTitle] = useState("");
    const [reportContent, setReportContent] = useState("");
    const [reportingOrigin, setReportingOrigin] = useState("");
    const [reportType, setReportType] = useState();
    const [destinationAgency, setDestinationAgency] = useState();
    const [reportCategory, setReportCategory] = useState();
    const [attachment, setAttachment] = useState("");

    const { reportCategories, agencies } = useSelector(
        ({ reportCategory, agency }) => ({
            reportCategories: reportCategory.reportCategories,
            agencies: agency.agencies,
        })
    );

    const dispatch = useDispatch();

    const handleDateChange = (newValue) => {
        setReportDate(newValue);
    };

    const handleFileChange = (e) => {
        if (e.target.files) {
            setAttachment(e.target.files[0]);
        }
    };

    const handleSendReport = (e) => {
        e.preventDefault();

        console.log({
            reportType,
            reportTitle,
            reportContent,
            reportDate,
            reportingOrigin,
            destinationAgency,
            reportCategory,
            attachment,
        });
    };

    useEffect(() => {
        return () => {
            dispatch(getReportCategories());
            dispatch(getAgencies());
        };
    }, [dispatch]);

    return (
        <Layout title="Laporan - Lapmas">
            <section className="pt-10 pb-16">
                <div className="wrapper">
                    <h1 className="text-2xl md:text-3xl font-semibold mb-16">
                        Kirim Laporan
                    </h1>

                    <div className="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-16">
                        <div className="md:col-span-2 lg:row-span-2">
                            <form
                                className="grid md:grid-cols-2 gap-7"
                                onSubmit={handleSendReport}
                            >
                                <Select
                                    label="Bentuk Laporan"
                                    options={reportTypes}
                                    onChange={(type) =>
                                        setReportType(type.value)
                                    }
                                    className="md:col-span-2 mb-3"
                                    placeholder="Pilih bentuk laporan . . ."
                                />
                                <Input
                                    label="Judul Laporan"
                                    value={reportTitle}
                                    onChange={(e) =>
                                        setReportTitle(e.target.value)
                                    }
                                    placeholder="Masukan judul laporan . . ."
                                    className="md:col-span-2 mb-3"
                                />
                                <Input
                                    type="textarea"
                                    label="Isi Laporan"
                                    value={reportContent}
                                    onChange={(e) =>
                                        setReportContent(e.target.value)
                                    }
                                    placeholder="Masukan isi laporan . . ."
                                    className="md:col-span-2 mb-3"
                                />
                                <Date
                                    label="Tanggal Laporan"
                                    value={reportDate}
                                    onChange={handleDateChange}
                                    className="mb-3"
                                />
                                <Input
                                    label="Asal Pelapor"
                                    value={reportingOrigin}
                                    onChange={(e) =>
                                        setReportingOrigin(e.target.value)
                                    }
                                    placeholder="Masukan asal pelapor . . ."
                                    className="mb-3"
                                />
                                <Select
                                    label="Kategori Laporan"
                                    options={reportCategories?.reduce(
                                        (prev, next) => {
                                            prev.push({
                                                value: next?.id,
                                                label: next?.name,
                                                options:
                                                    next?.report_subcategories?.reduce(
                                                        (prev, next) => {
                                                            prev.push({
                                                                value: next?.id,
                                                                label: next?.name,
                                                            });

                                                            return prev;
                                                        },
                                                        []
                                                    ),
                                            });

                                            return prev;
                                        },
                                        []
                                    )}
                                    onChange={(type) =>
                                        setReportCategory(type.value)
                                    }
                                    className="mb-3"
                                    placeholder="Pilih kategori laporan . . ."
                                />
                                <Select
                                    label="Instansi Tujuan"
                                    options={agencies?.reduce((prev, next) => {
                                        prev.push({
                                            value: next?.id,
                                            label: next?.name,
                                        });

                                        return prev;
                                    }, [])}
                                    onChange={(type) =>
                                        setDestinationAgency(type.value)
                                    }
                                    className="mb-3"
                                    placeholder="Pilih instansi tujuan . . ."
                                />
                                <File
                                    label="Lapiran"
                                    className="md:col-span-2 mb-3"
                                    onChange={handleFileChange}
                                    help={"PDF (MAX 2MB)"}
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
                        <div className="w-full h-[300px] bg-gray-200 rounded-sm"></div>
                        <div className="w-full h-[300px] bg-gray-200 rounded-sm"></div>
                        <div className="w-full h-[300px] bg-gray-200 rounded-sm"></div>
                        <div className="w-full h-[300px] bg-gray-200 rounded-sm"></div>
                        <div className="w-full h-[300px] bg-gray-200 rounded-sm"></div>
                    </div>
                </div>
            </section>
        </Layout>
    );
};

export default Report;
