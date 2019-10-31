<template>
    <AppPage>
        <h4 class="font-semibold text-xl">Meu Perfil</h4>
        <div class="flex flex-wrap -mx-4 mt-4">
            <div class="w-full lg:w-3/12 px-4">
                <ul>
                    <li
                        v-for="(link, index) in links"
                        :key="index"
                        class="mb-2"
                    >
                        <nuxt-link
                            :to="link.to"
                            active-class="text-primary font-semibold"
                            class="flex items-baseline hover:text-primary"
                        >
                            <!-- eslint-disable-next-line vue/no-v-html-->
                            <i class="h-3 w-3 mr-2" v-html="link.icon"></i>
                            {{ link.label }}
                        </nuxt-link>
                    </li>
                </ul>
            </div>
            <div class="w-full lg:w-9/12 px-4">
                <NuxtChild />
            </div>
        </div>
    </AppPage>
</template>
<script>
import AppPage from "../components/AppPage";
export default {
    components: { AppPage },
    data: () => ({
        links: [
            {
                to: "/my/profile",
                label: "Autenticação e Informação pessoal",
                icon: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z"/></svg>`
            }
            // {
            //     to: "/my/api-keys",
            //     label: "API Keys",
            //     icon: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M360 144H24c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h8c0 80.208 59.02 146.628 136 158.208V512h48v-81.792c76.979-11.58 136-78 136-158.208h8c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24zm-24 80h-32v48c0 61.898-50.092 112-112 112-61.898 0-112-50.092-112-112v-48H48v-32h288v32zm-72-96V24c0-13.255 10.745-24 24-24s24 10.745 24 24v104h-48zm-192 0V24C72 10.745 82.745 0 96 0s24 10.745 24 24v104H72z"/></svg>`
            // }
        ]
    })
};
</script>
