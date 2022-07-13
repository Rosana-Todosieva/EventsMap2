<template>
    <div class="sticky-top shadow-sm">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container">
                <div class="d-flex align-items-center flex-nowrap justify-content-between w-100">
                    <Link :href="route('homepage')" class="navbar-brand pe-5 pe-md-1 pe-xl-0 d-flex">
                        <img src="/images/logo.png" alt="Logo" class="img-fluid pe-sm-5 pe-md-0 me-3" width="50">
                        <div class="fs-3">Events<span class="fw-bold">MAP</span></div>
                    </Link>
                </div >

                <div class="collapse navbar-collapse">
                    <Link :href="route('auth.register')" class="d-none d-md-flex align-items-center me-3 me-xl-4 text-decoration-none fs-5 ms-2 text-dark">
                        <div class="custom-border-bottom">Events</div>
                    </Link>
                    <Link :href="route('auth.register')" class="d-none d-md-flex align-items-center me-3 me-xl-4 text-decoration-none fs-5 ms-2 text-dark">
                        <div class="custom-border-bottom">Creators</div>
                    </Link>
<!--                    v-if (user)-->
                    <div class="d-flex align-items-center justify-content-around mb-4 mb-md-0 mt-3 mt-md-0">
                        <Link :href="route('auth.login')" class="d-flex text-nowrap me-3 me-xl-4 fs-5 text-decoration-none text-dark">
                            <div class="custom-border-bottom">Login</div>
                        </Link>
                        <Link :href="route('auth.register')" class="d-flex text-nowrap me-3 me-xl-4 fs-5 text-decoration-none text-dark ">
                            <div class="custom-border-bottom"> Register </div>
                        </Link>
                    </div>
                </div>

            </div>
        </nav>
    </div>
</template>

<script>
export default {
    name: "Header"
}
</script>

<style scoped>

</style>
