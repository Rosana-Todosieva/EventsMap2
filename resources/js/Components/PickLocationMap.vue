<template>
    <div>
        <l-map style="height: 350px" :zoom="zoom" :center="center" @click="clickMap"
               :options="options()"
               :zoom-control="false">
            <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
            <l-marker :lat-lng="markerValue" v-if="markerValue" :draggable="true"
                      @moveend="move" @move="dragging = true" :icon="icon()"></l-marker>
        </l-map>
    </div>
</template>

<script>
import {LMap, LTileLayer, LMarker} from "@vue-leaflet/vue-leaflet";
import {Browser, Icon} from "leaflet";

export default {
    name: "PickLocationMap",
    components: {
        LMap,
        LTileLayer,
        LMarker
    },
    props: {
        value: String,
    },
    computed: {
        markerValue() {
            if (!this.value) return null
            return this.value.split(',')
        }
    },
    methods: {
        move(e) {
            this.$emit('update', [e.target._latlng.lat, e.target._latlng.lng].join(','))
        },
        options() {
            return {
                scrollWheelZoom: false,
                tap: !Browser.mobile,
                dragging: !Browser.mobile,
            };
        },
        clickMap(e) {
            if (!this.dragging)
                this.$emit('update', [e.latlng.lat, e.latlng.lng].join(','))
            else this.dragging = false
        },

        icon() {
            return new Icon({
                iconUrl: '/images/marker-icon.png',
                shadowUrl: '/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 40],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });
        },
    },
    data() {
        return {
            url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            attribution:
                '&copy; <a target="_blank" href="http://osm.org/copyright">OpenStreetMap</a> contributors',
            zoom: this.value ? 15 : 8,
            center: this.value ? this.value.split(',') : [41.5646078, 21.7261004],
            dragging: false
        };
    }
}
</script>

<style scoped>

</style>
