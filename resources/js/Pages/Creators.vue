<template>
    <div class="container m-5">
        <div class="row">
            <div class="col-md-6 col-xl-4" v-for="creator in creators" :key="creator.id">
                <div class="card" >
                    <div class="card-body">
                        <div class="media align-items-center"> <div class="ratio ratio-1x1">
                            <img :src="creator.user.image" class="object-fit-cover img-thumbnail" alt="user-image">
                        </div>
                            <div class="media-body overflow-hidden">
                                <h5 class="card-text mb-0">{{creator.user.name}}</h5>
                                <p class="card-text text-uppercase text-muted">{{ creator.city.name }} - {{creator.address}}</p>
                                <p class="card-text">
                                    {{creator.user.email}}<br><abbr title="Phone"></abbr>{{creator.user.phone}}
                                </p>
                                <div>
                                    <Link :href="creator.website"
                                          class="text-dark">{{ creator.website }}
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
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

export default {
    name: "Creators",
    layout: DefaultLayout,
    props: {
        creators: Array,
    },
}
</script>

<style scoped>

</style>
