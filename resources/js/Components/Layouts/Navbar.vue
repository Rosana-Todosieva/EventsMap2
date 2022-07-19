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
                    <div v-if="user" class="d-flex align-items-center justify-content-center mb-4 mb-md-0 mt-3 mt-md-0 ">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle fs-5 text-dark" type="button" id="dropdownMenuButton2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://i.ibb.co/tqJ38n3/user.png" alt="user" width="32" height="32"
                                     class="rounded rounded-circle me-1">
                                {{ user.name }}
                            </button>
                            <ul class="dropdown-menu end-0 " aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <Link class="dropdown-item fs-6">
                                        <i class="bi bi-person-fill"></i>
                                        My Profile
                                    </Link>
                                </li>
                                <li>
                                    <Link method="post" :href="route('logout')" as="button" type="button" class="dropdown-item fs-6">
                                        <i class="bi bi-box-arrow-right"></i>
                                        Log Out
                                    </Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div v-else class="d-flex align-items-center justify-content-around mb-4 mb-md-0 mt-3 mt-md-0">
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
    name: "Header",
    computed: {
        user() {
            return this.$page.props.user;
        }
    },
}
</script>

<style scoped>

</style>
