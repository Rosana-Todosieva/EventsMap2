<template>
    <Link class="text-decoration-none card border border-0 box-shadow bg-light text-dark">
        <div class="d-flex flex-column flex-md-row">
            <div class="bg-date text-white p-sm-2 p-md-5">
                <time class="d-flex flex-column align-items-center py-5">
                    <div class="display-1" style="display: block; line-height: 1;">20</div>
                    <div class="display-6 fw-bold" style="display: block; line-height: 1;">Oct</div>
                    <div class="display-6 fw-bold" style="display: block; line-height: 1;">2022</div>
                </time>
            </div>
            <div class="ratio ratio-1x1" style="width: 25%;">
                <img
                    src="https://st.depositphotos.com/1665366/1267/v/950/depositphotos_12676701-stock-illustration-party-background-vector-design.jpg"
                    alt="event-image"
                    class="img-fluid object-fit-cover">
            </div>
            <div>
                <div class="d-flex flex-column h-100">
                    <h2 class="fw-bold fs-1 pt-2 px-3">Charity concert</h2>
                    <div class="mb-3 fs-5 px-3"><i class="bi bi-geo-alt-fill me-2"></i>Штип</div>
                    <div class="mb-3 fs-5 px-3 mt-auto"> The money raised on this concert will go to building new
                        homeless shelters
                        in Shtip and Skopje.
                    </div>
                    <Link class="text-center text-dark fs-5 mt-auto">
                        <div class="bg"><span class="fa fa-globe"></span> Website</div>
                    </Link>
                </div>
            </div>
            <div class="border-left" style="width: 5%;">
            </div>
        </div>
    </Link>
</template>

<script>
export default {
    name: "EventComponent"
}
</script>

<style scoped>
.box-shadow {
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
}

.bg {
    background-color: #cbd5e0;
}

.border-left {
    border-left: 2px solid #e2e8f0;
}

.bg-date {
    background-color: palevioletred;
}
</style>
