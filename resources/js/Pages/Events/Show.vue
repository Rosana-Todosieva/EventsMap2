<template>
    <div class="container p-5 my-5 bg-light border border-3 border-radius-15px">
        <div class="row g-5 align-items-start">
            <div class="col col-12 col-lg-4 border-2 border-secondary p-3 text-center" style="border-style: dashed">
                <div class="ratio ratio-1x1">
                    <img :src="event.image"
                         alt="event image" class="object-fit-cover">
                </div>
            </div>
            <div class="col col-12 col-lg-8">
                <div class="mb-3 fs-3 fw-bolder">{{event.title}}</div>
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <label>Опис</label>
                    </div>
                    <div class="col-md-10">
                        <div class="fs-6 text-gray">{{event.description}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <label>Датум</label>
                    </div>
                    <div class="col-md-10">
                        <div class="fs-6 text-gray">{{event.date}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <label>Почеток</label>
                    </div>
                    <div class="col-md-10">
                        <div class="fs-6 text-gray">{{event.time}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <label>Цена</label>
                    </div>
                    <div class="col-md-10">
                        <div class="fs-6 text-gray">{{event.price}}</div>
                    </div>
                </div>
                <br/>
                <ShowMap :text="`<b>${event.user.name}</b>`" class="mt-5"
                         v-if="event.user.creator.latitude && event.user.creator.longitude"
                         :lat-lng="[event.user.creator.latitude, event.user.creator.longitude]"/>
                <br/>
                <div class="float-end mt-3">
                    <button class="btn btn-secondary m-2 px-5">Купи билет</button>
                    <Link :href="route('homepage')" class="btn btn-secondary m-2 px-5">Назад</Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import ShowMap from "@/Components/ShowMap.vue";

export default {
    name: "Show",
    components: {ShowMap},
    layout: DefaultLayout,
    props: {
        event: Object
    }
}
</script>

<style scoped>

</style>
