<template>
    <div class="row px-5 my-5">
        <div class="col col-3"></div>
        <div class="container col col-6 px-5 border-radius-20px border background-white"
             style="box-shadow: 5px 5px 5px lightblue;">
            <div class="d-flex justify-content-center py-5">
                <div class="display-6 d-inline-block custom-border-bottom">
                    Регистрирај се
                </div>
            </div>
            <div>
                <form @submit.prevent="submit">
                    <BaseInput v-model:value="form.name" label="Име" type="text" :name="'name'"
                               :error="form.errors.name" class="mb-3"/>
                    <BaseInput v-model:value="form.phone" label="Телефон" type="text" :name="'phone'"
                               :error="form.errors.phone" class="mb-3"/>
                    <BaseInput v-model:value="form.email" label="Е-маил" type="email" :name="'email'"
                               :error="form.errors.email" class="mb-3"/>
                    <BaseInput v-model:value="form.password" label="Лозинка" type="password"
                               :name="'password'" :error="form.errors.password" class="mb-3"/>
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <button @click.prevent="form.type = types[0]"
                                class="btn btn-a bg-light fs-6 me-1 p-2 border-radius-20px px-4">
                            Корисник
                        </button>
                        <button @click.prevent="form.type = types[1]"
                                class="btn btn-a ms-1 fs-6 p-2 border-radius-20px bg-light px-4">
                            Креатор
                        </button>
                    </div>
                    <BaseSelect class="mb-4" v-if="form.type === types[1]"
                            :error="form.errors.city_id"
                            v-model:value="form.city_id"
                                label="Град">
                        <option :value="null" hidden>Одбери град</option>
                        <option :value="city.id" v-for="city in cities" :key="city.id">
                            {{city.name}}
                        </option>
                    </BaseSelect>
                    <BaseInput v-model:value="form.address" label="Адреса" type="text"
                               :name="'address'" :error="form.errors.address" class="mb-3" v-if="form.type === types[1]"/>
                    <BaseInput v-model:value="form.website" label="Website" type="text"
                               :name="'website'" :error="form.errors.website" class="mb-3" v-if="form.type === types[1]"/>
                    <div class="text-center">
                        <button type="submit"
                                class="btn btn-primary text-white rounded rounded-pill px-5 py-3 mb-4 mt-3"
                                :disabled="form.processing"> Регистрирај се
                        </button>
                    </div>
                </form>
            </div>
            <div class="text-center mb-4 d-flex justify-content-center">
                <div>Веќе си член на EventsMap?</div>
                <Link :href="route('auth.login')" class="text-primary fs-6 text-decoration-none ms-2">
                        Најави се
                </Link>
            </div>
        </div>
        <div class="col col-3"></div>
    </div>
</template>

<script>
import AuthLayout from "@/Layouts/AuthLayout.vue";
import BaseInput from "@/Components/Inputs/BaseInput.vue";
import BaseSelect from "@/Components/Inputs/BaseSelect.vue";
import {useForm} from "@inertiajs/inertia-vue3";

export default {
    name: "Register",
    layout: AuthLayout,
    components: {BaseInput, BaseSelect},
    emits: ["onRegisterSuccess"],
    props: {
        types: Array,
        cities: Array
    },
    setup(props, ctx) {
        const form = useForm({
            name: '',
            phone: '',
            email: '',
            password: '',
            address: '',
            website: '' ,
            city_id: null,
            type: null
        })
        const submit = () => {
            form.post(route('auth.register'), {
                onSuccess: () => {
                    ctx.emit('onRegisterSuccess')
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
