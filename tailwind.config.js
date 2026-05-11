/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                alderton: {
                    gold: "#C9A84C",
                    dark: "#1a1a2e",
                    light: "#f8f6f0",
                },
            },
        },
    },
    plugins: [],
};
