<template>
    <Link :href="route('homepage')"><i class="bi bi-arrow-left"></i>Назад </Link>
    <div class="container emp-profile border bg-light mt-2 mb-2 p-5">
        <form method="post">
            <input type="submit" class="rounded pill mb-3 px-2 float-end" name="btnAddMore" value="Измени податоци"/>
            <div class="d-flex">
            <div class="row">
                <div class="col-md-3 p-2">
                    <div class="profile-img px-2">
                        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/f/f2/FK_Vardar_logo.svg/1200px-FK_Vardar_logo.svg.png" class="img-fluid img-thumbnail" alt=""/>
                        <input type="reset" class="btn btn-outline-secondary btn-sm px-5 m-3 text-muted bg-light " value="Промени слика">
                    </div>
                </div>
                <div class="col-md-8 px-5">
                    <div class="profile-head">
                        <div class="fs-3 fw-bolder">Контакт</div>

                        <div class="col-md-8">
                            <div class="tab-content profile-tab pt-xl-5" id="myTabContent">
                                <div class="tab-pane fade show active" aria-labelledby="home-tab">
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <label>Име</label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="fs-5 text-gray">ФК Вардар</div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <label>Меил</label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="fs-5 text-gray">fk_vardar@gmail.com</div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <label>Телефонски број</label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="fs-5 text-gray">078 987 678</div>
                                        </div>
                                    </div>
                                        <div class="row mb-2">
                                            <div class="col-md-5">
                                                <label>Град</label>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="fs-5 text-gray"> <i class="bi bi-geo-alt-fill "></i> Скопје</div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-5">
                                                <label>Адреса</label>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="fs-5 text-gray">ул.1732 бр.2А, Скопје</div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-5">
                                                <label>Веб страна</label>
                                            </div>
                                            <div class="col-md-7">
                                                <a href="#" class="fs-5 text-gray">https://www.fkvardar.mk/</a>
                                            </div>
                                        </div>
                                </div>

                            </div>
                </div>

                        </div>
                    </div>

            </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-2">
                    <label>Опис</label>
                </div>
                <div class="col-md-10">
                    <div class="fs-6 text-gray">ФК Вардар е македонски фудбалски клуб од Скопје кој моментално игра во Првата македонска фудбалска лига. ФК Вардар е најтрофејниот и најпознатиот македонски фудбалски клуб, со освоени 11 национални првенства и 5 национални купови.</div>
                </div>
            </div>

            <br/>
            <br/>
            <div class="border-top">
                <div class="d-flex">
                    <div class="container">
                        <div class="fs-3 fw-bold">Мои настани</div> <br/>
                        <div class="d-flex justify-content-center text-dark fs-5"> Моментално немате креирано настани. Можете да креирате настан  <a class="px-1" href="#"> овде</a>.</div>

                    </div>
                </div>
            </div>
        </form>
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
