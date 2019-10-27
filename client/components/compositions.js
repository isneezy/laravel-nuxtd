import { computed } from "@vue/composition-api";

export function useHandleStatus(status) {
    const isSuccess = computed(
        () => status.value === true || status.value === "success"
    );
    const isWarning = computed(() => status.value === "warning");
    const isError = computed(
        () => status.value === false || status.value === "error"
    );
    return { isSuccess, isWarning, isError };
}

export function useHandleClasses({
    baseClass,
    errorStatusClass,
    successStatusClass,
    warningStatusClass,
    isError,
    isSuccess,
    isWarning
}) {
    const statusClasses = computed(() => {
        const classes = [];
        if (isError.value) classes.push(errorStatusClass);
        if (isSuccess.value) classes.push(successStatusClass);
        if (isWarning.value) classes.push(warningStatusClass);
        return classes;
    });

    const currentClasses = computed(() => {
        return [baseClass].concat(statusClasses.value);
    });

    return { statusClasses, currentClasses };
}

export const useParseStatus = () => (valid, dirty) => {
    return null;
};
