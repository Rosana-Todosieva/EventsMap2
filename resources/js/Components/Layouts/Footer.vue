<template>
    <div class="bg-light">
        <div class="container py-5">
            <div class="row ps-3 ps-sm-0">
                <div class="col col-12 col-sm-6 col-md-4 col-lg-3 mb-4 mb-md-0" v-for="(group, i) in groups" :key="i">
                    <div class="fs-6 fw-bold mb-2">
                        {{(group.name)}}
                    </div>
                    <div class="fs-6" v-for="(item, i) in group.items" :key="i">
                        {{(item)}}
                    </div>
                </div>
                <Link :href="route('homepage')" class="col d-flex justify-content-sm-center text-dark justify-content-md-end align-items-center">
                    <img src="/images/logo.png"  alt="Logo" width="50" class="img-fluid">
                    <div class="fs-3">Events<span class="fw-bold">MAP</span></div>
                </Link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Footer",
    data() {
        return {
            groups: [
                {
                    name: "EventsMap",
                    items: [
                        "Услови на користење",
                        "Политика на приватност",
                        "За нас",
                        "Контакт",
                    ]
                }
            ]
        }
    }
}
</script>

<style scoped>

</style>
