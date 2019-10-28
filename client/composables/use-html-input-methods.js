import { ref } from "@vue/composition-api";

export default function useHtmlInputMethods(el = ref(document)) {
    const blur = () => el.value.blur();
    const click = () => el.value.blur();
    const focus = () => el.value.focus();
    const select = () => el.value.select();
    const selectRange = () => el.value.selectRange();
    const setRangeText = () => el.value.setRangeText();

    return { blur, click, focus, select, selectRange, setRangeText };
}
