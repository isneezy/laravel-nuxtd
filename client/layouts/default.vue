<template>
    <div
        class="bg-gray-200 h-full min-h-screen antialiased text-sm font-sans text-secondary-dark"
    >
        <div class="bg-white shadow">
            <div class="container mx-auto">
                <div class="md:px-8">
                    <nav
                        class="relative flex flex-wrap items-center justify-between md:py-4"
                    >
                        <div
                            class="relative z-10 flex-shrink-0 pl-4 py-4 md:p-0"
                        >
                            <nuxt-link to="/">
                                <h1 class="font-semibold text-lg">
                                    Laravel Nuxtd
                                </h1>
                            </nuxt-link>
                        </div>
                        <div class="ml-10 relative flex items-center">
                            <a
                                href="#"
                                class="text-sm font-medium text-gray-900 hover:text-gray-700"
                            >
                                Servi&ccedil;os
                            </a>
                            <a
                                href="#"
                                class="ml-8 text-sm font-medium text-gray-900 hover:text-gray-700"
                            >
                                Sobre n&oacute;s
                            </a>
                            <a
                                href="#"
                                class="ml-8 text-sm font-medium text-gray-900 hover:text-gray-700"
                            >
                                Contacte-nos
                            </a>
                            <template v-if="!$auth.loggedIn">
                                <nuxt-link
                                    to="/auth/login"
                                    class="ml-8 text-sm font-medium text-gray-900 hover:text-gray-700"
                                >
                                    Entrar
                                </nuxt-link>
                                <nuxt-link
                                    to="/auth/register"
                                    class="ml-8 px-3 py-2 font-medium text-sm rounded bg-gray-300 text-gray-900 hover:bg-gray-400 focus:outline-none focus:bg-gray-400"
                                >
                                    Criar conta
                                </nuxt-link>
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
            </div>
        </div>
        <div class="container mx-auto mt-8 md:px-8">
            <nuxt />
            <EmailVerificationNotice />
        </div>
    </div>
</template>
<script>
import ProfileDropdown from "../components/ProfileDropdown";
import EmailVerificationNotice from "../components/EmailVerficationNotice";
export default {
    components: { EmailVerificationNotice, ProfileDropdown }
};
</script>
