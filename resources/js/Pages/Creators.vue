<template>
    <div class="container py-3">
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
    </div>
</template>

<script>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import ShowMap from "@/Components/ShowMap.vue";

export default {
    name: "Creators",
    layout: DefaultLayout,
    props: {
        creators: Array,
    },
    components: {
        ShowMap
    }
}
</script>

<style scoped>

</style>
