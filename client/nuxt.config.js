require("dotenv").config();

export default {
    srcDir: __dirname,
    env: {
        API_ENDPOINT: `${process.env.APP_URL}/api`,
        APP_NAME: process.env.APP_NAME,
        APP_LOCALE: process.env.APP_LOCALE || "en"
    },
    head: {
        title: process.env.APP_NAME,
        titleTemplate: `${process.env.APP_NAME} | Instant Docker Swarm clusters`,
        meta: [
            { charset: "utf-8" },
            {
                name: "viewport",
                content: "width=device-width, initial-scale=1"
            },
            {
                hid: "description",
                name: "description",
                content: "Meta description"
            }
        ],
        link: [
            { rel: "icon", type: "image/x-icon", href: "/favicon.ico" },
            {
                rel: "stylesheet",
                href:
                    "https://fonts.googleapis.com/css?family=Nunito&display=swap"
            }
        ],
        loading: { color: "#007bff" }
    },
    proxy: {
        "/api": `${process.env.APP_URL}:8000`
    },
    router: {
        middleware: []
    },
    plugins: ["~/plugins/vue-composition-api", "~/plugins/vee-validate"],
    modules: [["@nuxtjs/axios", { proxy: true, prefix: "/api" }]],
    buildModules: ["@nuxtjs/tailwindcss"],
    build: {
        transpile: ["vee-validate/dist/rules"],
        extend(config, ctx) {
            // Run ESLint on save
            if (ctx.isDev && ctx.isClient) {
                config.module.rules.push({
                    enforce: "pre",
                    test: /\.(js|vue)$/,
                    loader: "eslint-loader",
                    exclude: /(node_modules)/
                });
            }
        }
    }
};
