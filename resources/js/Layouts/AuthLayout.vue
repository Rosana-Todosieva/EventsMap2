<template>
    <div class="auth-background">
        <Navbar/>
            <slot></slot>
        <Footer/>
    </div>
</template>

<script>
import Navbar from "@/Components/Layouts/Navbar.vue";
import Footer from "@/Components/Layouts/Footer.vue";
export default {
    name: "AuthLayout",
    components: {Footer, Navbar}
}
</script>

<style scoped>
.auth-background {
    background-image: url("/public/images/auth-background.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: top;
}
</style>
