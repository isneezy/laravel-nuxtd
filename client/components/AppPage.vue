<template>
    <div :class="classNames">
        <slot />
    </div>
</template>

<script>
export default {
    name: "AppPage",
    props: {
        baseClass: { type: String, default: "container mx-auto" },
        defaultClass: { type: String, default: "mt-8 md:px-8 px-4" }
    },
    computed: {
        classNames() {
            return [].concat(this.baseClass, this.defaultClass);
        }
    }
};
</script>
