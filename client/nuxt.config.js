require("dotenv").config();

export default {
    srcDir: __dirname,
    loading: { color: "var(--color-primary)" },
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
        ]
    },
    auth: {
        strategies: {
            local: {
                endpoints: {
                    login: {
                        url: "/api/auth/login",
                        method: "post",
                        propertyName: "access_token"
                    },
                    user: {
                        url: "/api/auth/user",
                        method: "get",
                        propertyName: "data"
                    }
                }
            }
        }
    },
    proxy: {
        "/api": {
            target: "http://127.0.0.1:8080",
            xfwd: true
        },
        "/admin": {
            target: "http://127.0.0.1:8080",
            xfwd: true
        }
    },
    router: {
        middleware: []
    },
    plugins: [
        "~/plugins/vue-composition-api",
        "~/plugins/vee-validate",
        "~/plugins/repository"
    ],
    modules: [["@nuxtjs/axios", { proxy: true }], "@nuxtjs/auth"],
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
