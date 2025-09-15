<template>
    <NotFoundModal :show="showModal" @close="closeModal" />
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { usePage } from '@inertiajs/vue3';
import NotFoundModal from './../Components/UI/NotFoundModal.vue';

const page = usePage();
const showModal = ref(false);

const openModal = () => {
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};

onMounted(() => {
    window.addEventListener('show-not-found-modal', openModal);
    if (page.component === 'ErrorHandler') {
        openModal();
    }
});

onUnmounted(() => {
    window.removeEventListener('show-not-found-modal', openModal);
});
</script>
