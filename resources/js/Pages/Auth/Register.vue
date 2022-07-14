<template>
    <div class="container px-5 my-5">
        <div class="container px-5 border-radius-20px border background-white" style="box-shadow: 5px 5px 5px lightblue;">
            <div class="d-flex justify-content-center py-5">
                <div class="display-6 d-inline-block custom-border-bottom">
                    Регистрирај се
                </div>
            </div>
            <Input></Input>
        </div>

    </div>
</template>

<script>
import AuthLayout from "@/Layouts/AuthLayout.vue";
import Input from "@/Components/Inputs/Input.vue"

export default {
    name: "Register",
    layout: AuthLayout,
    components:{Input}
}
</script>

<style scoped>
.border{
    border: 1px solid black;
}
.background-white{
    background-color: #edf2f7;
}
</style>
