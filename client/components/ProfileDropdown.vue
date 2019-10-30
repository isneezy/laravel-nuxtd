<template>
    <Dropdown :separation="separation">
        <Avatar slot="toggle-content" :src="user.avatar" />
        <div class="w-64 bg-white rounded-lg shadow-lg">
            <div class="flex items-center px-6 py-4">
                <Avatar
                    slot="toggle-content"
                    :src="user.avatar"
                    alt="Avatar of Jonathan Reinink"
                />
                <div class="ml-4 truncate">
                    <p class="font-semibold text-gray-900 leading-none">
                        {{ user.name }}
                    </p>
                    <p class="text-sm text-gray-600 leading-none">
                        {{ user.email }}
                    </p>
                </div>
            </div>
            <div class="py-1 border-t-2 border-gray-200">
                <nuxt-link
                    to="/my/profile"
                    class="block px-6 py-3 leading-tight hover:bg-gray-200"
                >
                    Meu perfil
                </nuxt-link>
            </div>
            <div class="py-1 border-t-2 border-gray-200">
                <a
                    href="javascript:void(0)"
                    class="block px-6 py-3 leading-tight hover:bg-gray-200"
                    @click="logout"
                >
                    Terminar sess&atilde;o
                </a>
            </div>
        </div>
    </Dropdown>
</template>

<script>
import Dropdown from "./Dropdown";
import Avatar from "./Avatar";
export default {
    name: "ProfileDropdown",
    components: { Avatar, Dropdown },
    props: {
        user: { type: Object, required: true },
        separation: { type: Number, default: 2 }
    },
    setup(props, { root }) {
        const logout = async () => {
            await root.$auth.logout();
        };
        return { logout };
    }
};
</script>

<style scoped></style>
