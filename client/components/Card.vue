<template>
    <div
        class="relative flex flex-col break-words bg-white border border-gray-100 rounded overflow-hidden"
    >
        <div class="bg-white border-b border-gray-100 py-3 px-6">
            <slot name="title">
                <h5 class="font-semibold">{{ title }}</h5>
            </slot>
        </div>
        <div class="bg-gray-100 py-4 px-6">
            <slot />
        </div>
    </div>
</template>
<script>
export default {
    name: "Card",
    props: {
        title: { type: String, default: "" }
    }
};
</script>
