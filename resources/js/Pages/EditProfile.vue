<template>
    <div class="container border border-3 rounded-3 bg-light p-2 p-md-3 p-xl-5 my-3 my-md-5">
        <Link :href="route('my_profile')" class="text-black"><i class="bi bi-caret-left-fill me-1"></i>Назад</Link>
        <form @submit.prevent="submit">

            <div class="pt-5">

                <div class="row">
                    <div class="col col-12 col-lg-4">
                        <div class="ratio ratio-1x1">
                            <img
                                :src="image ? image : user.image"
                                class="object-fit-cover img-thumbnail" alt="user-image"/>
                        </div>
                        <div class="text-center m-3">
                            <div class="d-inline-block">
                                <button type="button" class="btn btn-outline-secondary" @click="openDialog">Промени
                                    профилна слика
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col col-12 col-lg-8 px-5">
                        <div class="fs-3 fw-bold">Податоци</div>

                        <div class="row mt-4 text-nowrap">
                            <div class="col col-12 col-sm">
                                <customInput v-model:value="form.name" icon="bi bi-person-circle me-2" label="Име"
                                             type="text" name="name"
                                             :error="form.errors.name" class="mb-3"/>
                                <customInput v-model:value="form.email" icon="bi bi-envelope-fill me-2" label="Емаил"
                                             type="text" name="email"
                                             :error="form.errors.email" class="mb-3"/>
                                <div v-if="user.creator">
                                    <customInput v-model:value="form.address" icon="bi bi-house-door-fill me-2"
                                                 label="Адреса"
                                                 type="text" name="address"
                                                 :error="form.errors.address" class="mb-3"/>
                                </div>
                            </div>
                            <div class="col col-12 col-sm">
                                <customInput v-model:value="form.phone" icon="bi bi-telephone-fill me-2"
                                             label="Телефонски број"
                                             type="text" name="phone"
                                             :error="form.errors.phone" class="mb-3"/>
                                <div v-if="user.creator">
                                    <customInput v-model:value="form.website" icon="bi bi-envelope-fill me-2"
                                                 label="Веб страна"
                                                 type="text" name="website"
                                                 :error="form.errors.website" class="mb-3"/>
                                </div>
                                <div v-if="user.creator">
                                    <customSelect class="me-3" icon="bi bi-pin-map-fill me-2"
                                                  :error="form.errors.city_id"
                                                  v-model:value="form.city_id"
                                                  label="Град">
                                        <option :value="null" hidden>Одбери град</option>
                                        <option :value="city.id" v-for="city in cities" :key="city.id">
                                            {{ city.name }}
                                        </option>
                                    </customSelect>
                                </div>
                            </div>
                        </div>

                        <div v-if="user.creator" class="mt-3 py-2 px-3 bg-white">
                            <descInput v-model:value="form.description" icon="bi bi-info-circle-fill me-2" label="Опис"
                                       type="textarea" name="description"
                                       :error="form.errors.description" class="mb-3"/>
                        </div>

                        <div v-if="user.creator" class="mt-3 py-2 px-3">
                            <div class="d-flex flex-column fs-5 mb-3">
                                <div class="text-gray me-4 text-center">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    Изберете ја вашата локација
                                </div>
                                <div class="border border-2 border-secondary">
                                    <PickLocationMap :value="[form.latitude, form.longitude]" @update="updateLocation"/>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-end mb-3 mb-md-2">
                        <button class="btn btn-outline-secondary px-2">Зачувај податоци</button>
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
import {useForm} from "@inertiajs/inertia-vue3";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import customInput from "@/Components/Inputs/Custom/customInput.vue";
import descInput from "@/Components/Inputs/Custom/customTextarea.vue";
import {computed, ref, watch} from 'vue'
import customSelect from "@/Components/Inputs/Custom/customSelect.vue";
import PickLocationMap from "@/Components/PickLocationMap.vue";

export default {
    name: "EditProfile",
    components: {PickLocationMap, customInput, descInput, customSelect},
    layout: DefaultLayout,
    props: {
        user: Object,
        cities: Array
    },
    setup(props) {
        const fileInputRef = ref(null)
        const form = useForm({
            name: props.user.name,
            phone: props.user.phone,
            email: props.user.email,
            ...(props.user.creator ? {
                address: props.user.creator.address,
                website: props.user.creator.website,
                city_id: props.user.creator.city_id,
                description: props.user.creator.description,
                latitude: props.user.creator.latitude,
                longitude: props.user.creator.longitude
            } : {}),
            image: null,
            _method: 'PUT'
        })
        const submit = () => {
            form.post(route('user.update'),)
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
        const updateLocation = (location) => {
            form.latitude = location[0]
            form.longitude = location[1]
        }
        const image = ref(null)
        return {form, onImagePicked, submit, fileInputRef, openDialog, image, updateLocation}
    }
}
</script>

<style scoped>

</style>
