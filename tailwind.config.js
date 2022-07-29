/** @type {import('tailwindcss').Config} */

//tailwin.config
module.exports = {
    purge: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    darkMode: false,
    theme: {
        extend: {
            padding: {
                "5px": "5px",
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [require("tailwind-scrollbar")],
};
