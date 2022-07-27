<template>
    <div class="d-flex flex-column fs-5 mb-3">
        <div class="text-gray me-4 text-center">
            <i :class="icon"></i>
            <label :for="name" class="form-label">{{ label }}</label>
        </div>
        <div>
            <textarea :type="type" class="form-control line-height-normal min-height" :id="name" :placeholder="placeholder"
                      v-model="value" :class="{'is-invalid':error}" :autofocus="autofocus">

            </textarea>
        </div>
        <div class="invalid-feedback">{{ error }}</div>
    </div>
</template>

<script>
import {computed} from "vue";

export default {
    name: "descInput",
    props: {
        icon: {
            type: String
        },
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
