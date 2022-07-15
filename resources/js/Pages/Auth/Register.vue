<template>
    <div class="container px-5 my-5">
        <div class="container px-5 border-radius-20px border background-white"
             style="box-shadow: 5px 5px 5px lightblue;">
            <div class="d-flex justify-content-center py-5">
                <div class="display-6 d-inline-block custom-border-bottom">
                    Регистрирај се
                </div>
            </div>
            <div>
                <form @submit.prevent="submit">
                    <BaseInput v-model:value="form.email" label="Е-маил" type="email" :name="'email' + whiteLabel"
                           :white-label="whiteLabel" :error="form.errors.email" class="mb-3"/>
                    <BaseInput v-model:value="form.password" label="Лозинка" type="password" :white-label="whiteLabel"
                           :name="'password' + whiteLabel" :error="form.errors.password" class="mb-3"/>
                    <button type="submit" class="btn btn-secondary text-white border-radius-50px px-5 py-3"
                            :disabled="form.processing">{{ 'Регистрирај се' }}
                    </button>
                </form>
            </div>
        </div>

    </div>
</template>

<script>
import AuthLayout from "@/Layouts/AuthLayout.vue";
import BaseInput from "@/Components/Inputs/BaseInput.vue";
import {useForm} from "@inertiajs/inertia-vue3";

export default {
    name: "Register",
    layout: AuthLayout,
    components: {BaseInput},
    emits: ["onLoginSuccess"],
    setup(props, ctx) {
        const form = useForm({email: '', password: '',})
        const submit = () => {
            form.post(route('auth.process_login', {redirect: props.redirect}), {
                onSuccess: () => {
                    ctx.emit('onLoginSuccess')
                }
            })
        }
        return {form, submit}
    }
}
</script>

<style scoped>
.border {
    border: 1px solid black;
}

.background-white {
    background-color: #edf2f7;
}
</style>
