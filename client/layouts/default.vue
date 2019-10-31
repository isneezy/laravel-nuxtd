<template>
    <div
        class="bg-gray-200 h-full min-h-screen antialiased text-sm font-sans text-secondary-dark"
    >
        <TheHeader class="bg-white shadow" />
        <div class="container mx-auto mt-8 md:px-8">
            <nuxt />
            <EmailVerificationNotice />
        </div>
    </div>
</template>
<script>
import EmailVerificationNotice from "../components/EmailVerficationNotice";
import TheHeader from "../components/TheHeader";
export default {
    components: { TheHeader, EmailVerificationNotice }
};
</script>
