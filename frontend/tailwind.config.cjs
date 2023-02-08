/** @type {import('tailwindcss').Config} */

module.exports = {
    content: ["./index.html", "./src/**/*.{js,ts,jsx,tsx}"],
    theme: {
        extend: {
            fontFamily: {
                montserrat: ["Montserrat", "sans-serif"],
            },
            fontSize: {
                xs: "0.75rem",
                sm: "0.8rem",
                smd: "0.95rem",
                base: "1rem",
                xl: "1.25rem",
                "2xl": "1.563rem",
                "3xl": "1.953rem",
                "4xl": "2.441rem",
                "5xl": "3.052rem",
            },
        },
    },
    plugins: [],
};
