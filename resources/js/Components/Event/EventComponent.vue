<template>
    <div class="card border-0 box-shadow bg-light text-dark position-relative">
        <div class="d-flex flex-column flex-md-row">
            <div class="d-flex flex-column-reverse flex-md-row" style="flex-basis: 40%">
                <div class="bg-date text-white d-flex flex-column align-items-center justify-content-center p-1">
                    <div class="display-4 lh-1">20</div>
                    <div class="fs-4 fw-bold lh-1">Oct</div>
                    <div class="fs-4 fw-bold lh-1">2022</div>
                </div>
                <div class="ratio ratio-1x1">
                    <img
                        src="https://st.depositphotos.com/1665366/1267/v/950/depositphotos_12676701-stock-illustration-party-background-vector-design.jpg"
                        alt="event-image"
                        class="object-fit-cover">
                </div>
            </div>
            <div class="d-flex" style="flex-basis: 60%">
                <div class="d-flex flex-column">
                    <div class="d-flex flex-column p-2 flex-grow-1">
                        <h2 class="fw-bold fs-3 mb-0">Charity concert</h2>
                        <div class="d-flex justify-content-between">
                            <div class="mb-1 fs-6">
                                <i class="bi bi-geo-alt-fill "></i>
                                Штип
                            </div>
                            <div class="mb-1 fs-6 fw-bold">
                                De facto
                            </div>
                        </div>
                        <div class="fs-6 mt-auto"> The money raised on this concert will go to building new
                            homeless shelters in Shtip and Skopje.
                        </div>
                    </div>
                    <a href="https://www.w3schools.com/tags/tag_time.asp" @click.stop
                       class="text-center text-dark fs-5 position-relative" style="z-index:2">
                        <div class="bg"><span class="bi bi-globe"></span> Website</div>
                    </a>
                </div>
                <div class="border-left text-vertical fs-4 lh-1 ">
                    SOLD OUT
                </div>
            </div>
        </div>
        <Link href="" class="stretched-link"/>
    </div>
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
    color: palevioletred;
}

.bg-date {
    background-color: palevioletred;
}

.lh-1 {
    line-height: 1 !important;
}
</style>
