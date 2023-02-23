import axios from "axios";
import React, { useEffect, useState } from "react";
import nl2br from "react-nl2br";
import { Link, useNavigate, useParams } from "react-router-dom";
import ReactShowMoreText from "react-show-more-text";
import Layout from "../components/Layouts/Layout";
import BackButton from "../components/Navigations/BackButton";
import avatar from "../assets/images/avatar.jpg";

export default function ReportDetail() {
    const { slug } = useParams();

    //

    const [report, setReport] = useState(null);

    //

    const navigate = useNavigate();

    //

    const getSocietyReportBySlug = async (slug) => {
        try {
            const { data } = await axios.get(`/society-reports/${slug}`);

            setReport(data?.society_report);
        } catch (_) {
            navigate("/404");
        }
    };

    useEffect(() => {
        getSocietyReportBySlug(slug);
    }, [slug]);

    return (
        <Layout title={`${report?.title} - Lapmas`}>
            <BackButton />
            <section>
                <div className="wrapper">
                    {report ? (
                        <div>
                            <div className="flex items-center gap-5 mb-10">
                                <div className="w-[50px] h-[50px] bg-gray-400 rounded-full">
                                    <img
                                        className="rounded-full"
                                        src={avatar}
                                        alt="Avatar Image"
                                    />
                                </div>
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
                                <ReactShowMoreText
                                    lines={10}
                                    className="text-sm mb-10"
                                    anchorClass="text-blue-500 hover:underline cursor-pointer"
                                    children={nl2br(report?.body + "\n\n")}
                                ></ReactShowMoreText>
                                <div className="flex items-center gap-20">
                                    <p className="text-gray-400">
                                        {report?.ticket_id}
                                    </p>
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
                        </div>
                    ) : (
                        <>Loading . . .</>
                    )}
                </div>
            </section>
        </Layout>
    );
}
