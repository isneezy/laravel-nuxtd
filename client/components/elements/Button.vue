<template>
    <component :is="tag" :to="to" :class="currentClasses" class="relative">
        <span :class="{ 'opacity-0': busy }">
            <slot />
        </span>
        <Spinner
            v-if="busy"
            class="h-5 w-5 absolute"
            style="top: 50%; left: 50%; transform: translateY(-50%) translateX(-50%)"
        />
    </component>
</template>
<script>
import { computed } from "@vue/composition-api";
import Spinner from "../Spinner";
const defaults = {
    baseClass: "cursor-pointer px-5 py-2 rounded",
    defaultClass: "border-secondary hover:bg-secondary-light",
    primaryClass: "bg-primary hover:bg-primary-dark text-white",
    successClass: "bg-success hover:bg-success-dark text-white",
    dangerClass: "bg-danger hover:bg-danger-dark text-white",
    warningClass: "bg-warning hover:bg-warning-dark text-white"
};

export default {
    components: { Spinner },
    props: {
        tag: {
            default: "button",
            type: String
        },
        variant: {
            default: null,
            type: String
        },
        to: { type: [String, Object], default: null },
        busy: {
            type: Boolean,
            default: false
        }
    },
    setup(props) {
        const currentClasses = computed(() => {
            const classes = [defaults.baseClass];
            if (props.busy) {
                classes.push("pointer-events-none");
            }
            switch (props.variant) {
                case "warning":
                    classes.push(defaults.warningClass);
                    break;
                case "danger":
                    classes.push(defaults.dangerClass);
                    break;
                case "success":
                    classes.push(defaults.successClass);
                    break;
                case "primary":
                    classes.push(defaults.primaryClass);
                    break;
                default:
                    classes.push(defaults.defaultClass);
                    break;
            }
            return classes;
        });

        return { currentClasses };
    }
};
</script>
