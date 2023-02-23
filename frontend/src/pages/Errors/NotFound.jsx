import React from "react";
import { Link } from "react-router-dom";
import Layout from "../../components/Layouts/Layout";

export default function NotFound() {
    return (
        <Layout title="Not Found - Lapmas">
            <div className="wrapper min-h-[400px] flex items-center justify-center">
                <div className="text-center">
                    <h1 className="text-4xl font-semibold mb-3">404</h1>
                    <p className="text-lg mb-5">Page not found.</p>
                    <Link to="/" className="text-blue-500 hover:underline">
                        Back to Home
                    </Link>
                </div>
            </div>
        </Layout>
    );
}
