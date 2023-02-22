import React, { useContext, useEffect } from "react";
import SignUpForm from "../../components/Forms/SignUpForm";
import Layout from "../../components/Layouts/Layout";
import { AuthContext } from "../../providers/AuthProvider";

export default function SignUp() {
    const { register, loading, errors, setErrors } = useContext(AuthContext);

    useEffect(() => {
        return () => {
            setErrors(null);
        };
    }, []);

    return (
        <Layout title="Registrasi - Lapmas">
            <section>
                <div className="wrapper">
                    <SignUpForm
                        onSubmit={register}
                        loading={loading}
                        errors={errors}
                    />
                </div>
            </section>
        </Layout>
    );
}
