export function resolveStatus({ errors, valid, validated }) {
    if (errors[0]) {
        return "error";
    }
    if (valid && validated) {
        return "success";
    }
    return "";
}
