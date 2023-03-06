/** @type {import('tailwindcss').Config} */

module.exports = {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                poppins: ["Poppins", "sans-serif"],
            },
            boxShadow: {
                xxs: "1px 1px 45px 1px rgba(0, 0, 0, 0.045)",
            },
        },
    },
    plugins: [],
};
