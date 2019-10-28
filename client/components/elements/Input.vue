<template>
    <input
        v-model="currentValue"
        :name="name"
        :placeholder="placeholder"
        :type="type"
        :class="currentClasses"
        @blur="onBlur"
        @focus="onFocus"
    />
</template>
<script>
import { computed, watch, ref, onMounted } from "@vue/composition-api";
import { useHandleClasses, useHandleStatus } from "../compositions";
import htmlInputAttributes from "../mixins/htmlInputAttributes";
import commonAttributes from "../mixins/commonAttributes";

const defaults = {
    baseClass:
        "appearance-none w-full border-2 rounded px-2 py-1 focus:outline-none",
    defaultStatusClass: "bg-white",
    successStatusClass: "border-success",
    warningStatusClass: "border-warning",
    errorStatusClass: "border-danger",
    disabledStatusClass: "bg-secondary-light cursor-not-allowed opacity-75"
};

export default {
    name: "Input",
    mixins: [htmlInputAttributes, commonAttributes],
    setup(props, { emit }) {
        const currentValue = ref(null);
        const valueWhenFocus = ref(null);
        watch(() => (currentValue.value = props.value));

        onMounted(() => {
            watch(currentValue, newValue => {
                emit("input", newValue);
            });
        });

        const onBlur = e => {
            emit("blur", e);
            if (currentValue.value !== valueWhenFocus.value) {
                emit("change", currentValue.value);
            }
        };

        const onFocus = e => {
            console.log(currentValue.value);
            emit("focus", e);
            valueWhenFocus.value = currentValue;
        };

        const status = computed(() => props.status);
        const { isError, isSuccess, isWarning } = useHandleStatus(status);
        const _props = Object.assign(
            props,
            { isError, isSuccess, isWarning },
            defaults
        );
        const { currentClasses, statusClasses } = useHandleClasses(_props);
        return {
            onBlur,
            onFocus,
            currentClasses,
            statusClasses,
            isWarning,
            isSuccess,
            isError,
            currentValue
        };
    }
};
</script>
