<script>
import { computed } from "@vue/composition-api";
const defaults = {
    baseClass: "cursor-pointer px-5 py-2 rounded",
    defaultClass: "border-secondary hover:bg-secondary-light",
    primaryClass: "bg-primary hover:bg-primary-dark text-white",
    successClass: "bg-success hover:bg-success-dark text-white",
    dangerClass: "bg-danger hover:bg-danger-dark text-white",
    warningClass: "bg-warning hover:bg-warning-dark text-white"
};

export default {
    props: {
        tag: {
            default: "button",
            type: String
        },
        variant: {
            default: null,
            type: String
        },
        to: { type: [String, Object], default: null }
    },
    setup(props) {
        const currentClasses = computed(() => {
            const classes = [defaults.baseClass];
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
    },
    render(h) {
        return h(
            this.tag,
            {
                class: this.currentClasses,
                props: {
                    to: this.to
                }
            },
            this.$slots.default
        );
    }
};
</script>
