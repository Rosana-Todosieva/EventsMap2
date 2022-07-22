<template>
    <div class="container p-5 my-5 bg-light border border-3 border-radius-15px">
        <div class="row g-5 align-items-start">
            <div class="col col-12 col-lg-4 border-2 border-secondary p-3 text-center" style="border-style: dashed">
                <img class="img-fluid " src="https://st.depositphotos.com/1665366/1267/v/950/depositphotos_12676701-stock-illustration-party-background-vector-design.jpg" alt="event image">
                <button class="btn btn-outline-secondary mt-4 mb-2">Прикачи слика</button>
            </div>
            <div class="col col-12 col-lg-8">
                <form @submit.prevent="submit">
                    <BaseInput v-model:value="form.title" label="Наслов" type="text" :name="'title'"
                               :error="form.errors.title" class="mb-3"/>
                    <BaseTextarea v-model:value="form.description" label="Опис" type="textarea"
                                  name='description' :error="form.errors.description" class="mb-3"/>
                    <div class="d-flex justify-content-between">
                        <BaseInput v-model:value="form.date" label="Датум" type="date"
                                   name="date" :error="form.errors.date" class="mb-3"/>
                        <BaseInput v-model:value="form.time" label="Почеток" type="time"
                                   name="time" :error="form.errors.time" class="mb-3"/>
                        <BaseInput v-model:value="form.price" label="Цена" type="text" :name="'price'"
                                   :error="form.errors.price" class="mb-3"/>
                    </div>
                    <div class="text-end mt-3">
                        <button class="btn btn-secondary px-5">Креирај настан</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</template>

<script>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import {useForm} from "@inertiajs/inertia-vue3";
import BaseInput from "@/Components/Inputs/BaseInput.vue";
import BaseTextarea from "@/Components/Inputs/BaseTextarea.vue";

export default {
    name: "Create",
    components: {BaseInput, BaseTextarea},
    layout: DefaultLayout,
    setup(props) {
        const form = useForm({
            title: '',
            date: '',
            image: '',
            price: '',
            description: '',
            time: ''
        })
        const submit = () => {
            form.post(route('events.store'))
        }
        return {form, submit}
    }
}
</script>

<style scoped>

</style>
