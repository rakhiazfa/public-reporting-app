import React, { useEffect, useState } from "react";
import nl2br from "react-nl2br";
import { Link, useNavigate, useParams } from "react-router-dom";
import ReactShowMoreText from "react-show-more-text";
import Input from "../components/Fields/Input";
import Layout from "../components/Layouts/Layout";
import BackButton from "../components/Navigations/BackButton";
import { escapeHtml } from "../helpers/sting";
import { axiosJWT } from "../providers/AuthProvider";
import avatar from "../assets/images/avatar.jpg";

export default function MyReportDetail() {
    const { username, slug } = useParams();

    //

    const [loading, setLoading] = useState(false);
    const [formMessageLoading, setFormMessageLoading] = useState(false);
    const [message, setMessage] = useState("");

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

    const handleSendMessage = async (e) => {
        e.preventDefault();

        setFormMessageLoading(true);

        try {
            await axiosJWT.post(
                `${username}/society-reports/${slug}/send-message`,
                {
                    message,
                }
            );

            getSocietyReportBySlug(username, slug);
        } catch (_) {
        } finally {
            setFormMessageLoading(false);
            setMessage("");
        }
    };

    function formatDate(date) {
        var d = new Date(date),
            month = "" + (d.getMonth() + 1),
            day = "" + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = "0" + month;
        if (day.length < 2) day = "0" + day;

        return [year, month, day].join("-");
    }

    function checkAttachment(url) {
        var ext = url.split(".").reverse()[0];

        return ext == "pdf"
            ? import.meta.env.VITE_BACKEND_API +
                  "/society-reports/preview?file=" +
                  url
            : import.meta.env.VITE_BACKEND_URL + "/storage/" + url;
    }

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
                                <embed
                                    className="border mb-5 object-contain"
                                    src={checkAttachment(report?.attachment)}
                                    width="100%"
                                    height="400px"
                                />
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
                                            <p className="capitalize">
                                                {report?.status}
                                            </p>
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
                            <div className="mt-20">
                                <h1 className="text-xl lg:text-3xl font-bold mb-7">
                                    Tanggapan
                                </h1>
                                <div className="mb-10">
                                    <div>
                                        {report?.messages?.length > 0 && (
                                            <div className="grid gap-7">
                                                {report.messages.map(
                                                    (message, index) => (
                                                        <div
                                                            className={`p-5 rounded-md ${
                                                                username ==
                                                                message
                                                                    ?.message_origin
                                                                    ?.username
                                                                    ? "bg-blue-400 text-white"
                                                                    : "bg-gray-100"
                                                            }`}
                                                            key={index}
                                                        >
                                                            <div className="flex items-center gap-5 mb-7">
                                                                <div className="w-[45px] h-[45px] bg-gray-400 rounded-full">
                                                                    <img
                                                                        className="rounded-full"
                                                                        src={
                                                                            avatar
                                                                        }
                                                                        alt="Avatar Image"
                                                                    />
                                                                </div>
                                                                <div>
                                                                    <span className="text-sm block mb-1">
                                                                        {
                                                                            message
                                                                                ?.message_origin
                                                                                ?.name
                                                                        }
                                                                    </span>
                                                                    <p className="text-xs">
                                                                        {formatDate(
                                                                            message?.created_at
                                                                        )}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <p className="text-sm">
                                                                {
                                                                    message?.message
                                                                }
                                                            </p>
                                                        </div>
                                                    )
                                                )}
                                            </div>
                                        )}
                                    </div>
                                </div>
                                <form onSubmit={handleSendMessage}>
                                    <Input
                                        type="textarea"
                                        placeholder="Ketik pesan anda . . ."
                                        value={message}
                                        onChange={(e) =>
                                            setMessage(e.target.value)
                                        }
                                        className="mb-6"
                                    />
                                    <div className="flex justify-end">
                                        <button
                                            type="submit"
                                            className="button bg-blue-500 text-white"
                                            disabled={
                                                message === "" ||
                                                formMessageLoading
                                            }
                                        >
                                            Kirim
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </>
                    ) : (
                        <>Loading . . .</>
                    )}
                </div>
            </section>
        </Layout>
    );
}
