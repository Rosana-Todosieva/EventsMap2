<template>
    <div>
        <l-map style="height: 350px" :zoom="zoom" :center="center" @click="clickMap"
               :options="options"
               :zoom-control="false">
            <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
            <l-marker :lat-lng="value" v-if="value[0]" :draggable="true"
                      @moveend="move" @move="dragging = true" :icon="icon"></l-marker>
        </l-map>
    </div>
</template>

<script>
import "leaflet/dist/leaflet.css"
import {LMap, LTileLayer, LMarker} from "@vue-leaflet/vue-leaflet";
import {Browser, Icon} from "leaflet";
import {computed, ref} from "vue";

export default {
    name: "PickLocationMap",
    components: {
        LMap,
        LTileLayer,
        LMarker
    },
    props: {
        value: Array,
    },
    setup(props, {emit}) {
        const dragging = ref(false)
        const value = computed({
            get() {
                return props.value
            },
            set(value) {
                emit('update', value)
            }
        })
        const move = (e) => {
            emit('update', [e.target._latlng.lat, e.target._latlng.lng])
        }
        const options = {
            scrollWheelZoom: false,
            tap: !Browser.mobile,
            dragging: !Browser.mobile,
        }
        const clickMap = (e) => {

            if (!dragging.value && e.latlng)
                emit('update', [e.latlng.lat, e.latlng.lng])
            else
                dragging.value = false
        }
        const icon = new Icon({
            iconUrl: '/images/marker-icon.png',
            shadowUrl: '/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 40],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });
        const url = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'
        const center = props.value[0] ? props.value : [41.5646078, 21.7261004]
        const attribution = '&copy; <a target="_blank" href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        const zoom = props.value[0] ? 15 : 8

        return {value, move, options, icon, clickMap, dragging, url, center, zoom, attribution}
    },
}
</script>

<style scoped>

</style>
