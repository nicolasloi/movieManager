/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    daisyui: {
        themes: [
            {
                mytheme: {

                    "primary": "#486284",

                    "secondary": "#F1F5F9",

                    "accent": "#7B95B7",

                    "neutral": "#3D4451",

                    "base-100": "#FFFFFF",

                    "info": "#3ABFF8",

                    "success": "#36D399",

                    "warning": "#FBBD23",

                    "error": "#F87272",

                    "notBlack": "#101828",
                },
            },
        ],
    },
    plugins: [require("daisyui")],
}
