import React, { useEffect, useState } from "react";
import Layout from "../components/Layouts/Layout";
import Input from "../components/Fields/Input";
import Select from "../components/Fields/Select";
import Date from "../components/Fields/Date";
import axios from "axios";
import { useDispatch, useSelector } from "react-redux";

const genders = [
    { value: "Pria", label: "Pria" },
    { value: "Wanita", label: "Wanita" },
];

const Profile = () => {
    const [jobs, setJobs] = useState([]);
    const [provinces, setProvinces] = useState([]);
    const [cities, setCities] = useState([]);
    const [subDistricts, setSubDistricts] = useState([]);
    const [urbanVillages, seturbanVillages] = useState([]);

    //

    const [errors, setErrors] = useState(null);
    const [loading, setLoading] = useState(false);

    //

    const { user } = useSelector(({ auth }) => ({
        user: auth.user,
    }));

    //

    const [email, setEmail] = useState(user?.email);
    const [username, setUsername] = useState(user?.username);

    const [nik, setNik] = useState(user?.society?.nik);
    const [name, setName] = useState(user?.name);
    const [dateOfBirth, setDateOfBirth] = useState({
        startDate: user?.society?.date_of_birth,
        endDate: user?.society?.date_of_birth,
    });
    const [phone, setPhone] = useState(user?.society?.phone);
    const [gender, setGender] = useState({
        value: user?.society?.gender,
        label: user?.society?.gender,
    });
    const [job, setJob] = useState({
        value: user?.society?.job?.id,
        label: user?.society?.job?.name,
    });

    //

    const handleDateOfBirthChange = (newValue) => {
        setDateOfBirth(newValue);
    };

    const dispatch = useDispatch();

    const handleUpdateProfile = async (e) => {
        e.preventDefault();

        setLoading(true);

        const payload = {
            // Society
            nik,
            date_of_birth: dateOfBirth?.startDate,
            gender,
            phone,
            job_id: job,
            // User
            name,
            email,
            username,
        };

        console.log(payload);
    };

    // Fetch all jobs.
    const fetchAllJobs = async () => {
        try {
            const { data } = await axios.get("/jobs");

            setJobs(data.jobs);
        } catch (error) {
            console.log(error);
        }
    };

    useEffect(() => {
        return () => {
            fetchAllJobs();
        };
    }, []);

    return (
        <Layout title="Profil Saya - Lapmas">
            <section className="pt-10 pb-16">
                <div className="wrapper">
                    <div>
                        <h1 className="text-2xl md:text-3xl font-semibold mb-7">
                            Profil Saya
                        </h1>
                        <hr />
                        <form onSubmit={handleUpdateProfile}>
                            <div className="mt-7">
                                <h1 className="text-xl md:text-2xl text-gray-500 font-semibold mb-5">
                                    Identitas
                                </h1>
                                <div className="grid gap-7 mb-7">
                                    <div className="grid grid-cols-1 md:grid-cols-2 gap-7">
                                        <Input
                                            type="text"
                                            label="NIK"
                                            value={nik}
                                            onChange={(e) =>
                                                setNik(e.target.value)
                                            }
                                            placeholder="Masukan NIK anda . . ."
                                            error={errors?.nik}
                                        />
                                        <Input
                                            type="text"
                                            label="Nama"
                                            value={name}
                                            onChange={(e) =>
                                                setName(e.target.value)
                                            }
                                            placeholder="Masukan nama anda . . ."
                                            error={errors?.name}
                                        />
                                    </div>

                                    <div className="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-7">
                                        <Date
                                            label="Tanggal Lahir"
                                            value={dateOfBirth}
                                            onChange={handleDateOfBirthChange}
                                            error={errors?.date_of_birth}
                                        />
                                        <Select
                                            label="Jenis Kelamin"
                                            options={genders}
                                            onChange={(type) =>
                                                setGender(type.value)
                                            }
                                            value={gender}
                                            placeholder="Pilih jenis kelamin anda . . ."
                                            error={errors?.gender}
                                        />
                                        <Select
                                            label="Pekerjaan"
                                            options={jobs?.reduce(
                                                (prev, next) => {
                                                    prev.push({
                                                        value: next?.id,
                                                        label: next?.name,
                                                    });

                                                    return prev;
                                                },
                                                []
                                            )}
                                            onChange={(type) =>
                                                setJob(type.value)
                                            }
                                            value={job}
                                            placeholder="Pilih pekerjaan anda . . ."
                                            className="md:col-span-2 lg:col-span-1"
                                            error={errors?.job_id}
                                        />
                                    </div>

                                    <div className="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-7">
                                        <Input
                                            type="text"
                                            label="No Telepon"
                                            value={phone}
                                            onChange={(e) =>
                                                setPhone(e.target.value)
                                            }
                                            placeholder="Masukan nomor telepon anda . . ."
                                            error={errors?.phone}
                                        />

                                        <Input
                                            type="text"
                                            label="Email"
                                            value={email}
                                            onChange={(e) =>
                                                setEmail(e.target.value)
                                            }
                                            placeholder="Masukan email anda . . ."
                                            error={errors?.email}
                                        />
                                        <Input
                                            type="text"
                                            label="Username"
                                            value={username}
                                            onChange={(e) =>
                                                setUsername(e.target.value)
                                            }
                                            placeholder="Masukan username anda . . ."
                                            className="md:col-span-2 lg:col-span-1"
                                            error={errors?.username}
                                        />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </Layout>
    );
};

export default Profile;
