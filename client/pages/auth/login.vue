<template>
    <div class="mx-auto bg-white shadow rounded max-w-xl overflow-hidden">
        <div class="p-4">
            <h1 class="text-lg">Entrar</h1>
        </div>
        <div class="bg-gray-100 py-4">
            <ValidationObserver ref="observer">
                <p
                    v-if="invalid"
                    class="px-4 -mt-4 py-2 bg-danger-light text-secondary-dark mb-2"
                >
                    {{ invalid }}
                </p>
                <label class="flex flex-wrap">
                    <div class="w-full px-4 text-secondary">
                        Email:
                    </div>
                    <div class="w-full px-4">
                        <ValidationProvider
                            v-slot="props"
                            name="Email"
                            rules="required|email"
                        >
                            <Input
                                v-model="form.email"
                                type="text"
                                mame="email"
                                :status="resolveStatus(props)"
                            />
                            <p class="text-danger mt-1">
                                {{ props.errors[0] }}
                            </p>
                        </ValidationProvider>
                    </div>
                </label>
                <label class="flex flex-wrap mt-3">
                    <div class="w-full px-4 text-secondary">
                        Password:
                    </div>
                    <div class="w-full px-4">
                        <ValidationProvider
                            v-slot="props"
                            rules="required"
                            name="Password"
                        >
                            <Input
                                v-model="form.password"
                                name="password"
                                type="password"
                                :status="resolveStatus(props)"
                            />
                            <p class="text-danger mt-1">
                                {{ props.errors[0] }}
                            </p>
                        </ValidationProvider>
                    </div>
                </label>
                <div class="mt-4">
                    <div class="px-4">
                        <!--<label class="flex items-center mb-2">-->
                        <!--<input type="checkbox" class="mr-2" />-->
                        <!--<span>Remember Me</span>-->
                        <!--</label>-->
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
                    </div>
                </div>
            </ValidationObserver>
        </div>
    </div>
</template>

<script>
import { ref } from "@vue/composition-api";
import Input from "../../components/elements/Input";
import Button from "../../components/elements/Button";
import { useValidation } from "../../composables/use-validation";

export default {
    middleware: ["auth"],
    auth: "guest",
    components: { Input, Button },
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
