<template>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="e xampleFormControlInput1" placeholder="name@example.com">
    </div>
</template>

<script>
export default {
    name: "Input",
    props: {
        title: {
            required: true,
            type: String
        },
        type: {
            type: String,
            default: "text"
        },
        value: String,
        error: {
            type: String
        }
    }
}
</script>

<style scoped>

</style>
