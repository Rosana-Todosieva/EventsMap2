<template>
    <div class="container p-5 my-5 bg-light border border-3 border-radius-15px">
        <Link :href="route('homepage')" class="text-black"><i class="bi bi-caret-left-fill me-1"></i>Назад</Link>
        <div class="row g-5 align-items-start pt-3">
            <div class="col col-12 col-lg-4">
                <div class="border-2 border-secondary p-3 text-center" style="border-style: dashed">
                    <div class="ratio ratio-1x1">
                        <img :src="event.image"
                             alt="event image" class="object-fit-cover">
                    </div>
                </div>
                <div class="d-flex flex-column text-center mt-3">
                    <div class="text-secondary fs-5">Настанот е креиран од:</div>
                    <div class="text-dark fs-4 fw-bold">{{ event.user.name }}</div>
                    <div class="mt-4">
                        <button class="btn btn-secondary px-5 fs-5">Резервирај</button>
                    </div>
                </div>
            </div>

            <div class="col col-12 col-lg-8">
                <div class="mb-3 fs-2 fw-bolder text-center text-dark">{{ event.title }}</div>

                <div class="mt-4 text-nowrap">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="d-flex fs-5 px-5 py-2">
                                <div class="text-gray me-4">
                                    <i class="bi bi-calendar-check-fill"></i>
                                    Датум
                                </div>
                                <div>{{ event.date }}</div>
                            </div>
                            <div class="d-flex fs-5 px-5 py-2">
                                <div class="text-gray me-4">
                                    <i class="bi bi-house-door-fill"></i>
                                    Адреса
                                </div>
                                <div>
                                    {{ event.user.creator.address }}
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex fs-5 px-5 py-2">
                                <div class="text-gray me-4">
                                    <i class="bi bi-clock-fill"></i>
                                    Почеток
                                </div>
                                <div>
                                    {{ event.time }}
                                </div>
                            </div>
                            <div class="d-flex fs-5 px-5 py-2">
                                <div class="text-gray me-4">
                                    <i class="bi bi-pin-map-fill"></i>
                                    Град
                                </div>
                                <div>
                                    {{ event.user.creator.city.name }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 py-2 px-3 bg-white mb-4">
                        <div class="d-flex flex-column fs-5 mb-3">
                            <div class="text-gray me-4 text-center">
                                <i class="bi bi-info-circle-fill"></i>
                                Опис
                            </div>
                            <div class="text-justify">{{ event.description }}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="d-flex fs-5 px-4 py-2 bgbg border border-3">
                            <div class="text-gray me-4">
                                Влез
                            </div>
                            <div>{{ event.price }} <span class="fs-6">мкд.</span></div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="text-center fs-5 mb-2 text-decoration-underline">Локација на настанот</div>
                    <ShowMap :text="`<b>${event.user.name}</b>`"
                             v-if="event.user.creator.latitude && event.user.creator.longitude"
                             :lat-lng="[event.user.creator.latitude, event.user.creator.longitude]"/>
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
.bgbg {
    background-color: #cbd5e0;
}
</style>
