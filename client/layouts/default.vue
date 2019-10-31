<template>
    <div
        class="bg-gray-200 h-full min-h-screen antialiased text-sm font-sans text-secondary-dark"
    >
        <TheHeader class="bg-white shadow" />
        <nuxt />
        <EmailVerificationNotice />
    </div>
</template>
<script>
import TheHeader from "~/components/TheHeader";
import EmailVerificationNotice from "~/components/auth/EmailVerficationNotice";
export default {
    components: { TheHeader, EmailVerificationNotice }
};
</script>
