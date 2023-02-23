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

const ReactSwal = withReactContent(Swal);

export default function Report() {
    const { user } = useContext(AuthContext);

    //

    const [societyReports, setSocietyReports] = useState([]);

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

    const fetchSocietyReports = async () => {
        try {
            const { data } = await axios.get("/society-reports");

            setSocietyReports(data?.society_reports);
        } catch (_) {}
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
                    <div className="grid grid-cols-1 gap-10">
                        {societyReports?.map((report, index) => (
                            <div className="border-b pb-10" key={index}>
                                <div className="flex items-center gap-5 mb-7">
                                    <div className="w-[45px] h-[45px] bg-gray-400 rounded-full"></div>
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
                                        {report?.title} ( {report?.ticket_id} )
                                    </Link>
                                    <ReactShowMoreText
                                        lines={5}
                                        className="text-sm mb-5"
                                        anchorClass="text-blue-500 hover:underline cursor-pointer"
                                        children={nl2br(report?.body + "\n\n")}
                                    ></ReactShowMoreText>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </section>
        </Layout>
    );
}
