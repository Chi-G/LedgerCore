<template>
    <section class="section-padding bg-primary">
        <div class="container-max">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-block px-4 py-2 bg-accent/10 text-accent rounded-full text-sm font-medium mb-6">
                        Our Global Headquarters
                    </div>
                    <h2 class="text-4xl font-bold text-background mb-6">
                        Located in the Heart of
                        <span
                            style="
                                background: linear-gradient(
                                    to right,
                                    #00d4ff,
                                    #10b981
                                );
                                -webkit-background-clip: text;
                                background-clip: text;
                                color: transparent;
                                -webkit-text-fill-color: transparent;
                            ">Global Innovation
                        </span>
                    </h2>
                    <p class="text-xl text-gray-300 mb-8">
                        Our headquarters strategically positions us at the center of the global technology ecosystem, enabling seamless collaboration with clients and partners worldwide.
                    </p>

                    <!-- Office Details -->
                    <div class="space-y-6 mb-8">
                        <div class="flex items-start space-x-2">
                            <div class="w-6 h-6 bg-accent/20 rounded-full flex items-center justify-center mt-1">
                                <svg class="w-3 h-3 text-accent" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-background mb-1">Address</h4>
                                <p class="text-gray-400">Independence Avenue Central Business District, Abuja, Nigeria</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-2">
                            <div class="w-6 h-6 bg-green-400/20 rounded-full flex items-center justify-center mt-1">
                                <svg class="w-3 h-3 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-background mb-1">Phone</h4>
                                <p class="text-gray-400">+234 (0) 706 591 0449</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-2">
                            <div class="w-6 h-6 bg-purple-400/20 rounded-full flex items-center justify-center mt-1">
                                <svg class="w-3 h-3 text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-background mb-1">Email</h4>
                                <p class="text-gray-400">biz@forahia.org.ng</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-2">
                            <div class="w-6 h-6 bg-yellow-400/20 rounded-full flex items-center justify-center mt-1">
                                <svg class="w-3 h-3 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-background mb-1">Office Hours</h4>
                                <p class="text-gray-400">Monday - Friday: 9:00 AM - 6:00 PM WAT</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/contact" class="btn-primary hover-lift">
                            Schedule a Visit
                        </a>
                        <a href="javascript:void(0)" class="btn-secondary hover-lift">
                            Get Directions
                        </a>
                    </div>
                </div>

                <div class="relative">
                    <div class="hero-card protected-image-container bg-gray-900/50 backdrop-blur-sm border border-gray-700">
                        <img src="/ourOffice.avif" alt="Modern office building and skyline" class="w-full h-64 object-cover rounded-lg mb-6" loading="lazy"/>

                        <div class="text-center">
                            <h3 class="text-xl font-semibold text-background mb-4">Visit Our Office</h3>
                            <p class="text-gray-400 mb-4">
                                Experience our collaborative workspace and meet the team behind global digital transformation success stories.
                            </p>
                            <div class="inline-block px-4 py-2 bg-accent/10 text-accent rounded-full text-sm font-medium">
                                Global Operations Center
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { onMounted, onUnmounted, ref } from 'vue';

// Toast notification variables
const showToast = ref(false);
const toastMessage = ref('');

// Function to prevent right-click on protected images
const handleContextMenu = (e) => {
    if (e.target.closest('.protected-image-container')) {
        e.preventDefault();
        showProtectionToast('Image is protected');
        return false;
    }
};

// Function to prevent keyboard shortcuts for saving images
const handleKeyDown = (e) => {
    // Prevent Ctrl+S, Ctrl+U, F12, etc.
    if ((e.ctrlKey || e.metaKey) && (e.key === 's' || e.key === 'S' || e.key === 'u' || e.key === 'U')) {
        e.preventDefault();
        showProtectionToast('Keyboard shortcut blocked');
        return false;
    }
};

// Function to prevent drag operations on protected images
const handleDragStart = (e) => {
    if (e.target.closest('.protected-image-container')) {
        e.preventDefault();
        return false;
    }
};

// Function to show toast notification
const showProtectionToast = (message) => {
    toastMessage.value = message;
    showToast.value = true;

    // Hide after 3 seconds
    setTimeout(() => {
        showToast.value = false;
    }, 3000);
};

onMounted(() => {
    document.addEventListener('contextmenu', handleContextMenu);
    document.addEventListener('keydown', handleKeyDown);
    document.addEventListener('dragstart', handleDragStart);

    // Also prevent copy events
    document.addEventListener('copy', (e) => {
        if (e.target.closest('.protected-image-container')) {
            e.preventDefault();
            showProtectionToast('Copy operation blocked');
            return false;
        }
    });
});

onUnmounted(() => {
    document.removeEventListener('contextmenu', handleContextMenu);
    document.removeEventListener('keydown', handleKeyDown);
    document.removeEventListener('dragstart', handleDragStart);
    // Note: We can't remove the inline copy event listener since it's anonymous
    // This is generally fine as the component will be destroyed anyway
});

</script>

<style>
/* Protected image container - handles all the protections */
.protected-image-container {
  position: relative;
  pointer-events: auto; /* Allow interactions with the container */
  overflow: hidden;
}

/* Only images inside the container should be non-interactive */
.protected-image-container img {
  pointer-events: none;
  -webkit-user-drag: none;
  -khtml-user-drag: none;
  -moz-user-drag: none;
  -o-user-drag: none;
  user-select: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
}

/* Apply CSS protection pattern over the image */
.protected-image-container::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: linear-gradient(
    45deg,
    rgba(255, 255, 255, 0.02) 25%,
    transparent 25%,
    transparent 50%,
    rgba(255, 255, 255, 0.02) 50%,
    rgba(255, 255, 255, 0.02) 75%,
    transparent 75%
  );
  background-size: 4px 4px;
  pointer-events: none;
  z-index: 5;
}
</style>
