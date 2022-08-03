<template>
    <div class="container m-5">
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center"> <div class="ratio ratio-1x1">
                            <img :src="user.image" class="object-fit-cover img-thumbnail" alt="user-image">
                        </div>
                            <div class="media-body overflow-hidden">
                                <h5 class="card-text mb-0">{{user.name}}</h5>
                                <p class="card-text text-uppercase text-muted">{{ user.creator.city_id }} - {{user.creator.address}}</p>
                                <p class="card-text">
                                    {{user.email}}<br><abbr title="Phone"></abbr>{{user.phone}}
                                </p>
                                <div>
                                    <Link :href="user.creator.website"
                                          class="text-dark">{{ user.creator.website }}
                                    </Link>
                                </div>
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
        event: Object
    },
}
</script>

<style scoped>

</style>
