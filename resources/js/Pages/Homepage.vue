<template>
    <div class="container my-4">
        <div class="row g-4">
            <div class="col col-12 col-lg-6" v-for="i in 10">
                <EventComponent/>
            </div>
        </div>
    </div>
</template>

<script>
import EventComponent from "@/Components/Event/EventComponent.vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
export default {
    name: "Homepage",
    layout: DefaultLayout,
    components: {
        EventComponent
    }
}

</script>

<style scoped>

</style>
