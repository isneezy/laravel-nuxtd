<template>
    <Card title="Mudar informações do perfil" class="shadow">
        <ValidationObserver ref="observer">
            <InputGroup
                v-slot="{ status }"
                label="Nome"
                name="name"
                rules="required"
            >
                <Input v-model="user.name" name="name" :status="status" />
            </InputGroup>
            <InputGroup
                v-slot="{ status }"
                label="Endereço de email"
                name="email"
                rules="required|email"
            >
                <Input v-model="user.email" name="email" :status="status" />
            </InputGroup>
            <InputGroup v-slot="{ status }" label="Avatar" name="avatar">
                <Avatar :src="user.avatar" :size="12" />
            </InputGroup>
            <InputGroup default-classes="">
                <Button variant="primary" @click.native="save">
                    Atualizar perfil
                </Button>
            </InputGroup>
        </ValidationObserver>
    </Card>
</template>
<script>
import InputGroup from "~/components/forms/InputGroup";
import Input from "~/components/forms/elements/Input";
import Button from "~/components/forms/elements/Button";
import Avatar from "~/components/Avatar";
import Card from "~/components/Card";
export default {
    name: "ProfileInfoForm",
    components: { Card, Avatar, Button, Input, InputGroup },
    props: {
        user: { type: Object, required: true }
    },
    methods: {
        async save() {
            try {
                if (await this.$refs.observer.validate()) {
                    const { data } = await this.$repositories.users.update(
                        this.user,
                        this.user.id
                    );
                    this.$auth.setUser(data);
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
