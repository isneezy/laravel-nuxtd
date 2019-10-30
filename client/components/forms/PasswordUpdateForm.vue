<template>
    <div class="bg-white shadow rounded overflow-hidden">
        <div class="p-4">
            <h4 class="font-semibold">Alterar Senha</h4>
        </div>
        <div class="bg-gray-100 p-4">
            <ValidationObserver ref="observer">
                <InputGroup
                    v-slot="{ status }"
                    label="Senha Antiga"
                    name="old_password"
                    rules="required"
                >
                    <Input
                        v-model="form.old_password"
                        type="password"
                        name="password"
                        :status="status"
                    />
                </InputGroup>
                <InputGroup
                    v-slot="{ status }"
                    label="Nova Senha"
                    name="password"
                    rules="required"
                >
                    <Input
                        v-model="form.password"
                        type="password"
                        name="password"
                        autocomplete="new_password"
                        :status="status"
                    />
                </InputGroup>
                <InputGroup
                    v-slot="{ status }"
                    label="Confirmar Senha"
                    name="password_confirmation"
                    rules="required"
                >
                    <Input
                        v-model="form.password_confirmation"
                        name="password_confirmation"
                        type="password"
                        autocomplete="new_password"
                        :status="status"
                    />
                </InputGroup>
            </ValidationObserver>
            <InputGroup>
                <Button variant="primary" @click.native="save">
                    Atualizar senha
                </Button>
            </InputGroup>
        </div>
    </div>
</template>

<script>
import InputGroup from "../InputGroup";
import Input from "../elements/Input";
import Button from "../elements/Button";
export default {
    name: "PasswordUpdateForm",
    components: { Button, Input, InputGroup },
    data: () => ({
        form: {
            old_password: "",
            password: "",
            password_confirmation: ""
        }
    }),
    methods: {
        async save() {
            try {
                if (await this.$refs.observer.validate()) {
                    await this.$axios.$post(
                        `/api/users/${this.$auth.user.id}/change-password`,
                        this.form
                    );
                }
            } catch (e) {
                if (e.response) {
                    this.$refs.observer.setErrors(e.response.data.errors);
                }
            }
        }
    }
};
</script>
