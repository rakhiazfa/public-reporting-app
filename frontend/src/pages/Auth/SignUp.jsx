import React from "react";
import SignUpForm from "../../components/Forms/SignUpForm";
import Layout from "../../components/Layouts/Layout";

export default function SignUp() {
    return (
        <Layout title="Registrasi - Lapmas">
            <section>
                <div className="wrapper">
                    <SignUpForm />
                </div>
            </section>
        </Layout>
    );
}
