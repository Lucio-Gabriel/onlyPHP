import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                            DEFAULT: "#3A3753",
                            50: "#F5F5F7",
                            100: "#E8E8ED",
                            200: "#D1D1DA",
                            300: "#B0B0C1",
                            400: "#8A8AA4",
                            500: "#6978A4",
                            600: "#3A3753",
                            700: "#2D2B42",
                            800: "#222032",
                            900: "#1A1827",
                        },
                        secondary: {
                            DEFAULT: "#6978A4",
                            50: "#F6F7FA",
                            100: "#ECEEF4",
                            200: "#D9DCE9",
                            300: "#BFC4D8",
                            400: "#9FA7C3",
                            500: "#6978A4",
                            600: "#5A6B94",
                            700: "#4C5A7D",
                            800: "#404B68",
                            900: "#363F56",
                        }
            },
        },
    },
    plugins: [],
};
