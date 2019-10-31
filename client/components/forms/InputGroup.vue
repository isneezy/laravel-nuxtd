<template>
    <label class="flex flex-wrap -mx-2" :class="defaultClasses">
        <span
            class="w-full md:w-3/12 text-secondary md:text-right px-2 pt-1 pb-1 md:pb-0"
        >
            <template v-if="label">
                {{ label }}:
            </template>
        </span>
        <div class="w-full md:w-8/12 px-2">
            <ValidationProvider
                v-slot="props"
                :name="name"
                :rules="rules"
                tag="div"
            >
                <slot :status="resolveStatus(props)" />
                <p class="text-danger mt-1">
                    {{ props.errors[0] }}
                </p>
            </ValidationProvider>
        </div>
    </label>
</template>
<script>
import { useValidation } from "~/composables/use-validation";

export default {
    name: "InputGroup",
    props: {
        rules: { type: [String, Object], default: null },
        name: { default: null, type: String },
        label: { default: null, type: String },
        defaultClasses: { type: String, default: "mb-5" }
    },
    setup() {
        const { resolveStatus } = useValidation();
        return { resolveStatus };
    }
};
</script>
