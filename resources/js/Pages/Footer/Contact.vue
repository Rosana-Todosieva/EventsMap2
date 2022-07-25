<template>
    <form @submit.prevent="submit" class="border bg-light m-3 p-3">

        <BaseInput label="Име" type="text" class="mb-3"/>
        <BaseInput label="Маил" type="text" class="mb-3"/>
        <BaseTextarea label="Порака" type="textarea" class="mb-3"/>


        <button type="submit"  class="btn btn-primary btn-block m-2" data-bs-toggle="collapse" data-bs-target="#linux">Прати</button>
        <Link :href="route('homepage')" class="btn btn-primary m-2">Назад</Link>

        <div id="linux" class="collapse text-danger">
            <h3>Ви благодариме што не контантиравте.</h3> <p>Очекувајте одговор во наредните 2 до 3 работни денови.</p>
        </div>

        <div> Исто така, може да не контактирате на нашата 24/7 сервисна линија : 022 345 789</div>

    </form>
</template>

<script>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import BaseInput from "@/Components/Inputs/BaseInput.vue";
import BaseTextarea from "@/Components/Inputs/BaseTextarea.vue";

export default {
    name: "Contact",
    components: {BaseInput, BaseTextarea},
    layout: DefaultLayout
}
</script>

<style scoped>

</style>
