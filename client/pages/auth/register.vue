<template>
    <div class="mx-auto bg-white shadow rounded max-w-xl overflow-hidden">
        <template v-if="!success">
            <div class="p-4">
                <h1 class="text-lg">Registo</h1>
            </div>
            <div class="bg-gray-100 py-4">
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
                    <div class="flex">
                        <div class="w-1/2">
                            <InputGroup
                                v-slot="{ status }"
                                label="Password"
                                name="password"
                                rules="required|min:8"
                            >
                                <Input
                                    v-model="form.password"
                                    type="password"
                                    :status="status"
                                />
                            </InputGroup>
                        </div>
                        <div class="w-1/2">
                            <InputGroup
                                v-slot="{ status }"
                                label="Confirm Password"
                                name="password_confirmation"
                                rules="required|confirmed:password"
                            >
                                <Input
                                    v-model="form.password_confirmation"
                                    type="password"
                                    :status="status"
                                />
                            </InputGroup>
                        </div>
                    </div>
                </ValidationObserver>
                <div class="mt-4">
                    <div class="px-4">
                        <!--<label class="flex items-center mb-2">-->
                        <!--<input type="checkbox" class="mr-2" />-->
                        <!--<span>Remember Me</span>-->
                        <!--</label>-->
                        <div class="flex items-center">
                            <Button
                                variant="primary"
                                class="mr-6"
                                @click.native="register"
                            >
                                Registar
                            </Button>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <div v-else class="bg-gray-100">
            <div class="flex justify-center">
                <svg
                    version="1.1"
                    xmlns:x="&amp;ns_extend;"
                    xmlns:i="&amp;ns_ai;"
                    xmlns:graph="&amp;ns_graphs;"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    x="0px"
                    y="0px"
                    viewBox="0 0 98 98"
                    class="h-20 w-20 my-5"
                    xml:space="preserve"
                >
                    <style type="text/css">
                        .st0 {
                            fill: #ffffff;
                        }
                        .st1 {
                            fill: #1abc9c;
                        }
                        .st2 {
                            fill: #ffffff;
                            stroke: #1abc9c;
                            stroke-width: 2;
                            stroke-miterlimit: 10;
                        }
                        .st3 {
                            fill: none;
                            stroke: #ffffff;
                            stroke-width: 2;
                            stroke-linecap: round;
                            stroke-miterlimit: 10;
                        }
                    </style>
                    <g i:extraneous="self">
                        <g id="XMLID_4_">
                            <path
                                id="XMLID_49_"
                                class="st1"
                                d="M77.3,42.7V77c0,0.6-0.4,1-1,1H21.7c-0.5,0-1-0.5-1-1V42.7c0-0.3,0.1-0.6,0.4-0.8l27.3-21.7
                                                        c0.3-0.3,0.8-0.3,1.2,0l27.3,21.7C77.1,42.1,77.3,42.4,77.3,42.7z"
                            ></path>
                            <path
                                id="XMLID_48_"
                                class="st2"
                                d="M66.5,69.5h-35c-1.1,0-2-0.9-2-2V26.8c0-1.1,0.9-2,2-2h35c1.1,0,2,0.9,2,2v40.7
                                                        C68.5,68.6,67.6,69.5,66.5,69.5z"
                            ></path>
                            <path
                                id="XMLID_47_"
                                class="st1"
                                d="M62.9,33.4H47.2c-0.5,0-0.9-0.4-0.9-0.9v-0.2c0-0.5,0.4-0.9,0.9-0.9h15.7
                                                        c0.5,0,0.9,0.4,0.9,0.9v0.2C63.8,33,63.4,33.4,62.9,33.4z"
                            ></path>
                            <path
                                id="XMLID_46_"
                                class="st1"
                                d="M62.9,40.3H47.2c-0.5,0-0.9-0.4-0.9-0.9v-0.2c0-0.5,0.4-0.9,0.9-0.9h15.7
                                                        c0.5,0,0.9,0.4,0.9,0.9v0.2C63.8,39.9,63.4,40.3,62.9,40.3z"
                            ></path>
                            <path
                                id="XMLID_45_"
                                class="st1"
                                d="M62.9,47.2H47.2c-0.5,0-0.9-0.4-0.9-0.9v-0.2c0-0.5,0.4-0.9,0.9-0.9h15.7
                                                        c0.5,0,0.9,0.4,0.9,0.9v0.2C63.8,46.8,63.4,47.2,62.9,47.2z"
                            ></path>
                            <path
                                id="XMLID_44_"
                                class="st1"
                                d="M62.9,54.1H47.2c-0.5,0-0.9-0.4-0.9-0.9v-0.2c0-0.5,0.4-0.9,0.9-0.9h15.7
                                                        c0.5,0,0.9,0.4,0.9,0.9v0.2C63.8,53.7,63.4,54.1,62.9,54.1z"
                            ></path>
                            <path
                                id="XMLID_43_"
                                class="st2"
                                d="M41.6,40.1h-5.8c-0.6,0-1-0.4-1-1v-6.7c0-0.6,0.4-1,1-1h5.8c0.6,0,1,0.4,1,1v6.7
                                                        C42.6,39.7,42.2,40.1,41.6,40.1z"
                            ></path>
                            <path
                                id="XMLID_42_"
                                class="st2"
                                d="M41.6,54.2h-5.8c-0.6,0-1-0.4-1-1v-6.7c0-0.6,0.4-1,1-1h5.8c0.6,0,1,0.4,1,1v6.7
                                                        C42.6,53.8,42.2,54.2,41.6,54.2z"
                            ></path>
                            <path
                                id="XMLID_41_"
                                class="st1"
                                d="M23.4,46.2l25,17.8c0.3,0.2,0.7,0.2,1.1,0l26.8-19.8l-3.3,30.9H27.7L23.4,46.2z"
                            ></path>
                            <path
                                id="XMLID_40_"
                                class="st3"
                                d="M74.9,45.2L49.5,63.5c-0.3,0.2-0.7,0.2-1.1,0L23.2,45.2"
                            ></path>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="text-center p-6 pt-0">
                <h3 class="mb-4 font-semibold text-2xl">Sucesso!</h3>
                <p class="text-secondary">{{ success }}</p>
                <Button
                    tag="nuxt-link"
                    class="block w-full mt-4"
                    variant="primary"
                    to="/"
                >
                    Back to Home
                </Button>
            </div>
        </div>
    </div>
</template>
<script>
import { ref } from "@vue/composition-api";
import InputGroup from "../../components/InputGroup";
import Input from "../../components/elements/Input";
import Button from "../../components/elements/Button";
export default {
    components: { Button, Input, InputGroup },
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
                const { message } = await root.$axios.$post(
                    "/api/auth/register",
                    form.value
                );
                success.value = message;
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
