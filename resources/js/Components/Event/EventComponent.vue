<template>
    <div class="card border-0 box-shadow bg-light text-dark position-relative">
        <div class="d-flex flex-column flex-md-row">
            <div class="d-flex flex-column-reverse flex-md-row" style="flex-basis: 40%">
                <div class="bg-date text-white d-flex flex-column align-items-center justify-content-center p-1">
                    <div class="display-4 lh-1">{{event.formatted_date.day}}</div>
                    <div class="fs-4 fw-bold lh-1">{{ event.formatted_date.month }}</div>
                    <div class="fs-4 fw-bold lh-1">{{event.formatted_date.year}}</div>
                    <div class="fs-4 fw-bold lh-1 mt-3">{{ event.time }}</div>
                </div>
                <div class="ratio ratio-1x1">
                    <img
                        :src="event.image"
                        alt="event-image"
                        class="object-fit-cover">
                </div>
            </div>
            <div class="d-flex " style="flex-basis: 60%">
                <div class="d-flex flex-column flex-grow-1">
                    <div class="d-flex flex-column p-2 flex-grow-1">
                        <h2 class="fw-bold fs-3 mb-0">{{ event.title }}</h2>
                        <div class="d-flex justify-content-between">
                            <div class="mb-1 fs-6">
                                <i class="bi bi-geo-alt-fill "></i>
                                {{ event.user.creator.city.name }} - {{event.user.creator.address}}
                            </div>
                            <div class="mb-1 fs-6 fw-bold">
                                {{ event.user.name }}
                            </div>
                        </div>
                        <div class="fs-5 text-end mt-auto">
                            {{event.price}} <small class="text-muted">ден.</small>
                        </div>
                        <div class="fs-6 text-truncate-3">
                            {{event.description}}
                        </div>

                    </div>
                    <a href="https://www.w3schools.com/tags/tag_time.asp" @click.stop
                       class="text-center text-dark fs-5 position-relative" style="z-index:2">
                        <div class="bg"><span class="bi bi-globe"></span> {{ event.user.creator.website }}</div>
                    </a>
                </div>
                <div class="border-left text-vertical fs-4 lh-1">
                    SOLD OUT
                </div>
            </div>
        </div>
        <Link :href="route('events.show', event)" class="stretched-link"/>
    </div>
</template>

<script>
export default {
    name: "EventComponent",
    props: {
        event: Object
    },
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
