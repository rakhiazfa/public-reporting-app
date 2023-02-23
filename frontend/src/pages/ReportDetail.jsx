import axios from "axios";
import React, { useEffect, useState } from "react";
import nl2br from "react-nl2br";
import { Link, useParams } from "react-router-dom";
import Layout from "../components/Layouts/Layout";

export default function ReportDetail() {
    const { slug } = useParams();

    const [report, setReport] = useState({});

    const getSocietyReportBySlug = async (slug) => {
        try {
            const { data } = await axios.get(`/society-reports/${slug}`);

            setReport(data?.society_report);
        } catch (_) {}
    };

    useEffect(() => {
        getSocietyReportBySlug(slug);
    }, [slug]);

    return (
        <Layout title={`${report?.title} - Lapmas`}>
            <section>
                <div className="wrapper">
                    <div className="flex items-center gap-5 mb-7">
                        <div className="w-[45px] h-[45px] bg-gray-400 rounded-full"></div>
                        <div>
                            <span className="block mb-1">
                                {report?.author?.name}
                            </span>
                            <p className="text-xs">{report?.date}</p>
                        </div>
                    </div>
                    <div>
                        <h1 className="text-xl lg:text-3xl font-bold mb-7">
                            {report?.title}
                        </h1>
                        <p className="mb-5">{nl2br(report?.body)}</p>
                        <Link
                            className="text-blue-500 hover:underline"
                            target="_blank"
                            to={
                                import.meta.env.VITE_BACKEND_URL +
                                "/storage/" +
                                report?.attachment
                            }
                        >
                            Lampiran
                        </Link>
                    </div>
                </div>
            </section>
        </Layout>
    );
}
