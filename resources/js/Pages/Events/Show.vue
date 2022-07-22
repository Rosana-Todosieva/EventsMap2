<template>
    <div class="container my-3">{{ event }}</div>
</template>

<script>

import DefaultLayout from "@/Layouts/DefaultLayout.vue";

export default {
    name: "Show",
    layout: DefaultLayout,
    props: {
        event: Object
    }
}
</script>

<style scoped>

</style>
