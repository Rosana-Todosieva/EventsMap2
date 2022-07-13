<template>
    <div>
        <Navbar/>
        <slot></slot>
        <Footer/>
    </div>
</template>

<script>
import Navbar from "@/Components/Layouts/Navbar.vue";
import Footer from "@/Components/Layouts/Footer.vue";
export default {
    name: "DefaultLayout",
    components: {Footer, Navbar}
}
</script>

<style scoped>

</style>
