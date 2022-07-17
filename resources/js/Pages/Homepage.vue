<template>
    <div class="container">
        <div class="m-3">
            <EventComponent/>
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
