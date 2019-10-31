<script>
export default {
    name: "HeaderMenuItem",
    props: {
        tag: { type: String, default: "a" },
        to: { type: [String, Object], default: null },
        baseClass: { type: String, default: "null" },
        defaultClass: {
            type: String,
            default: "text-sm font-medium text-gray-900 hover:text-gray-700"
        }
    },
    computed: {
        classNames() {
            return [].concat(this.baseClass, this.defaultClass);
        }
    },
    render(h) {
        return h(
            this.tag,
            { class: this.classNames, props: { to: this.to } },
            this.$slots.default
        );
    }
};
</script>
