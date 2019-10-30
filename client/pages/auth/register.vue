<template>
    <div class="mx-auto max-w-xl">
        <Card class="shadow" title="Registo">
            <SuccessBox v-if="success" :message="success" />
            <template v-else>
                <ValidationObserver ref="observer">
                    <InputGroup
                        v-slot="{ status }"
                        label="Name"
                        name="name"
                        rules="required"
                    >
                        <Input v-model="form.name" :status="status" />
                    </InputGroup>
                    <InputGroup
                        v-slot="{ status }"
                        label="Email"
                        name="email"
                        rules="required|email"
                    >
                        <Input v-model="form.email" :status="status" />
                    </InputGroup>
                    <InputGroup
                        v-slot="{ status }"
                        label="Senha"
                        name="password"
                        rules="required|min:8"
                    >
                        <Input
                            v-model="form.password"
                            type="password"
                            :status="status"
                        />
                    </InputGroup>
                    <InputGroup
                        v-slot="{ status }"
                        label="Confirmar Senha"
                        name="password_confirmation"
                        rules="required|confirmed:password"
                    >
                        <Input
                            v-model="form.password_confirmation"
                            type="password"
                            :status="status"
                        />
                    </InputGroup>
                    <InputGroup default-classes="">
                        <Button
                            variant="primary"
                            class="mr-6"
                            @click.native="register"
                        >
                            Registar
                        </Button>
                    </InputGroup>
                </ValidationObserver>
            </template>
        </Card>
    </div>
</template>
<script>
import { ref } from "@vue/composition-api";
import InputGroup from "../../components/InputGroup";
import Input from "../../components/elements/Input";
import Button from "../../components/elements/Button";
import Card from "../../components/Card";
import SuccessBox from "../../components/SuccessBox";
export default {
    components: { SuccessBox, Card, Button, Input, InputGroup },
    setup(props, { root }) {
        const observer = ref(null);
        const success = ref(false);
        const form = ref({
            name: "",
            email: "",
            password: "",
            password_confirmation: ""
        });

        const register = async () => {
            try {
                if (await observer.value.validate()) {
                    const { message } = await root.$axios.$post(
                        "/api/auth/register",
                        form.value
                    );
                    success.value = message;
                }
            } catch (e) {
                if (e.response) {
                    observer.value.setErrors(e.response.data.errors);
                }
            }
        };

        return { form, register, observer, success };
    }
};
</script>
