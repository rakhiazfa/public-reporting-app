import axios from "axios";
import React, { useContext, useEffect, useState } from "react";
import { Link } from "react-router-dom";
import ReportSubmissionForm from "../components/Forms/ReportSubmissionForm";
import Layout from "../components/Layouts/Layout";
import { AuthContext, axiosJWT } from "../providers/AuthProvider";

export default function Report() {
    const { user } = useContext(AuthContext);

    //

    const [societyReports, setSocietyReports] = useState([]);

    //

    const [loading, setLoading] = useState(false);
    const [errors, setErrors] = useState(null);

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

            console.log(data);
        } catch (error) {
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
                    <div className="grid grid-cols-1 lg:grid-cols-2 gap-10">
                        {societyReports?.map((report, index) => (
                            <div key={index}>
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
                                        className="block text-lg font-medium text-blue-500 hover:underline mb-3"
                                        to={`/reports/${report?.slug}`}
                                    >
                                        {report?.title} ( {report?.ticket_id} )
                                    </Link>
                                    <p className="text-sm mb-5">
                                        {report?.body}
                                    </p>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </section>
        </Layout>
    );
}
