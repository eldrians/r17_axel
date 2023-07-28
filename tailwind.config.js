/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#0B8DC5",
                secondary: "#707173",
                light: "#fefefe",
            },
            fontFamily: {
                lato: ["Lato", "sans-serif"],
            },
        },
    },
    plugins: [],
};
