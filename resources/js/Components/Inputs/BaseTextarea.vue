<template>
    <div class="mb-3 ">
        <label :for="name" class="form-label">{{ label}}</label>
        <textarea :type="type" class="form-control border-radius-20px line-height-normal min-height" :id="name" :placeholder="placeholder"
                  v-model="value" :class="{'is-invalid':error}" :autofocus="autofocus">
        </textarea>
        <div class="invalid-feedback">{{ error }}</div>
    </div>
</template>

<script>
import {computed} from "vue";

export default {
    name: "BaseTextarea",
    props: {
        type: {
            default: 'textarea'
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
.min-height {
    min-height: 150px;
}
</style>
