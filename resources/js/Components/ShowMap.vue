<template>
    <div>
        <l-map style="height: 300px" :zoom="zoom" :center="center" :options="options()">
            <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
            <l-marker :lat-lng="latLng" :icon="icon()">
                <l-popup v-if="text" >
                    <b>{{text}}}</b>
                </l-popup>
            </l-marker>
        </l-map>
        <div class="text-end">
            <a :href="`https://www.google.com/maps/dir//${latLng.join(',')}`" class="text-primary">
                {{ __('Bring me to the location') }}
            </a>
        </div>
    </div>
</template>

<script>
import {LMap, LTileLayer, LMarker, LPopup} from "@vue-leaflet/vue-leaflet";
import {Browser, Icon} from "leaflet";
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
    methods: {
        options() {
            return {
                scrollWheelZoom: false,
                tap: !Browser.mobile,
                dragging: !Browser.mobile,
            };
        },
        icon() {
            return new Icon({
                iconUrl: '/images/marker-icon.png',
                shadowUrl: '/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });
        }
    },
    data() {
        return {
            url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            attribution:
                '&copy; <a target="_blank" href="http://osm.org/copyright">OpenStreetMap</a> contributors',
            zoom: 14,
            center: this.latLng,
        };
    }
}
</script>

<style scoped>

</style>
