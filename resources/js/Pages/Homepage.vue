<template>
    <div class="container my-4">
        <div class="my-3 d-flex align-items-center justify-content-end">
            <div class="me-5">
                <BaseInput v-model:value="form.date" @change="search" label="Датум" type="date"
                           name="date"  class="mb-3"/>
            </div>
            <div>
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
        </div>
        <div class="row g-4">
            <div class="col col-12 col-lg-6" v-for="event in events" :key="event.id">
                <EventComponent :event="event"/>
            </div>
        </div>
        <div class="col text-center my-5 fs-4" v-if="!events.length">
            Нема настани кои што одговараат на вашето пребарување.
        </div>
    </div>
</template>

<script>
import EventComponent from "@/Components/Event/EventComponent.vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import BaseSelect from "@/Components/Inputs/BaseSelect.vue";
import {useForm} from "@inertiajs/inertia-vue3";
import BaseInput from "@/Components/Inputs/BaseInput.vue";
import {getParam} from "../functions.js";

export default {
    name: "Homepage",
    layout: DefaultLayout,
    props: {
        events: Array,
        cities: Array
    },
    components: {
        BaseInput,
        BaseSelect,
        EventComponent
    },
    setup() {
        const form = useForm({
            city_id: getParam('city_id'),
            date: getParam('date'),
        })
        const  search = () => {
            form.cancel()
            form.get(route('homepage'))
        }
        return {form, search}
    }
}

</script>

<style scoped>

</style>
