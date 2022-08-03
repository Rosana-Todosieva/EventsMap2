<template>
    <div>
        <label v-if="label" :for="name" class="form-label">{{ label }}</label>
        <select class="form-control rounded-pill " :id="name" v-model="value" :class="{'is-invalid':error}"
                :disabled="disabled" @change="$emit('change')">
            <slot></slot>
        </select>
        <div class="invalid-feedback">{{ error }}</div>
    </div>
</template>

<script>
import {computed} from "vue";

export default {
    name: "BaseSelect",
    emits:['change'],
    props: {
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
