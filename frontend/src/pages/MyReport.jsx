import React, { useContext, useEffect, useState } from "react";
import nl2br from "react-nl2br";
import { Link, useNavigate, useParams } from "react-router-dom";
import ReactShowMoreText from "react-show-more-text";
import Layout from "../components/Layouts/Layout";
import { escapeHtml } from "../helpers/sting";
import { AuthContext, axiosJWT } from "../providers/AuthProvider";

export default function MyReport() {
    const { user } = useContext(AuthContext);

    //

    const { username } = useParams();

    //

    const [loading, setLoading] = useState(false);

    //

    const [reports, setReports] = useState(null);

    //

    const handleDeleteReport = async (username, id) => {
        setLoading(true);

        try {
            await axiosJWT.delete(`/${username}/society-reports/${id}`);

            fetchMyReports(username);
        } catch (_) {
        } finally {
            setLoading(false);
        }
    };

    const fetchMyReports = async (username) => {
        try {
            const { data } = await axiosJWT.get(`/${username}/society-reports`);

            setReports(data?.society_reports);
        } catch (_) {}
    };

    useEffect(() => {
        fetchMyReports(username);
    }, []);

    return (
        <Layout title="Kirim Laporan - Lampas">
            <section>
                <div className="wrapper">
                    <h1 className="text-[clamp(1.5rem,5vw,2.5rem)] font-bold max-w-[450px] mb-14">
                        Laporan Saya
                    </h1>
                    <div className="grid grid-cols-1 gap-10">
                        {reports ? (
                            <>
                                {reports?.map((report, index) => (
                                    <div className="border-b pb-10" key={index}>
                                        <div>
                                            <Link
                                                className="block text-sm md:text-lg font-medium text-blue-500 hover:underline mb-10"
                                                to={`/${username}/reports/${report?.slug}`}
                                            >
                                                {report?.title} ({" "}
                                                {report?.ticket_id} )
                                            </Link>
                                            <ReactShowMoreText
                                                lines={5}
                                                className="text-sm mb-10"
                                                anchorClass="text-blue-500 hover:underline cursor-pointer"
                                            >
                                                {nl2br(
                                                    escapeHtml(
                                                        report?.body + "\n\n"
                                                    )
                                                )}
                                            </ReactShowMoreText>
                                            <div className="flex justify-end">
                                                <button
                                                    className="button bg-red-500 hover:bg-red-600 text-white"
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
                                    </div>
                                ))}
                            </>
                        ) : (
                            <>Loading . . .</>
                        )}
                    </div>
                </div>
            </section>
        </Layout>
    );
}
