<template>
    <div ref="modalRef" class="modal fade" id="soldout-event-modal" tabindex="-1" aria-labelledby="MarkSoldOutEventModal"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content" v-if="event">
                <div class="modal-header">
                    <h5 class="modal-title">SOLD OUT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Исклучи"></button>
                </div>
                <div class="modal-body">
                    <div class="fs-5 text-center line-height-normal">
                        Дали сте сигурени дека сакате да го завршите настанот
                        <span class="fw-bold">{{ event.title }}</span>?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Исклучи</button>
                    <button :disabled="disabled" @click="soldOutEvent"
                            class="btn btn-danger text-white">
                        Заврши настан
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Modal} from 'bootstrap'
import {Inertia} from "@inertiajs/inertia";
import {onMounted, ref} from "vue";

export default {
    name: "MarkSoldOutEventModal",
    setup(){
        const event = ref(null)
        const modal  = ref(null)
        const modalRef = ref(null)
        const disabled = ref(false)
        onMounted(()=>{
            modal.value = Modal.getOrCreateInstance(modalRef.value)
            modalRef.value.addEventListener('show.bs.modal', (e)=>{
                const button = e.relatedTarget;
                event.value = JSON.parse(button.getAttribute('data-bs-event'))
            })
        })
        const soldOutEvent = ()=> {
            Inertia.put(route('event.sold_out', event.value), null, {
                onBefore: () => {
                    disabled.value = true
                },
                onSuccess: () => {
                    disabled.value = false
                    modal.value.hide()
                }
            })
        }
        return  {modalRef, soldOutEvent, event, disabled}
    }
}
</script>

<style scoped>

</style>
