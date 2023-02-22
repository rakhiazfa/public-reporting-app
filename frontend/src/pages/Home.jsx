import React from "react";
import Layout from "../components/Layouts/Layout";
import HeroSection from "../components/Sections/Home/HeroSection";
import AboutSection from "../components/Sections/Home/AboutSection";

export default function Home() {
    return (
        <Layout title="Home - Lapmas">
            <div className="grid lg:gap-10">
                <HeroSection />

                <AboutSection />
            </div>
        </Layout>
    );
}
