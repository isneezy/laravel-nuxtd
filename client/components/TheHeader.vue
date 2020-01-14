<template>
    <div>
        <div class="container mx-auto">
            <div class="md:px-8">
                <nav
                    class="relative flex flex-wrap items-center justify-between md:py-4"
                >
                    <div class="relative z-10 flex-shrink-0 pl-4 py-4 md:p-0">
                        <nuxt-link to="/">
                            <AppLogo />
                        </nuxt-link>
                    </div>
                    <div class="flex flex-shrink-0 pr-4 md:hidden">
                        <ProfileDropdown
                            v-if="$auth.loggedIn"
                            class="mr-1"
                            :user="$auth.user"
                        />
                        <button
                            class="block text-gray-600 focus:outline-none focus:text-gray-900"
                            aria-label="Menu"
                            @click="isOpen = true"
                        >
                            <svg
                                class="h-6 w-6"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M3 6C3 5.44772 3.44772 5 4 5H20C20.5523 5 21 5.44772 21 6C21 6.55228 20.5523 7 20 7H4C3.44772 7 3 6.55228 3 6Z"
                                />
                                <path
                                    d="M3 12C3 11.4477 3.44772 11 4 11H20C20.5523 11 21 11.4477 21 12C21 12.5523 20.5523 13 20 13H4C3.44772 13 3 12.5523 3 12Z"
                                />
                                <path
                                    d="M4 17C3.44772 17 3 17.4477 3 18C3 18.5523 3.44772 19 4 19H20C20.5523 19 21 18.5523 21 18C21 17.4477 20.5523 17 20 17H4Z"
                                />
                            </svg>
                        </button>
                    </div>
                    <div
                        class="hidden md:flex md:items-center md:justify-between md:ml-10 relative"
                    >
                        <HeaderMenuItem>Serviços</HeaderMenuItem>
                        <HeaderMenuItem class="ml-8">Sobre nós</HeaderMenuItem>
                        <HeaderMenuItem class="ml-8">
                            Contacte-nos
                        </HeaderMenuItem>
                        <template v-if="!$auth.loggedIn">
                            <HeaderMenuItem
                                tag="NuxtLink"
                                to="/auth/login"
                                class="ml-8"
                            >
                                Entrar
                            </HeaderMenuItem>
                            <HeaderMenuItem
                                tag="NuxtLink"
                                to="/auth/register"
                                class="ml-8 px-3 py-2 rounded bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400"
                            >
                                Crirar conta
                            </HeaderMenuItem>
                        </template>
                        <template v-else>
                            <ProfileDropdown
                                class="ml-8"
                                :separation="6"
                                :user="$auth.user"
                            />
                        </template>
                    </div>
                </nav>
            </div>
            <div class="md:hidden">
                <!-- Off-canvas menu background overly -->
                <div v-if="isOpen" class="z-10 fixed inset-0">
                    <div class="absolute inset-0 bg-smoke"></div>
                </div>
                <!-- Off-canvas menu -->
                <div
                    v-if="isOpen"
                    class="z-10 fixed inset-y-0 right-0 max-w-xs w-full bg-white overflow-y-auto"
                >
                    <div class="absolute top-0 right-0 p-4">
                        <button
                            class="text-gray-600 focus:outline-none focus:text-gray-900"
                            @click="isOpen = false"
                        >
                            <svg
                                class="h-6 w-6"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M18.2929 19.7071C18.6834 20.0976 19.3166 20.0976 19.7071 19.7071C20.0976 19.3166 20.0976 18.6834 19.7071 18.2929L13.4142 12L19.7071 5.70711C20.0976 5.31658 20.0976 4.68342 19.7071 4.29289C19.3166 3.90237 18.6834 3.90237 18.2929 4.29289L12 10.5858L5.70711 4.29289C5.31658 3.90237 4.68342 3.90237 4.29289 4.29289C3.90237 4.68342 3.90237 5.31658 4.29289 5.70711L10.5858 12L4.29289 18.2929C3.90237 18.6834 3.90237 19.3166 4.29289 19.7071C4.68342 20.0976 5.31658 20.0976 5.70711 19.7071L12 13.4142L18.2929 19.7071Z"
                                />
                            </svg>
                        </button>
                    </div>
                    <div class="px-4 pt-4 pb-6">
                        <AppLogo variant="dark" />
                        <HeaderMenuItem
                            class="mt-8 text-gray-600 block font-semibold tracking-wider"
                        >
                            Serviços
                        </HeaderMenuItem>
                        <HeaderMenuItem class="mt-4 text-gray-600 block">
                            Sobre nós
                        </HeaderMenuItem>
                        <HeaderMenuItem class="mt-4 text-gray-600 block">
                            Contacte-nos
                        </HeaderMenuItem>
                        <HeaderMenuItem class="mt-4 text-gray-600 block">
                            Contacte-nos
                        </HeaderMenuItem>
                        <template v-if="!$auth.loggedIn">
                            <HeaderMenuItem
                                tag="NuxtLink"
                                to="/auth/login"
                                class="mt-4 text-gray-600 block"
                            >
                                Entrar
                            </HeaderMenuItem>
                            <HeaderMenuItem
                                tag="NuxtLink"
                                to="/auth/register"
                                class="mt-4 block px-3 py-2 rounded bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400"
                            >
                                Crirar conta
                            </HeaderMenuItem>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import ProfileDropdown from "../components/ProfileDropdown";
import AppLogo from "./AppLogo";
import HeaderMenuItem from "./HeaderMenuItem";

export default {
    name: "TheHeader",
    components: { HeaderMenuItem, AppLogo, ProfileDropdown },
    data: () => ({
        isOpen: false
    })
};
</script>
