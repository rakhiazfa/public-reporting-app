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

    const [province, setProvince] = useState({
        id: null,
        name: user?.society?.location?.name,
    });
    const [city, setCity] = useState({
        id: null,
        name: "",
    });
    const [subDistrict, setSubDistrict] = useState({
        id: null,
        name: "",
    });
    const [urbanVillage, setUrbanVillage] = useState({
        id: null,
        name: "",
    });
    const [postalCode, setPostalCode] = useState("");
    const [address, setAddress] = useState("");

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
            password,
            password_confirmation: passwordConfirmation,
            // Location
            province: province?.name,
            city: city?.name,
            sub_district: subDistrict?.name,
            urban_village: urbanVillage?.name,
            postal_code: postalCode,
            address,
        };

        console.log(payload);
    };

    // Fetch all cities.
    const fetchAllCities = async (provinceId) => {
        try {
            const { data } = await axios.get(
                `http://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=${provinceId}`
            );

            const kota_kabupaten = data?.kota_kabupaten?.reduce(
                (prev, next) => {
                    prev.push({
                        value: next?.nama,
                        label: next?.nama,
                    });

                    return prev;
                },
                []
            );

            setCities(kota_kabupaten);
        } catch (error) {
            console.log(error);
        }
    };

    // Fetch all sub districts.
    const fetchAllSubDistrict = async (cityId) => {
        try {
            const { data } = await axios.get(
                `https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=${cityId}`
            );

            const kecamatan = data?.kecamatan?.reduce((prev, next) => {
                prev.push({
                    value: next?.nama,
                    label: next?.nama,
                });

                return prev;
            }, []);

            setSubDistricts(kecamatan);
        } catch (error) {
            console.log(error);
        }
    };

    // Fetch all urban villages.
    const fetchAllUrbanVillages = async (subDistrictId) => {
        try {
            const { data } = await axios.get(
                `https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=${subDistrictId}`
            );

            const kelurahan = data?.kelurahan?.reduce((prev, next) => {
                prev.push({
                    value: next?.nama,
                    label: next?.nama,
                });

                return prev;
            }, []);

            seturbanVillages(kelurahan);
        } catch (error) {
            console.log(error);
        }
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

    // Fetch all provinces.
    const fetchAllProvinces = async () => {
        try {
            const { data } = await axios.get(
                "http://dev.farizdotid.com/api/daerahindonesia/provinsi"
            );

            const provinsi = data?.provinsi?.reduce((prev, next) => {
                prev.push({
                    value: next?.id,
                    label: next?.nama,
                });

                return prev;
            }, []);

            setProvinces(provinsi);
        } catch (error) {
            console.log(error);
        }
    };

    useEffect(() => {
        return () => {
            fetchAllProvinces();
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
                            <div className="mt-7">
                                <h1 className="text-xl md:text-2xl text-gray-500 font-semibold mb-5">
                                    Alamat
                                </h1>
                                <div className="grid gap-7 mb-7">
                                    <div className="grid grid-cols-1 md:grid-cols-2 gap-7">
                                        <Select
                                            label="Provinsi"
                                            options={provinces}
                                            onChange={(type) => {
                                                fetchAllCities(type?.value);

                                                setProvince({
                                                    id: type?.value,
                                                    name: type?.label,
                                                });
                                            }}
                                            placeholder="Pilih provinsi anda . . ."
                                            error={errors?.province}
                                        />
                                        <Select
                                            label="Kota"
                                            options={cities}
                                            onChange={(type) => {
                                                fetchAllSubDistrict(
                                                    type?.value
                                                );

                                                setCity({
                                                    id: type?.value,
                                                    name: type?.label,
                                                });
                                            }}
                                            placeholder="Pilih kota anda . . . "
                                            disabled={!province?.id}
                                            error={errors?.city}
                                        />
                                        <Select
                                            label="Kecamatan"
                                            options={subDistricts}
                                            onChange={(type) => {
                                                fetchAllUrbanVillages(
                                                    type?.value
                                                );

                                                setSubDistrict({
                                                    id: type?.value,
                                                    name: type?.label,
                                                });
                                            }}
                                            placeholder="Pilih kecamatan anda . . . "
                                            disabled={!city?.id}
                                            error={errors?.sub_district}
                                        />
                                        <Select
                                            label="Kelurahan"
                                            options={urbanVillages}
                                            onChange={(type) =>
                                                setUrbanVillage({
                                                    id: type?.value,
                                                    name: type?.label,
                                                })
                                            }
                                            placeholder="Pilih kelurahan anda . . . "
                                            disabled={!subDistrict?.id}
                                            error={errors?.urban_village}
                                        />
                                        <Input
                                            type="text"
                                            label="Kode Pos"
                                            placeholder="Masukan kode pos anda . . ."
                                            className="md:col-span-2"
                                            value={postalCode}
                                            onChange={(e) =>
                                                setPostalCode(e.target.value)
                                            }
                                            error={errors?.postal_code}
                                        />
                                    </div>
                                    <Input
                                        type="textarea"
                                        label="Alamat"
                                        placeholder="Masukan alamat anda . . ."
                                        value={address}
                                        onChange={(e) =>
                                            setAddress(e.target.value)
                                        }
                                        error={errors?.address}
                                    />
                                </div>
                                <div className="flex justify-end col-span-2">
                                    <button
                                        type="submit"
                                        className="button bg-blue-600 hover:bg-blue-700 text-white rounded-full"
                                        disabled={loading}
                                    >
                                        Simpan
                                    </button>
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
