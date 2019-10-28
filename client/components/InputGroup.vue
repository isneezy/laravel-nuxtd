<template>
    <label class="flex flex-wrap mb-3">
        <div class="w-full px-4 text-secondary">{{ label }}:</div>
        <div class="w-full px-4">
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
import { useValidation } from "../composables/use-validation";

export default {
    name: "InputGroup",
    props: {
        rules: { type: [String, Object], default: null },
        name: { default: null, type: String },
        label: { default: null, type: String }
    },
    setup() {
        const { resolveStatus } = useValidation();
        return { resolveStatus };
    }
};
</script>
