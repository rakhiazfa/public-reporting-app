import React, { useEffect, useState } from "react";
import Layout from "../components/Layouts/Layout";
import Input from "../components/Fields/Input";
import Select from "../components/Fields/Select";
import Date from "../components/Fields/Date";
import axios from "axios";

const genders = [
    { value: "Pria", label: "Pria" },
    { value: "Wanita", label: "Wanita" },
];

const SignUp = () => {
    const [jobs, setJobs] = useState([]);

    const [nik, setNik] = useState("");
    const [name, setName] = useState("");
    const [email, setEmail] = useState("");
    const [username, setUsername] = useState("");
    const [password, setPassword] = useState("");
    const [passwordConfirmation, setpasswordConfirmation] = useState("");
    const [dateOfBirth, setDateOfBirth] = useState({
        startDate: null,
        endDate: null,
    });
    const [phone, setPhone] = useState("");
    const [gender, setGender] = useState();
    const [job, setJob] = useState();
    const [country, setCountry] = useState("");
    const [province, setProvince] = useState("");
    const [city, setCity] = useState("");
    const [postalCode, setPostalCode] = useState("");
    const [address, setAddress] = useState("");

    const handleDateOfBirthChange = (newValue) => {
        setDateOfBirth(newValue);
    };

    const handleRegister = (e) => {
        e.preventDefault();

        const payload = {
            // Society
            nik,
            date_of_birth: dateOfBirth,
            gender,
            phone,
            job_id: job,
            // User
            name,
            email,
            username,
            password,
            password_confirmation: passwordConfirmation,
            // Location
            country,
            province,
            city,
            postal_code: postalCode,
            address,
        };
    };

    useEffect(() => {
        const fetchJobs = async () => {
            try {
                const { data } = await axios.get("/jobs");

                setJobs(data.jobs);
            } catch (error) {
                console.log(error);
            }
        };

        return () => {
            fetchJobs();
        };
    }, []);

    return (
        <Layout title="Buat Akun - Lapmas">
            <section className="pt-10 pb-16">
                <div className="wrapper">
                    <div>
                        <h1 className="text-2xl md:text-3xl font-semibold mb-7">
                            Buat Akun
                        </h1>
                        <form onSubmit={handleRegister}>
                            <div className="grid grid-cols-1 md:grid-cols-2 gap-7 mb-7">
                                <Input
                                    type="text"
                                    label="NIK"
                                    value={nik}
                                    onChange={(e) => setNik(e.target.value)}
                                    placeholder="Masukan NIK anda . . ."
                                />
                                <Date
                                    label="Tanggal Lahir"
                                    value={dateOfBirth}
                                    onChange={handleDateOfBirthChange}
                                    className="mb-3"
                                />
                                <Select
                                    label="Jenis Kelamin"
                                    options={genders}
                                    onChange={(type) => setGender(type.value)}
                                    className="mb-3"
                                    placeholder="Pilih bentuk laporan . . ."
                                />
                                <Select
                                    label="Pekerjaan"
                                    options={jobs?.reduce((prev, next) => {
                                        prev.push({
                                            value: next?.id,
                                            label: next?.name,
                                        });

                                        return prev;
                                    }, [])}
                                    onChange={(type) => setJob(type.value)}
                                    className="mb-3"
                                    placeholder="Pilih bentuk laporan . . ."
                                />
                                <Input
                                    type="text"
                                    label="No Telepon"
                                    value={phone}
                                    onChange={(e) => setPhone(e.target.value)}
                                    placeholder="Masukan nomor telepon anda . . ."
                                />
                                <Input
                                    type="text"
                                    label="Nama"
                                    value={name}
                                    onChange={(e) => setName(e.target.value)}
                                    placeholder="Masukan nama anda . . ."
                                />
                                <Input
                                    type="text"
                                    label="Email"
                                    value={email}
                                    onChange={(e) => setEmail(e.target.value)}
                                    placeholder="Masukan email anda . . ."
                                />
                                <Input
                                    type="text"
                                    label="Username"
                                    value={username}
                                    onChange={(e) =>
                                        setUsername(e.target.value)
                                    }
                                    placeholder="Masukan username anda . . ."
                                />
                                <Input
                                    type="password"
                                    label="Kata Sandi"
                                    value={password}
                                    onChange={(e) =>
                                        setPassword(e.target.value)
                                    }
                                    placeholder="Masukan kata sandi anda . . ."
                                />
                                <Input
                                    type="password"
                                    label="Konfirmasi Kata Sandi"
                                    value={passwordConfirmation}
                                    onChange={(e) =>
                                        setpasswordConfirmation(e.target.value)
                                    }
                                    placeholder="Konfirmasi kata sandi anda . . ."
                                />
                            </div>
                            <div className="flex justify-end col-span-2">
                                <button
                                    type="submit"
                                    className="button bg-blue-600 hover:bg-blue-700 text-white rounded-full"
                                >
                                    Daftar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </Layout>
    );
};

export default SignUp;
