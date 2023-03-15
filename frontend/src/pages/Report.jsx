import axios from "axios";
import React, { useContext, useEffect, useState } from "react";
import nl2br from "react-nl2br";
import { Link, useNavigate } from "react-router-dom";
import ReactShowMoreText from "react-show-more-text";
import Swal from "sweetalert2";
import withReactContent from "sweetalert2-react-content";
import ReportSubmissionForm from "../components/Forms/ReportSubmissionForm";
import Layout from "../components/Layouts/Layout";
import { AuthContext, axiosJWT } from "../providers/AuthProvider";
import avatar from "../assets/images/avatar.jpg";
import { escapeHtml } from "../helpers/sting";
import Input from "../components/Fields/Input";

const ReactSwal = withReactContent(Swal);

export default function Report() {
    const { user } = useContext(AuthContext);

    //

    const [societyReports, setSocietyReports] = useState(null);

    //

    const [loading, setLoading] = useState(false);
    const [errors, setErrors] = useState(null);

    const navigate = useNavigate();

    const handleSendReport = async (payload) => {
        setLoading(true);

        try {
            const { data } = await axiosJWT.post(
                `${user?.username}/society-reports`,
                payload,
                {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                }
            );

            ReactSwal.fire({
                icon: "success",
                title: "Berhasil mengirim laporan.",
            }).then(() => {
                window.location.reload();
            });
        } catch (error) {
            if (error.response?.status === 401) navigate("/auth/signin");

            setErrors(error.response.data?.errors);
        } finally {
            setLoading(false);
        }
    };

    /**
     * Fetch all society reports.
     *
     */

    const fetchSocietyReports = async (q) => {
        try {
            const { data } = await axios.get(`/society-reports?q=${q ?? ""}`);

            setSocietyReports(data?.society_reports);
        } catch (_) {}
    };

    const handleSearch = (e) => {
        const q = e.target.value;

        fetchSocietyReports(q);
    };

    useEffect(() => {
        fetchSocietyReports();
    }, []);

    return (
        <Layout title="Kirim Laporan - Lampas">
            <section>
                <div className="wrapper">
                    <h1 className="text-[clamp(1.5rem,8vw,3rem)] font-bold max-w-[450px] mb-14">
                        Kirim Laporan
                    </h1>
                    <ReportSubmissionForm
                        onSubmit={handleSendReport}
                        loading={loading}
                        errors={errors}
                    />
                </div>
            </section>
            <section>
                <div className="wrapper">
                    <h1 className="text-[clamp(1.5rem,8vw,3rem)] font-bold max-w-[450px] mb-12">
                        Laporan
                    </h1>
                    <div className="mb-14">
                        <Input
                            type="text"
                            onChange={handleSearch}
                            placeholder="Cari Laporan . . ."
                        />
                    </div>
                    <div className="grid grid-cols-1 gap-10">
                        {societyReports ? (
                            <>
                                {societyReports?.map((report, index) => (
                                    <div className="border-b pb-10" key={index}>
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
                                                <p className="text-xs">
                                                    {report?.date}
                                                </p>
                                            </div>
                                        </div>
                                        <div>
                                            <Link
                                                className="block text-sm md:text-lg font-medium text-blue-500 hover:underline mb-10"
                                                to={`/reports/${report?.slug}`}
                                            >
                                                {report?.title} ({" "}
                                                {report?.ticket_id} )
                                            </Link>
                                            <ReactShowMoreText
                                                lines={5}
                                                className="text-sm mb-5"
                                                anchorClass="text-blue-500 hover:underline cursor-pointer"
                                            >
                                                {nl2br(
                                                    escapeHtml(
                                                        report?.body + "\n\n"
                                                    )
                                                )}
                                            </ReactShowMoreText>
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
