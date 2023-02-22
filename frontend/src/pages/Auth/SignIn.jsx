import React from "react";
import Layout from "../../components/Layouts/Layout";

export default function SignIn() {
    return (
        <Layout title="Login - Lapmas">
            <section>
                <div className="wrapper">
                    <h1 className="text-[clamp(1.5rem,8vw,3rem)] font-bold max-w-[450px] mb-14">
                        Login
                    </h1>
                </div>
            </section>
        </Layout>
    );
}
