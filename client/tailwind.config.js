/*
 ** TailwindCSS Configuration File
 **
 ** Docs: https://tailwindcss.com/docs/configuration
 ** Default: https://github.com/tailwindcss/tailwindcss/blob/master/stubs/defaultConfig.stub.js
 */
module.exports = {
    theme: {
        colors: {
            transparent: "transparent",
            white: "#fff",
            primary: {
                default: "#4299E1",
                dark: "#3182CE"
            },
            success: {
                default: "#38B2AC",
                dark: "#319795"
            },
            info: "#667EEA",
            danger: "#F56565",
            secondary: {
                light: "#E2E8F0",
                default: "#A0AEC0",
                dark: "#2D3748"
            },
            gray: {
                100: "#F7FAFC",
                200: "#EDF2F7",
                300: "#E2E8F0",
                400: "#CBD5E0",
                500: "#A0AEC0",
                600: "#718096",
                700: "#4A5568",
                800: "#2D3748",
                900: "#1A202C"
            }
        },
        fontFamily: {
            sans: ["Nunito", "Arial", "sans-serif"]
        }
    },
    variants: {},
    plugins: []
};
