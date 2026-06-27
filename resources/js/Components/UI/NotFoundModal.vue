<template>
    <div v-if="show" class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto">
        <!-- Backdrop -->
        <div
            class="fixed inset-0 bg-primary/80 backdrop-blur-sm transition-opacity"
            @click="close"
        ></div>

        <!-- Modal Content -->
        <div class="relative z-10 bg-secondary border border-gray-700 rounded-lg shadow-xl p-6 w-full max-w-md transform transition-all">
            <div class="text-center">
                <!-- Error Icon -->
                <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-error/10 mb-4">
                    <svg class="h-12 w-12 text-error" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>

                <h3 class="text-2xl font-medium text-background mb-2">Page Not Found</h3>
                <p class="text-gray-300 mb-6">The page you're looking for doesn't exist or has been moved.</p>

                <div class="flex justify-center space-x-4">
                    <button
                        class="btn-outline"
                        @click="close"
                    >
                        Close
                    </button>
                    <button
                        class="btn-primary"
                        @click="goHome"
                    >
                        Go to Homepage
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3';

const props = defineProps({
    show: {
        type: Boolean,
        default: false
    }
});

const emit = defineEmits(['close']);

const close = () => {
    emit('close');
};

const goHome = () => {
    router.visit('/');
    close();
};
</script>
