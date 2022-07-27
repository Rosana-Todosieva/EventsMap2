<template>
    <div class="d-flex fs-5 mb-3">
        <div class="text-gray me-3">
            <i :class="icon"></i>
            <label v-if="label" :for="name" class="form-label">{{ label }}</label>
        </div>
        <div>
            <select class="form-control rounded-pill " :id="name" v-model="value" :class="{'is-invalid':error}"
                    :disabled="disabled">
                <slot></slot>
            </select>
        </div>
        <div class="invalid-feedback">{{ error }}</div>
    </div>
</template>

<script>
import {computed} from "vue";

export default {
    name: "customSelect",
    props: {
        icon: {
            type: String
        },
        label: {
            type: String
        },
        value: {
            type: [String, Number],
            default: null
        },
        name: {
            type: String,
            required: true
        },
        error: {

        },
        disabled: {
            type: Boolean,
            default: false
        }
    },
    setup(props, {emit}){
        const value = computed({
            get() {
                return props.value
            },
            set(val) {
                emit('update:value', val)
            }
        })
        return {value}
    }
}
</script>

<style scoped>

</style>
