<template>
    <div class="mb-3">
        <label :for="name" class="form-label">{{ label}}</label>
        <input :type="type" class="form-control rounded-pill " @change="$emit('change')" :id="name" :placeholder="placeholder"
               v-model="value" :class="{'is-invalid':error}" :autofocus="autofocus">
        <div class="invalid-feedback">{{ error }}</div>
    </div>
</template>

<script>
import {computed} from "vue";

export default {
    name: "BaseInput",
    emits:['change'],
    props: {
        type: {
            default: 'text'
        },
        label: {
            type: String
        },
        placeholder: {},
        value: {
            type: [String, Number]
        },
        name: {
            type: String,
            required: true
        },
        error: {},
        whiteLabel: {
            type: Boolean,
            default: false
        },
        autofocus: {
            type: Boolean,
            default: false
        }
    },
    setup(props, {emit}) {
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
