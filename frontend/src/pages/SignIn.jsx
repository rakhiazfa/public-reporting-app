import React, { useState } from "react";
import Input from "../components/Fields/Input";
import Layout from "../components/Layouts/Layout";

const SignIn = () => {
    const [payload, setPayload] = useState({
        email_or_username: "",
        password: "",
    });

    const handleLogin = (e) => {
        e.preventDefault();
    };

    const handleChange = (e) => {
        setPayload((oldValue) => ({
            ...oldValue,
            [e.target.name]: e.target.value,
        }));
    };

    return (
        <Layout title="Masuk - Lapmas">
            <section className="pt-10 pb-16">
                <div className="wrapper">
                    <div className="wrapper">
                        <div className="grid grid-cols-1 lg:grid-cols-2 gap-16">
                            <div>
                                <h1 className="text-2xl md:text-3xl font-semibold mb-16">
                                    Masuk
                                </h1>
                                <form onSubmit={handleLogin}>
                                    <Input
                                        type="text"
                                        label="Email atau Username"
                                        name="email_or_username"
                                        placeholder="Masukan emaul atau username anda . . ."
                                        className="mb-5"
                                        value={payload?.email_or_username}
                                        onChange={handleChange}
                                    />
                                    <Input
                                        type="password"
                                        label="Kata Sandi"
                                        name="password"
                                        placeholder="Masukan kata sandi anda . . ."
                                        className="mb-7"
                                        value={payload?.password}
                                        onChange={handleChange}
                                    />
                                    <div className="flex justify-end">
                                        <button
                                            type="submit"
                                            className="button bg-blue-600 hover:bg-blue-700 text-white rounded-full"
                                        >
                                            Masuk
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </section>
        </Layout>
    );
};

export default SignIn;
