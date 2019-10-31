<template>
    <div>
        <ProfileInfoForm :user="data" />
        <PasswordUpdateForm class="mt-4" />
    </div>
</template>
<script>
import ProfileInfoForm from "~/components/auth/ProfileInfoForm";
import PasswordUpdateForm from "~/components/auth/PasswordUpdateForm";
export default {
    components: { PasswordUpdateForm, ProfileInfoForm },
    async asyncData({ app, $auth }) {
        const { data } = await app.$repositories.users.show($auth.user.id);
        return { data };
    }
};
</script>
