<template>
    <div class="relative inline-block">
        <div class="cursor-pointer" @click="isOpen = true">
            <slot name="toggle-content">
                <Button>
                    <slot name="button-content">Open this...</slot>
                </Button>
            </slot>
        </div>
        <div v-if="isOpen" class="absolute z-50 right-0">
            <div
                class="fixed inset-0"
                tabindex="-1"
                @click="isOpen = false"
            ></div>
            <div
                v-if="isOpen"
                class="absolute right-0"
                :class="`mt-${separation}`"
            >
                <slot />
            </div>
        </div>
    </div>
</template>
<script>
// import Popper from "vue-popperjs";
import { ref } from "@vue/composition-api";
import Button from "./elements/Button";
export default {
    name: "Dropdown",
    components: { Button },
    props: {
        separation: { type: Number, default: 2 }
    },
    setup() {
        const isOpen = ref(false);
        return { isOpen };
    }
};
</script>
