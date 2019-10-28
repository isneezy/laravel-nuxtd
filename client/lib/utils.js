import UUID from "uuid-js";

export function uuid() {
    return UUID.create().toString();
}

