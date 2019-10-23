export default async function({ $axios, res, req }) {
    if (process.server) {
        const response = await $axios.get("http://localhost:8000");
        const serializedCookie = response.headers["set-cookie"];
        const prevCookies = res.getHeader("Set-Cookie");
        res.setHeader(
            "Set-Cookie",
            [].concat(prevCookies, serializedCookie).filter(v => v)
        );
    }
}
