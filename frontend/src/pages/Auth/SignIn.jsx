import React, { useContext, useState } from "react";
import { AuthContext } from "../../providers/AuthProvider";
import Layout from "../../components/Layouts/Layout";
import loginIllustration from "../../assets/images/illustrations/login.svg";
import SignInForm from "../../components/Forms/SignInForm";
import axios from "axios";

export default function SignIn() {
    const { setUser } = useContext(AuthContext);

    const [loading, setLoading] = useState(false);
    const [errors, setErrors] = useState(null);

    const handleSignIn = async (event, payload) => {
        setLoading(true);

        try {
            const { data } = await axios.post("/auth/login", payload);

            localStorage.setItem("at", data?.token);

            setUser(data?.user);
        } catch (error) {
            setErrors(error.response.data.errors);
        } finally {
            setLoading(false);
        }
    };

    return (
        <Layout title="Login - Lapmas">
            <section>
                <div className="wrapper">
                    <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                        <SignInForm
                            onSubmit={handleSignIn}
                            loading={loading}
                            errors={errors}
                        />

                        <img
                            className="hidden lg:block h-[425px] mx-auto"
                            src={loginIllustration}
                            alt="Login Illustration"
                        />
                    </div>
                </div>
            </section>
        </Layout>
    );
}
