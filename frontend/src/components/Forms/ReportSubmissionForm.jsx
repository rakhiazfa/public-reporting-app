import axios from "axios";
import React, { useEffect, useState } from "react";
import Date from "../Fields/Date";
import File from "../Fields/File";
import Input from "../Fields/Input";
import Select from "../Fields/Select";

const reportTypes = [
    { value: "pengaduan", label: "Pengaduan" },
    { value: "aspirasi", label: "Aspirasi" },
    { value: "permintaan-informasi", label: "Permintaan Informasi" },
];

const ReportSubmissionForm = ({ onSubmit, loading, errors }) => {
    const [reportCategories, setReportCategories] = useState([]);
    const [agencies, setAgencies] = useState([]);

    //

    const [data, setData] = useState({
        type: null,
        title: "",
        body: "",
        date: null,
        category_id: null,
        destination_agency_id: null,
        attachment: null,
    });

    const [reportDate, setReportDate] = useState({
        startDate: null,
        endDate: null,
    });

    const handleReportDateChange = (newValue) => {
        setReportDate(newValue);
        setData((old) => ({
            ...old,
            date: newValue?.startDate,
        }));
    };

    const handleChange = (event) => {
        setData((old) => ({
            ...old,
            [event.target.name]: event.target.value,
        }));
    };

    /**
     * Fetch all report categories.
     *
     */

    const fetchReportCategories = async () => {
        try {
            const { data } = await axios.get(
                "/report-categories?with-subcategories=true"
            );

            const reportCategories = data?.report_categories?.reduce(
                (prev, next) => {
                    prev?.push({
                        label: next?.name,
                        options: next?.report_subcategories?.reduce(
                            (prev, next) => {
                                prev?.push({
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
            );

            setReportCategories(reportCategories);
        } catch (_) {}
    };

    /**
     * Fetch all agencies.
     *
     */

    const fetchAgencies = async () => {
        try {
            const { data } = await axios.get("/agencies");

            const agencies = data?.agencies?.reduce((prev, next) => {
                prev?.push({
                    value: next?.id,
                    label: next?.name,
                });

                return prev;
            }, []);

            setAgencies(agencies);
        } catch (_) {}
    };

    const handleAttachmentChange = (event, file) => {
        setData((old) => ({
            ...old,
            attachment: file,
        }));
    };

    /**
     * Handle on submit.
     *
     */

    const handleSubmit = (event) => {
        event.preventDefault();

        onSubmit && onSubmit(data);
    };

    useEffect(() => {
        fetchReportCategories();
        fetchAgencies();
    }, []);

    return (
        <form onSubmit={handleSubmit}>
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <Select
                    label="Bentuk Laporan"
                    options={reportTypes}
                    onChange={(value) =>
                        setData((old) => ({
                            ...old,
                            type: value?.value,
                        }))
                    }
                    error={errors?.type}
                    className="lg:col-span-2"
                />
                <Input
                    type="text"
                    label="Judul Laporan"
                    placeholder="Masukan judul laporan . . ."
                    name="title"
                    value={data?.title}
                    onChange={handleChange}
                    error={errors?.title}
                    className="lg:col-span-2"
                />
                <Input
                    type="textarea"
                    label="Isi Laporan"
                    placeholder="Masukan isi laporan . . ."
                    name="body"
                    value={data?.body}
                    onChange={handleChange}
                    error={errors?.body}
                    className="lg:col-span-2"
                    rows={5}
                />
                <Date
                    label="Tanggal Laporan"
                    asSingle={true}
                    useRange={false}
                    value={reportDate}
                    onChange={handleReportDateChange}
                    error={errors?.date}
                    className="lg:col-span-2"
                />
                <Select
                    label="Kategori Laporan"
                    options={reportCategories}
                    onChange={(value) =>
                        setData((old) => ({
                            ...old,
                            category_id: value?.value,
                        }))
                    }
                    error={errors?.category_id}
                />
                <Select
                    label="Instansi Tujuan"
                    options={agencies}
                    onChange={(value) =>
                        setData((old) => ({
                            ...old,
                            destination_agency_id: value?.value,
                        }))
                    }
                    error={errors?.destination_agency_id}
                />
                <div className="lg:col-span-2">
                    <File
                        label="Lampiran"
                        onChange={handleAttachmentChange}
                        error={errors?.attachment}
                    />
                    <p className="text-sm text-gray-500 font-normal ml-3 mt-2">
                        PDF ( Max: 2MB )
                    </p>
                </div>
                <div className="lg:col-span-2 flex justify-end">
                    <button
                        type="submit"
                        className="button bg-blue-500 text-white"
                        disabled={loading}
                    >
                        Kirim
                    </button>
                </div>
            </div>
        </form>
    );
};

export default ReportSubmissionForm;
