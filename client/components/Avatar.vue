<template>
    <img class="rounded-full" :class="classNames" :src="src" :alt="alt" />
</template>

<script>
import { computed } from "@vue/composition-api";
export default {
    name: "Avatar",
    props: {
        src: { type: String, required: true },
        alt: { type: String, default: "Avatar" },
        size: { type: Number, default: 8 }
    },
    setup(props) {
        const classNames = computed(() => {
            const classNames = [];
            classNames.push(`w-${props.size}`);
            classNames.push(`h-${props.size}`);
            return classNames;
        });
        return { classNames };
    }
};
</script>

<style scoped></style>
