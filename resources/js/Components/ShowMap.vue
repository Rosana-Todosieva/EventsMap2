<template>
    <div>
        <div class="border border-2 border-secondary">
            <l-map style="height: 350px" :zoom="14" :center="center" :options="options">
                <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
                <l-marker :lat-lng="latLng" :icon="icon">
                    <l-popup v-if="text">
                        <b>{{ text }}}</b>
                    </l-popup>
                </l-marker>
            </l-map>
        </div>
        <div class="text-end">
            <a :href="`https://www.google.com/maps/dir//${latLng.join(',')}`" class="text-dark">
                Однеси ме на локацијата
            </a>
        </div>
    </div>
</template>

<script>
import {LMap, LTileLayer, LMarker, LPopup} from "@vue-leaflet/vue-leaflet";
import {Browser, Icon} from "leaflet";
import "leaflet/dist/leaflet.css"

export default {
    name: "ShowMap",
    components: {
        LMap,
        LTileLayer,
        LMarker,
        LPopup
    },
    props: {
        latLng: Array,
        text: String
    },
    setup(props) {

        const options = {
            scrollWheelZoom: false,
            tap: !Browser.mobile,
            dragging: !Browser.mobile,
        }
        const icon = new Icon({
            iconUrl: '/images/marker-icon.png',
            shadowUrl: '/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        })
        const url = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'
        const attribution = '&copy; <a target="_blank" href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        const center = props.latLng
        return {options, icon, center, attribution, url}
    },
}
</script>

<style scoped>

</style>
