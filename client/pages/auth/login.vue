<template>
    <div class="mx-auto max-w-xl" @keyup.enter="login">
        <Card class="shadow" title="Entrar">
            <ValidationObserver ref="observer">
                <p
                    v-if="invalid"
                    class="px-10 -mt-4 -mx-6 py-2 bg-danger-light text-secondary-dark mb-2"
                >
                    {{ invalid }}
                </p>
                <InputGroup
                    v-slot="{ status }"
                    label="Email"
                    name="Email"
                    rules="required|email"
                >
                    <Input
                        v-model="form.email"
                        type="text"
                        mame="email"
                        :status="status"
                    />
                </InputGroup>
                <InputGroup
                    v-slot="{ status }"
                    label="Password"
                    rules="required"
                    name="Password"
                >
                    <Input
                        v-model="form.password"
                        name="password"
                        type="password"
                        :status="status"
                    />
                </InputGroup>
                <InputGroup default-classes="">
                    <div class="flex items-center">
                        <Button
                            :disabled="pending"
                            variant="primary"
                            class="mr-6"
                            @click.native="login"
                        >
                            Login
                        </Button>
                        <a
                            href="#"
                            class="text-primary hover:text-primary-dark hover:underline"
                        >
                            Forgot you password?
                        </a>
                    </div>
                </InputGroup>
            </ValidationObserver>
        </Card>
    </div>
</template>

<script>
import { ref } from "@vue/composition-api";
import Input from "~/components/forms/elements/Input";
import Button from "~/components/forms/elements/Button";
import { useValidation } from "~/composables/use-validation";
import Card from "~/components/Card";
import InputGroup from "~/components/forms/InputGroup";

export default {
    middleware: ["auth"],
    auth: "guest",
    components: { InputGroup, Card, Input, Button },
    setup(props, { root }) {
        const observer = ref(null);
        const { resolveStatus } = useValidation();
        const pending = ref(false);
        const invalid = ref(false);
        const form = ref({
            email: "",
            password: ""
        });

        const login = async () => {
            pending.value = true;
            const isValid = await observer.value.validate();
            try {
                if (isValid) {
                    await root.$auth.loginWith("local", { data: form.value });
                }
            } catch (e) {
                if (e.response) {
                    invalid.value = e.response.data.message;
                    if (e.response) {
                        observer.value.setErrors(e.response.data.errors);
                    }
                }
            } finally {
                pending.value = false;
            }
        };
        return { form, resolveStatus, observer, login, pending, invalid };
    }
};
</script>
