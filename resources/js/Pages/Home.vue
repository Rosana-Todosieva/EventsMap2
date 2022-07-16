<template>
<div class="m-5">
    <EventComponent></EventComponent>
</div>
</template>

<script>
import EventComponent from "@/Components/Event/EventComponent.vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
export default {
    name: "Home",
    layout: DefaultLayout,
    components: {
        EventComponent
    }
}

</script>

<style scoped>

</style>
