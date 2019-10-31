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
                    <div class="ml-10 relative flex items-center">
                        <HeaderMenuItem>Servers</HeaderMenuItem>
                        <HeaderMenuItem class="ml-8">Clusters</HeaderMenuItem>
                        <HeaderMenuItem class="ml-8">Apps</HeaderMenuItem>
                        <template v-if="!$auth.loggedIn">
                            <HeaderMenuItem
                                tag="NuxtLink"
                                to="/auth/login"
                                class="ml-8"
                            >
                                Login
                            </HeaderMenuItem>
                            <HeaderMenuItem
                                tag="NuxtLink"
                                to="/auth/login"
                                class="ml-8 px-3 py-2 rounded bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400"
                            >
                                Create account
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
        </div>
    </div>
</template>
<script>
import ProfileDropdown from "../components/ProfileDropdown";
import AppLogo from "./AppLogo";
import HeaderMenuItem from "./HeaderMenuItem";

export default {
    name: "TheHeader",
    components: { HeaderMenuItem, AppLogo, ProfileDropdown }
};
</script>
