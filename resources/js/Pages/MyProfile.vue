<template>
    <div class="container border border-3 rounded-3 bg-light p-2 p-md-3 p-xl-5 my-3 my-md-5">
        <Link :href="route('homepage')" class="text-black"><i class="bi bi-caret-left-fill me-1"></i>Назад</Link>
        <div>
            <form method="post">
                <div class="text-end mb-3 mb-md-2">
                    <Link :href="route('user.edit')" class="btn btn-outline-secondary px-2">Измени податоци</Link>
                </div>

                <div class="row">
                    <div class="col col-12 col-lg-4">
                        <div class="ratio ratio-1x1">
                            <img
                                :src="user.image"
                                class="object-fit-cover img-thumbnail" alt="user-image"/>
                        </div>
                        <div class="text-center m-3">
                            <div class="d-inline-block fw-bold fs-3 text-nowrap">
                                {{user.name}}
                            </div>
                        </div>
                    </div>

                    <div class="col col-12 col-lg-8 px-5">

                        <div class="fs-3 fw-bold">Податоци</div>

                        <div class="row mt-4 text-nowrap">
                            <div class="col col-12 col-sm">
                                <div class="d-flex fs-5 mb-3">
                                    <div class="text-gray me-4">
                                        <i class="bi bi-person-circle"></i>
                                        Име
                                    </div>
                                    <div>{{user.name}}</div>
                                </div>
                                <div class="d-flex fs-5 mb-3">
                                    <div class="text-gray me-4">
                                        <i class="bi bi-envelope-fill"></i>
                                        Маил
                                    </div>
                                    <div>{{user.email}}</div>
                                </div>
                                <div v-if="user.creator" class="d-flex fs-5 mb-3">
                                    <div class="text-gray me-4">
                                        <i class="bi bi-house-door-fill"></i>
                                        Адреса
                                    </div>
                                    <div>
                                        {{user.creator.address}}
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-sm">
                                <div class="d-flex fs-5 mb-3">
                                    <div class="text-gray me-4">
                                        <i class="bi bi-telephone-fill"></i>
                                        Телефонски број
                                    </div>
                                    <div>{{user.phone}}</div>
                                </div>
                                <div v-if="user.creator" class="d-flex fs-5 mb-3">
                                    <div class="text-gray me-4">
                                        <i class="bi bi-envelope-fill"></i>
                                        Веб страна
                                    </div>
                                    <div><Link :href="user.creator.website"
                                            class="text-dark">{{user.creator.website}}</Link></div>
                                </div>
                                <div v-if="user.creator" class="d-flex fs-5 mb-3">
                                    <div class="text-gray me-4">
                                        <i class="bi bi-pin-map-fill"></i>
                                        Град
                                    </div>
                                    <div>{{user.creator.city.name}}</div>
                                </div>
                            </div>
                        </div>

                        <div v-if="user.creator" class="mt-3 py-2 px-3 bg-white">
                            <div class="d-flex flex-column fs-5 mb-3">
                                <div class="text-gray me-4 text-center">
                                    <i class="bi bi-info-circle-fill"></i>
                                    Опис
                                </div>
                                <div class="text-justify">{{user.creator.description}}
                                </div>
                            </div>
                        </div>

                        <div v-if="user.creator" class="mt-3 py-2 px-3">
                            <div class="d-flex flex-column fs-5 mb-3">
                                <div class="text-gray me-4 text-center">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    Вашата локација
                                </div>
                                <div class="border border-2 border-secondary">
                                    <ShowMap :text="`<b>${user.name}</b>`" class="mt-5"
                                             v-if="user.creator.latitude && user.creator.longitude" :lat-lng="[user.creator.latitude, user.creator.longitude]"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>

        <div v-if="user.creator" class="border-top p-3">
            <div class="fs-4 fw-bold mb-3">Мои настани</div>
            <div class="text-center text-dark fs-5 me-2"> Моментално немате креирано настани. Можете да креирате настан <Link :href="route('events.create')"> овде</link>.
            </div>
        </div>

    </div>
</template>

<script>
import EventComponent from "@/Components/Event/EventComponent.vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import PickLocationMap from "@/Components/PickLocationMap.vue";
import ShowMap from "@/Components/ShowMap.vue";

export default {
    name: "MyProfile",
    layout: DefaultLayout,
    components: {
        EventComponent,
        PickLocationMap,
        ShowMap
    },
    props: {
        user: Object,
    },
}
</script>

<style scoped>

</style>
