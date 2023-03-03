import React, { useEffect, useState } from "react";
import nl2br from "react-nl2br";
import { Link, useNavigate, useParams } from "react-router-dom";
import ReactShowMoreText from "react-show-more-text";
import Layout from "../components/Layouts/Layout";
import BackButton from "../components/Navigations/BackButton";
import { escapeHtml } from "../helpers/sting";
import { axiosJWT } from "../providers/AuthProvider";

export default function MyReportDetail() {
    const { username, slug } = useParams();

    //

    const [loading, setLoading] = useState(false);

    //

    const [report, setReport] = useState(null);

    //

    const navigate = useNavigate();

    //

    const handleDeleteReport = async (username, id) => {
        setLoading(true);

        try {
            await axiosJWT.delete(`/${username}/society-reports/${id}`);

            navigate(`/${username}/reports`);
        } catch (_) {
            navigate("/404");
        } finally {
            setLoading(false);
        }
    };

    const getSocietyReportBySlug = async (username, slug) => {
        try {
            const { data } = await axiosJWT.get(
                `/${username}/society-reports/${slug}`
            );

            setReport(data?.society_report);
        } catch (_) {
            navigate("/404");
        }
    };

    useEffect(() => {
        getSocietyReportBySlug(username, slug);
    }, [slug]);

    return (
        <Layout title={`${report?.title} - Lapmas`}>
            <BackButton />
            <section>
                <div className="wrapper">
                    {report ? (
                        <>
                            <div>
                                <h1 className="text-xl lg:text-3xl font-bold mb-7">
                                    {report?.title}
                                </h1>
                                <ReactShowMoreText
                                    lines={10}
                                    className="text-sm mb-10"
                                    anchorClass="text-blue-500 hover:underline cursor-pointer"
                                >
                                    {nl2br(escapeHtml(report?.body + "\n\n"))}
                                </ReactShowMoreText>
                                <div className="flex items-center justify-between gap-10 flex-wrap">
                                    <div className="flex items-center gap-20">
                                        <p className="text-gray-400">
                                            {report?.ticket_id}
                                        </p>
                                        <Link
                                            className="text-blue-500 hover:underline"
                                            target="_blank"
                                            to={
                                                import.meta.env
                                                    .VITE_BACKEND_URL +
                                                "/storage/" +
                                                report?.attachment
                                            }
                                        >
                                            Lampiran
                                        </Link>
                                        <div
                                            className={`${
                                                report?.status == "rejected"
                                                    ? "bg-red-500"
                                                    : report?.status ==
                                                      "accepted"
                                                    ? "bg-emerald-500"
                                                    : "bg-blue-500"
                                            } px-3 py-1 rounded-full font-medium text-white`}
                                        >
                                            <p>{report?.status}</p>
                                        </div>
                                    </div>
                                    <button
                                        className="button bg-red-500 hover:bg-red-500 text-white"
                                        onClick={() =>
                                            handleDeleteReport(
                                                username,
                                                report?.id
                                            )
                                        }
                                        disabled={loading}
                                    >
                                        Delete
                                    </button>
                                </div>
                            </div>
                            {report?.responses?.length > 0 && (
                                <div className="mt-10">
                                    <h1 className="text-xl font-bold mb-5">
                                        Tanggapan
                                    </h1>
                                    {report?.responses?.map(
                                        (response, index) => (
                                            <div key={index} className="py-10">
                                                <div className="flex items-center gap-5 mb-10">
                                                    <div className="w-[50px] h-[50px] bg-gray-400 rounded-full"></div>
                                                    <div>
                                                        <span className="block mb-1">
                                                            {response?.agency
                                                                ?.name ?? "-"}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div className="py-2">
                                                    <p
                                                        dangerouslySetInnerHTML={{
                                                            __html: nl2br(
                                                                response?.response
                                                            ),
                                                        }}
                                                    ></p>
                                                </div>
                                            </div>
                                        )
                                    )}
                                </div>
                            )}
                        </>
                    ) : (
                        <>Loading . . .</>
                    )}
                </div>
            </section>
        </Layout>
    );
}
