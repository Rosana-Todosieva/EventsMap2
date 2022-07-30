<template>
    <div class="card border-0 box-shadow bg-light text-dark position-relative h-100">
        <div class="d-flex flex-column flex-md-row h-100">
            <div class="d-flex flex-column-reverse flex-md-row" style="flex-basis: 40%">
                <div class="bg-date text-white d-flex flex-column align-items-center justify-content-center p-1">
                    <div class="display-4 lh-1">{{ event.formatted_date.day }}</div>
                    <div class="fs-4 fw-bold lh-1">{{ event.formatted_date.month }}</div>
                    <div class="fs-4 fw-bold lh-1">{{ event.formatted_date.year }}</div>
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
                                {{ event.user.creator.city.name }} - {{ event.user.creator.address }}
                            </div>
                            <div class="mb-1 fs-6 fw-bold">
                                {{ event.user.name }}
                            </div>
                        </div>
                        <div class="fs-5 text-end mt-auto">
                            {{ event.price }} <small class="text-muted">ден.</small>
                        </div>
                        <div class="fs-6 text-truncate-3">
                            {{ event.description }}
                        </div>

                    </div>
                    <a v-if="!mine" :href=event.user.creator.website @click.stop
                       class="text-center text-dark fs-5 text-truncate-1 position-relative" style="z-index:2">
                        <div class="bg"><span class="bi bi-globe"></span> {{ event.user.creator.website }}</div>
                    </a>

                    <div v-else class="d-flex btn-group text-center fs-6 fw-bold position-relative"
                         style="z-index:2">

                        <Link :href="route('event.sold_out', event)" :disabled="event.sold_out" method="put" type="button" as="button" class="rounded-0 d-flex flex-grow-1 btn text-dark border border-2" >
                            <i class="bi bi-check-circle-fill me-1"></i>
                            Заврши
                        </Link>
                        <Link :href="route('events.edit', event)" :class="{'disabled': event.sold_out}" class="rounded-0 d-flex flex-grow-1 btn text-dark border border-2"  @click.stop>
                            <i class="bi bi-pencil-fill me-1"></i>
                            Измени
                        </Link>
                        <Link :href="route('events.destroy', event)" method="delete" type="button" as="button" class="d-flex flex-grow-1 btn text-dark border-2 border rounded-0" @click.stop>
                            <i class="bi bi-trash-fill me-1"></i>
                            Избриши
                        </Link>
                    </div>

                </div>
                <div :class="{'text-light': !event.sold_out}" class="border-left text-vertical fs-4 lh-1">
                    SOLD OUT
                </div>
            </div>
        </div>
        <Link :href="route('events.show', event)" class="stretched-link"/>
    </div>
</template>

<script>
import {Inertia} from "@inertiajs/inertia";

export default {
    name: "EventComponent",
    props: {
        event: Object,
        mine: {
            Type: Boolean,
            Default:false
        }
    },
    setup(props){
        const soldOut = () => {
            Inertia.put(route('event.sold_out', props.event.id))
        }
        return {soldOut}
    }
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
