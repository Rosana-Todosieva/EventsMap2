<template>
    <div class="container p-5 my-5 bg-light border border-3 border-radius-15px">
        <form @submit.prevent="submit">
            <div class="row g-5 align-items-start">
                <div class="col col-12 col-lg-4 border-2 border-secondary p-3 text-center" style="border-style: dashed">
                    <div class="ratio ratio-1x1">
                        <img :src="image ? image : event.image"
                             alt="event image" class="object-fit-cover">
                    </div>
                    <button type="button" class="btn btn-outline-secondary mt-4 mb-2" @click="openDialog">Промени слика</button>
                </div>
                <div class="col col-12 col-lg-8">

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
                        <button class="btn btn-secondary px-5">Измени настан</button>
                    </div>

                </div>

            </div>
        </form>
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
    name: "Edit",
    components: {BaseInput, BaseTextarea},
    layout: DefaultLayout,
    props: {
        event: Object
    },
    setup(props) {
        const fileInputRef = ref(null)
        const form = useForm({
            title: props.event.title,
            date: props.event.date,
            price: props.event.price,
            description: props.event.description,
            time: props.event.time,
            image: null,
            _method:'PUT'
        })
        const submit = () => {
            form.post(route('event.update', props.event.id ))
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
