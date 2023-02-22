import React from "react";
import Layout from "../../components/Layouts/Layout";
import loginIllustration from "../../assets/images/illustrations/login.svg";
import SignInForm from "../../components/Forms/SignInForm";

export default function SignIn() {
    return (
        <Layout title="Login - Lapmas">
            <section>
                <div className="wrapper">
                    <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                        <SignInForm />

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
