import React, { useContext, useEffect, useState } from "react";
import { AuthContext } from "../../providers/AuthProvider";
import Layout from "../../components/Layouts/Layout";
import loginIllustration from "../../assets/images/illustrations/login.svg";
import SignInForm from "../../components/Forms/SignInForm";

export default function SignIn() {
    const { login, loading, errors, setErrors } = useContext(AuthContext);

    useEffect(() => {
        return () => {
            setErrors(null);
        };
    }, []);

    return (
        <Layout title="Login - Lapmas">
            <section>
                <div className="wrapper">
                    <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                        <SignInForm
                            onSubmit={login}
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
