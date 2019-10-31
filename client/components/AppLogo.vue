<template>
    <div>
        <h1 class="font-semibold" :class="classNames">
            Laravel Nuxtd
        </h1>
    </div>
</template>
<script>
export default {
    name: "AppLogo",
    props: {
        variant: { type: String, default: "primary" }
    },
    computed: {
        classNames() {
            const classNames = {};
            classNames["text-white"] = this.variant === "light";
            classNames["text-primary"] = this.variant === "primary";
            classNames["text-secondary-dark"] = this.variant === "dark";
            return classNames;
        }
    }
};
</script>
