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
    const [provinces, setProvinces] = useState([]);
    const [cities, setCities] = useState([]);
    const [subDistricts, setSubDistricts] = useState([]);
    const [urbanVillages, setUrbanVillages] = useState([]);

    //

    const [data, setData] = useState({
        nik: "",
        phone: "",
        name: "",
        job_id: null,
        username: "",
        date_of_birth: null,
        gender: "",
        email: "",
        password: "",
        password_confirmation: "",
        province: null,
        city: null,
        sub_district: null,
        urban_village: null,
        postal_code: "",
        address: "",
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
     * Fetch all provinces.
     *
     */

    const fetchProvinces = async () => {
        try {
            const { data } = await axios.get(
                "https://dev.farizdotid.com/api/daerahindonesia/provinsi"
            );

            const provinsi = data?.provinsi?.reduce((prev, next) => {
                prev.push({
                    value: next?.id,
                    label: next?.nama,
                });

                return prev;
            }, []);

            setProvinces(provinsi);
        } catch (_) {}
    };

    /**
     * Fetch all cities.
     *
     */

    const fetchCities = async (provinceId) => {
        try {
            const { data } = await axios.get(
                `https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=${provinceId}`
            );

            const kota_kabupaten = data?.kota_kabupaten?.reduce(
                (prev, next) => {
                    prev.push({
                        value: next?.id,
                        label: next?.nama,
                    });

                    return prev;
                },
                []
            );

            setCities(kota_kabupaten);
        } catch (_) {}
    };

    /**
     * Fetch all sub districts.
     *
     */

    const fetchSubDistrict = async (cityId) => {
        try {
            const { data } = await axios.get(
                `https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=${cityId}`
            );

            const kecamatan = data?.kecamatan?.reduce((prev, next) => {
                prev.push({
                    value: next?.id,
                    label: next?.nama,
                });

                return prev;
            }, []);

            setSubDistricts(kecamatan);
        } catch (_) {}
    };

    /**
     * Fetch all urban villages.
     *
     */

    const fetchUrbanVillages = async (subDistrictId) => {
        try {
            const { data } = await axios.get(
                `https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=${subDistrictId}`
            );

            const kelurahan = data?.kelurahan?.reduce((prev, next) => {
                prev.push({
                    value: next?.id,
                    label: next?.nama,
                });

                return prev;
            }, []);

            setUrbanVillages(kelurahan);
        } catch (_) {}
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

        onSubmit && onSubmit(data);
    };

    useEffect(() => {
        fetchJobs();
        fetchProvinces();
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
                />
                <Input
                    type="number"
                    label="Nomor Telepon"
                    placeholder="Masukan nomor telepon anda . . ."
                    name="phone"
                    value={data?.phone}
                    onChange={handleChange}
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

                <div className="lg:col-span-2 border-t"></div>

                <Select
                    label="Provinsi"
                    options={provinces}
                    onChange={(value) => {
                        setData((old) => ({
                            ...old,
                            province: value?.label,
                        }));
                        fetchCities(value?.value);
                    }}
                />
                <Select
                    label="Kota / Kabupaten"
                    options={cities}
                    onChange={(value) => {
                        setData((old) => ({
                            ...old,
                            city: value?.label,
                        }));
                        fetchSubDistrict(value?.value);
                    }}
                    disabled={!data?.province}
                />
                <Select
                    label="Kecamatan"
                    options={subDistricts}
                    onChange={(value) => {
                        setData((old) => ({
                            ...old,
                            sub_district: value?.label,
                        }));
                        fetchUrbanVillages(value?.value);
                    }}
                    disabled={!data?.city}
                />
                <Select
                    label="Kelurahan / Desa"
                    options={urbanVillages}
                    onChange={(value) =>
                        setData((old) => ({
                            ...old,
                            urban_village: value?.label,
                        }))
                    }
                    disabled={!data?.sub_district}
                />
                <Input
                    type="text"
                    label="Kode Pos"
                    placeholder="Masukan kode pos anda . . ."
                    name="postal_code"
                    value={data?.postal_code}
                    onChange={handleChange}
                    className="lg:col-span-2"
                />
                <Input
                    type="textarea"
                    label="Alamat"
                    placeholder="Masukan alamat anda . . ."
                    name="address"
                    value={data?.address}
                    onChange={handleChange}
                    className="lg:col-span-2"
                />

                <div className="lg:col-span-2 flex justify-end">
                    <button
                        type="submit"
                        className="button bg-blue-500 text-white"
                    >
                        Register
                    </button>
                </div>
            </div>
        </form>
    );
};

export default SignUpForm;
