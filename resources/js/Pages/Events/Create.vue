<template>
    <div class="container p-5 my-5 bg-light border border-3 border-radius-15px">
        <div class="row g-5 align-items-start">
            <div class="col col-12 col-lg-4 border-2 border-secondary p-3 text-center" style="border-style: dashed">
                <div class="ratio ratio-1x1">
                    <img :src="image ? image : '/images/upload-img.png'"
                         alt="event image" class="object-fit-cover">
                </div>
                <button class="btn btn-outline-secondary mt-4 mb-2" @click="openDialog">Прикачи слика</button>
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
        <input
            type="file"
            style="display: none"
            ref="fileInputRef"
            accept="image/*"
            @change="onImagePicked"
        />
    </div>
</template>

<script>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import {useForm} from "@inertiajs/inertia-vue3";
import BaseInput from "@/Components/Inputs/BaseInput.vue";
import BaseTextarea from "@/Components/Inputs/BaseTextarea.vue";
import {computed, ref, watch} from 'vue'

export default {
    name: "Create",
    components: {BaseInput, BaseTextarea},
    layout: DefaultLayout,
    setup(props) {
        const fileInputRef = ref(null)
        const form = useForm({
            title: '',
            date: '',
            image: null,
            price: '',
            description: '',
            time: ''
        })
        const submit = () => {
            form.post(route('events.store'))
        }
        const onImagePicked = () => {
            const file = fileInputRef.value.files[0]
            form.image = file

            const reader = new FileReader();
            reader.onload = function () {
                image.value = reader.result;
            };
            reader.readAsDataURL(file);
        }

        const openDialog = () => {
            fileInputRef.value.click();
        }
        const image = ref(null)


        return {form, onImagePicked, submit, fileInputRef, openDialog, image}
    }
}
</script>

<style scoped>

</style>
