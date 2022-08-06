<template>
    <div class="container py-3">
        <div class="my-3 d-flex align-items-center justify-content-end">
                <BaseSelect class="mb-4"
                            v-model:value="form.city_id"
                            label="Град"
                            @change="search">
                    <option selected :value="null" hidden>Одбери град</option>
                    <option :value="null">Сите градови</option>
                    <option :value="city.id" v-for="city in cities" :key="city.id">
                        {{ city.name }}
                    </option>
                </BaseSelect>
            </div>
        <div class="card float-right m-2 bg-light" v-for="creator in creators" :key="creator.id">
            <div class="row m-2 ">
                <div class="col-sm-5">
                    <img class="d-block img-thumbnail" :src="creator.user.image" alt="">
                </div>
                <div class="col-sm-7">
                    <div class="card-block">
                        <h5 class="fs-3 mb-3">{{creator.user.name}}</h5>

                        <p class="text-uppercase text-muted fs-5">{{ creator.city.name }} - {{creator.address}}</p>
                        <div class="d-flex fs-5 mb-3">
                            <div class="text-gray me-4">
                                <i class="bi bi-envelope-fill"></i>
                                Маил
                            </div>
                            <a :href="'mailto:'+creator.user.email" class="fs-5 text-dark">{{ creator.user.email }}</a>
                        </div>
                        <div class="d-flex fs-5 mb-3">
                            <div class="text-gray me-4">
                                <i class="bi bi-telephone-fill"></i>
                                Телефонски број
                            </div>
                            <a :href="'tel:'+creator.user.phone" class="fs-5 text-dark">{{ creator.user.phone }}</a>
                        </div>
                        <div class="d-flex fs-5 mb-3">
                            <div class="text-gray me-4">
                                <i class="bi bi-envelope-fill"></i>
                                Веб страна
                            </div>
                            <Link :href="creator.website"
                                  class="text-dark">{{ creator.website }}
                            </Link>
                        </div>
                        <div class="d-flex fs-5 mb-3">
                            <div class="text-gray me-4">
                                <i class="bi bi-info-circle-fill"></i>
                                Опис
                            </div>
                            <div>{{ creator.description}}</div>
                        </div>
                        <div class="d-flex flex-column fs-5 mb-3">
                            <div class="text-gray me-4 text-center">
                                <i class="bi bi-geo-alt-fill"></i>
                                Локација на креаторот
                            </div>
                            <ShowMap :text="`<b>${creator.name}</b>`"
                                     v-if="creator.latitude && creator.longitude"
                                     :lat-lng="[creator.latitude, creator.longitude]"/>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <br>
        <br>
        <div class="col text-center my-5 fs-4" v-if="!creators.length">
            Нема креатори кои што одговараат на вашето пребарување.
        </div>
    </div>
</template>

<script>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import ShowMap from "@/Components/ShowMap.vue";
import BaseSelect from "@/Components/Inputs/BaseSelect.vue";
import EventComponent from "@/Components/Event/EventComponent.vue";
import {getParam} from "../functions.js";
import {useForm} from "@inertiajs/inertia-vue3";

export default {
    name: "Creators",
    layout: DefaultLayout,
    props: {
        creators: Array,
        cities: Array
    },
    components: {
        ShowMap, BaseSelect, EventComponent
    },
    setup() {
        const form = useForm({
            city_id: getParam('city_id')
        })
        const  search = () => {
            form.cancel()
            form.get(route('creators'))
        }
        return {form, search}
    }
}
</script>

<style scoped>

</style>
