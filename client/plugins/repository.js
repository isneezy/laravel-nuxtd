import createRepository from "../lib/api/repository";

export default function repositoryPlugin({ $axios }, inject) {
    const repoWithAxios = createRepository($axios);
    const repositories = {
        users: repoWithAxios("users")
    };
    inject("repositories", repositories);
}
