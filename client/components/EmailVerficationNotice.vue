<template>
    <transition
        enter-class="opacity-0"
        enter-to-class="opacity-100"
        leave-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div
            v-if="visible"
            class="fixed inset-0 z-50 bg-smoke flex items-center justify-center"
            style="transition: opacity 200ms ease"
        >
            <div class="max-w-md w-full bg-white rounded p-4 relative">
                <SuccessBox message="O seu email for verificado com sucesso!">
                    <Button
                        slot="button"
                        variant="success"
                        class="block w-full mt-4"
                        @click.native="visible = false"
                    >
                        OK
                    </Button>
                </SuccessBox>
            </div>
        </div>
    </transition>
</template>

<script>
import SuccessBox from "./SuccessBox";
import Button from "./elements/Button";
export default {
    name: "EmailVerficationNotice",
    components: { Button, SuccessBox },
    data: () => ({
        visible: false
    }),
    mounted() {
        this.visible = this.$route.query.verified;
    }
};
</script>

<style scoped></style>
