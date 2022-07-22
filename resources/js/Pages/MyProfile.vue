<template>
    <div class="container border border-3 rounded-3 bg-light p-2 p-md-3 p-xl-5 my-3 my-md-5">
        <Link :href="route('homepage')" class="text-black"><i class="bi bi-caret-left-fill me-1"></i>Назад</Link>
        <div>
            <form method="post">
                <div class="text-end mb-3 mb-md-2">
                    <button class="btn btn-outline-secondary px-2">Измени податоци</button>
                </div>

                <div class="row">
                    <div class="col col-12 col-lg-4">
                        <div class="ratio ratio-1x1">
                            <img
                                src="https://upload.wikimedia.org/wikipedia/en/thumb/f/f2/FK_Vardar_logo.svg/1200px-FK_Vardar_logo.svg.png"
                                class="object-fit-cover img-thumbnail" alt="user-image"/>
                        </div>
                        <div class="text-center m-3">
                            <div class="d-inline-block fw-bold fs-3 text-nowrap">
                                Club Pulse
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
                                    <div>ФК Вардар</div>
                                </div>
                                <div class="d-flex fs-5 mb-3">
                                    <div class="text-gray me-4">
                                        <i class="bi bi-envelope-fill"></i>
                                        Маил
                                    </div>
                                    <div>fk_vardar@gmail.com</div>
                                </div>
                                <div class="d-flex fs-5 mb-3">
                                    <div class="text-gray me-4">
                                        <i class="bi bi-house-door-fill"></i>
                                        Адреса
                                    </div>
                                    <div>
                                        ул.1732 бр.2А, Скопје
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-sm">
                                <div class="d-flex fs-5 mb-3">
                                    <div class="text-gray me-4">
                                        <i class="bi bi-telephone-fill"></i>
                                        Телефонски број
                                    </div>
                                    <div>078 987 678</div>
                                </div>
                                <div class="d-flex fs-5 mb-3">
                                    <div class="text-gray me-4">
                                        <i class="bi bi-envelope-fill"></i>
                                        Веб страна
                                    </div>
                                    <div><a href="https://www.fkvardar.mk/"
                                            class="text-dark">https://www.fkvardar.mk/</a></div>
                                </div>
                                <div class="d-flex fs-5 mb-3">
                                    <div class="text-gray me-4">
                                        <i class="bi bi-pin-map-fill"></i>
                                        Град
                                    </div>
                                    <div>Скопје</div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 py-2 px-3 bg-white">
                            <div class="d-flex flex-column fs-5 mb-3">
                                <div class="text-gray me-4 text-center">
                                    <i class="bi bi-info-circle-fill"></i>
                                    Опис
                                </div>
                                <div class="text-justify">ФК Вардар е македонски фудбалски клуб од Скопје кој
                                    моментално игра во Првата македонска фудбалска лига. ФК Вардар е најтрофејниот и
                                    најпознатиот
                                    македонски фудбалски клуб, со освоени 11 национални првенства и 5 национални купови.
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 py-2 px-3">
                            <div class="d-flex flex-column fs-5 mb-3">
                                <div class="text-gray me-4 text-center">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    Изберете ја вашата локација
                                </div>
                                <div class="border border-2 border-secondary">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>

        <div class="border-top p-3">
            <div class="fs-4 fw-bold mb-3">Мои настани</div>
            <div class="text-center text-dark fs-5 me-2"> Моментално немате креирано настани. Можете да креирате настан <Link :href="route('events.create')"> овде</link>.
            </div>
        </div>

    </div>
</template>

<script>
import EventComponent from "@/Components/Event/EventComponent.vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

export default {
    name: "MyProfile",
    layout: DefaultLayout,
    components: {
        EventComponent
    }
}
</script>

<style scoped>

</style>
