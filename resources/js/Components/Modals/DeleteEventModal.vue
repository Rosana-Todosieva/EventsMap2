<template>
    <div ref="modalRef" class="modal fade" id="delete-event-modal" tabindex="-1" aria-labelledby="DeleteEventModal"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content" v-if="event">
                <div class="modal-header">
                    <h5 class="modal-title">Избриши настан</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Исклучи"></button>
                </div>
                <div class="modal-body">
                    <div class="fs-5 text-center line-height-normal">
                        Дали сте сигурени дека сакате да го избришете настанот
                        <span class="fw-bold">{{ event.title }}</span>?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Исклучи</button>
                    <button :disabled="disabled" @click="deleteEvent"
                            class="btn btn-danger text-white">
                        Избриши настан
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
    name: "DeleteEventModal",
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
        const deleteEvent = ()=> {
            Inertia.delete(route('events.destroy', event.value), {
                onBefore: () => {
                    disabled.value = true
                },
                onSuccess: () => {
                    disabled.value = false
                    modal.value.hide()
                }
            })
        }
        return  {modalRef, deleteEvent, event, disabled}
    }
}
</script>

<style scoped>

</style>
