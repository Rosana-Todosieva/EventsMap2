<template>
    <div class="d-flex fs-5 mb-3">
        <div class="text-gray me-3">
            <i :class="icon"></i>
            <label :for="name" class="form-label">{{ label }}</label>
        </div>
        <div>
            <input :type="type" class="form-control rounded-pill " :id="name" :placeholder="placeholder"
                    v-model="value" :class="{'is-invalid':error}" :autofocus="autofocus">
        </div>
        <div class="invalid-feedback">{{ error }}</div>
    </div>
</template>

<script>
import {computed} from "vue";

export default {
    name: "customInput",
    props: {
        icon: {
            type: String
        },
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
