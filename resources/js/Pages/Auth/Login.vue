<template>
    <div class="row px-5 my-5">
        <div class="col 3"></div>
        <div class="container col col-6 px-5 border-radius-20px background-white" style="box-shadow: 5px 5px 5px lightblue;">
            <div class="d-flex justify-content-center py-5">
                <div class="display-6 d-inline-block custom-border-bottom">
                    Најави се
                </div>
            </div>
            <div>
                <form @submit.prevent="submit">
                    <BaseInput v-model:value="form.email" label="Е-маил" type="email" :name="'email' + whiteLabel"
                           :white-label="whiteLabel" :error="form.errors.email" class="mb-3"/>
                    <BaseInput v-model:value="form.password" label="Лозинка" type="password" :white-label="whiteLabel"
                           :name="'password' + whiteLabel" :error="form.errors.password" class="mb-3"/>
                    <div class="text-danger text-center" v-if="form.errors.credentials">{{ form.errors.credentials }}</div>
                    <div class="text-end mb-4">
                        <Link class="text-primary fs-6 text-decoration-none">{{ 'Ја заборавивте лозинката?' }}</Link>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary text-white rounded rounded-pill px-5 py-3 mb-4"
                                :disabled="form.processing">{{ 'Најави се' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col col-3"></div>
    </div>
</template>

<script>
import AuthLayout from "@/Layouts/AuthLayout.vue";
import BaseInput from "@/Components/Inputs/BaseInput.vue"
import {useForm} from "@inertiajs/inertia-vue3";

export default {
    name: "Login",
    layout: AuthLayout,
    components: {BaseInput},
    emits: ["onLoginSuccess"],
    setup(props, ctx) {
        const form = useForm({email: '', password: '',})
        const submit = () => {
            form.post(route('auth.login'), {
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

.background-white{
    background-color: #edf2f7;
}
</style>
