<template>
    <input
        :autocomplete="autocomplete"
        :name="name"
        :placeholder="placeholder"
        :type="type"
        :class="currentClasses"
        :value="value"
        @input="onInput"
        @blur="onBlur"
        @focus="onFocus"
    />
</template>
<script>
import { computed, watch, ref } from "@vue/composition-api";
import {
    useHandleClasses,
    useHandleStatus
} from "~/components/forms/compositions";
import htmlInputAttributes from "~/components/forms/mixins/htmlInputAttributes";
import commonAttributes from "~/components/forms/mixins/commonAttributes";

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
        watch(() => {
            currentValue.value = props.value;
        });

        const onBlur = e => {
            emit("blur", e);
            if (currentValue.value !== valueWhenFocus.value) {
                emit("change", currentValue.value);
            }
        };

        const onInput = e => emit("input", e.target.value);

        const onFocus = e => {
            emit("focus", e);
            valueWhenFocus.value = currentValue.value;
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
            currentValue,
            valueWhenFocus,
            onInput
        };
    }
};
</script>
