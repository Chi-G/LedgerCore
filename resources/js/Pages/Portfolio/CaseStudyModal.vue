<template>
    <Transition name="modal">
        <div v-if="show" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-[9999] flex items-center justify-center p-4 modal-backdrop" @click="handleBackdropClick">
            <div class="bg-secondary rounded-xl max-w-4xl w-full max-h-[85vh] overflow-y-auto shadow-2xl modal-content" @click.stop>
                <div class="p-8">
                        <!-- Modal Header -->
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-2xl font-bold text-background">{{ project?.caseStudy?.title || 'Case Study Details' }}</h2>
                            <button class="text-gray-400 hover:text-background transition-colors" @click="close">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Modal Content -->
                        <div v-if="project?.caseStudy" v-html="project.caseStudy.content"></div>
                        <div v-else class="text-center py-8">
                            <p class="text-gray-400">Case study details not available</p>
                        </div>
                    </div>
                </div>
            </div>
    </Transition>
</template>

<script setup>
import { watch, onMounted, onUnmounted } from 'vue';

const props = defineProps({
    project: {
        type: Object,
        default: null
    },
    show: {
        type: Boolean,
        default: false
    }
});

const emit = defineEmits(['close']);

function close() {
    emit('close');
}

function handleBackdropClick(event) {
    // Only close if clicking the backdrop (not the modal content)
    if (event.target === event.currentTarget) {
        close();
    }
}

function handleKeyDown(event) {
    if (event.key === 'Escape' && props.show) {
        close();
    }
}

// Add/remove event listeners for keyboard
onMounted(() => {
    document.addEventListener('keydown', handleKeyDown);
});

onUnmounted(() => {
    document.removeEventListener('keydown', handleKeyDown);
});

// When modal is shown, prevent body scroll
watch(() => props.show, (value) => {
    if (value) {
        document.body.style.overflow = 'hidden';
    } else {
        document.body.style.overflow = '';
    }
});
</script>

<style scoped>
.modal-enter-active,
.modal-leave-active {
  transition: opacity 0.3s ease;
}

.modal-enter-from,
.modal-leave-to {
  opacity: 0;
}

.modal-enter-active .bg-secondary {
  transition: transform 0.3s ease;
}

.modal-enter-from .bg-secondary,
.modal-leave-to .bg-secondary {
  transform: scale(0.95);
}

/* Ensure modal is always above header and other elements */
.modal-backdrop {
  z-index: 9999;
}

/* Smooth scrolling for modal content */
.modal-content {
  scrollbar-width: thin;
  scrollbar-color: rgba(255, 255, 255, 0.3) transparent;
}

.modal-content::-webkit-scrollbar {
  width: 6px;
}

.modal-content::-webkit-scrollbar-track {
  background: transparent;
}

.modal-content::-webkit-scrollbar-thumb {
  background-color: rgba(255, 255, 255, 0.3);
  border-radius: 3px;
}
</style>
