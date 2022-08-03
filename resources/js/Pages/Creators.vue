<template>
    <div class="container m-5">
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center"> <div class="ratio ratio-1x1">
                            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/f/f2/FK_Vardar_logo.svg/1200px-FK_Vardar_logo.svg.png" class="object-fit-cover img-thumbnail">
                        </div>
                            <div class="media-body overflow-hidden">
                                <h5 class="card-text mb-0">ФК Вардар</h5>
                                <p class="card-text text-uppercase text-muted">Скопје, 4ти март, бб</p>
                                <p class="card-text">
                                    nielsencobb@memora.com<br><abbr title="Phone">P:  </abbr>+1 (851) 552-2735
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import EventComponent from "@/Components/Event/EventComponent.vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

export default {
    name: "Creators",
    layout: DefaultLayout,
    components: {EventComponent},
    props: {
        user: Object,
        events: Object
    },
}
</script>

<style scoped>

</style>
