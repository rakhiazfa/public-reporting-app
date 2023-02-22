import React, { useEffect, useState } from "react";
import Input from "../Fields/Input";
import Date from "../Fields/Date";
import Select from "../Fields/Select";
import axios from "axios";

const genders = [
    {
        value: "Pria",
        label: "Pria",
    },
    {
        value: "Wanita",
        label: "Wanita",
    },
];

const SignUpForm = ({ onSubmit }) => {
    const [jobs, setJobs] = useState([]);

    //

    const [data, setData] = useState({
        nik: "",
        name: "",
        job_id: null,
        username: "",
        date_of_birth: null,
        gender: "",
        email: "",
        password: "",
        password_confirmation: "",
    });

    const [dateOfBith, setDateOfBith] = useState({
        startDate: null,
        endDate: null,
    });

    const handleDateOfBirthChange = (newValue) => {
        setDateOfBith(newValue);
        setData((old) => ({
            ...old,
            date_of_birth: newValue?.startDate,
        }));
    };

    const handleChange = (event) => {
        setData((old) => ({
            ...old,
            [event.target.name]: event.target.value,
        }));
    };

    /**
     * Fetch all jobs.
     *
     */

    const fetchJobs = async () => {
        try {
            const { data } = await axios.get("/jobs");

            const jobs = data?.jobs?.reduce((prev, next) => {
                prev?.push({
                    value: next?.id,
                    label: next?.name,
                });

                return prev;
            }, []);

            setJobs(jobs);
        } catch (_) {}
    };

    /**
     * Handle on submit.
     *
     */

    const handleSubmit = (event) => {
        event.preventDefault();

        console.log(data);

        onSubmit && onSubmit(event, data);
    };

    useEffect(() => {
        fetchJobs();
    }, []);

    return (
        <form onSubmit={handleSubmit}>
            <h1 className="text-[clamp(1.5rem,8vw,3rem)] font-bold max-w-[450px] mb-14">
                Registrasi
            </h1>
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <Input
                    type="text"
                    label="NIK"
                    placeholder="Masukan NIK anda . . ."
                    name="nik"
                    value={data?.nik}
                    onChange={handleChange}
                    className="lg:col-span-2"
                />
                <Input
                    type="text"
                    label="Nama"
                    placeholder="Masukan nama anda . . ."
                    name="name"
                    value={data?.name}
                    onChange={handleChange}
                />
                <Select
                    label="Pekerjaan"
                    options={jobs}
                    onChange={(value) =>
                        setData((old) => ({
                            ...old,
                            job_id: value?.value,
                        }))
                    }
                />
                <Date
                    label="Tanggal Lahir"
                    asSingle={true}
                    useRange={false}
                    value={dateOfBith}
                    onChange={handleDateOfBirthChange}
                />
                <Select
                    label="Jenis Kelamin"
                    options={genders}
                    onChange={(value) =>
                        setData((old) => ({
                            ...old,
                            gender: value?.value,
                        }))
                    }
                />
                <Input
                    type="text"
                    label="Email"
                    placeholder="Masukan email anda . . ."
                    name="email"
                    value={data?.email}
                    onChange={handleChange}
                />
                <Input
                    type="text"
                    label="Username"
                    placeholder="Masukan username anda . . ."
                    name="username"
                    value={data?.username}
                    onChange={handleChange}
                />
                <Input
                    type="password"
                    label="Kata Sandi"
                    name="password"
                    value={data?.password}
                    onChange={handleChange}
                    placeholder="Masukan kata sandi anda . . ."
                />
                <Input
                    type="password"
                    label="Konfirmasi Kata Sandi"
                    name="password_confirmation"
                    value={data?.password_confirmation}
                    onChange={handleChange}
                    placeholder="Konfirmasi kata sandi anda . . ."
                />
                <div className="lg:col-span-2 flex justify-end">
                    <button
                        type="submit"
                        className="button bg-blue-500 text-white"
                    >
                        Login
                    </button>
                </div>
            </div>
        </form>
    );
};

export default SignUpForm;
