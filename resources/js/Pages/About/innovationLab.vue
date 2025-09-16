<template>
     <section class="section-padding bg-primary">
        <div class="container-max">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-block px-4 py-2 bg-accent/10 text-accent rounded-full text-sm font-medium mb-6">
                        Innovation Lab
                    </div>
                    <h2 class="text-4xl font-bold text-background mb-6">
                        Where <span class="text-gradient">Ideas Become Reality</span>
                    </h2>
                    <p class="text-xl text-gray-300 mb-6">
                        Our dedicated R&D space where we experiment with emerging technologies, develop open-source solutions, and prototype the future of global digital innovation.
                    </p>

                    <!-- Lab Features -->
                    <div class="space-y-4 mb-8">
                        <div class="flex items-start space-x-2">
                            <div class="w-6 h-6 bg-accent/20 rounded-full flex items-center justify-center mt-1">
                                <svg class="w-3 h-3 text-accent" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-background mb-2">Emerging Tech Research</h4>
                                <p class="text-gray-400">Exploring AI, blockchain, and IoT applications for businesses worldwide</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-2">
                            <div class="w-6 h-6 bg-green-400/20 rounded-full flex items-center justify-center mt-1">
                                <svg class="w-3 h-3 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-background mb-2">Open Source Contributions</h4>
                                <p class="text-gray-400">Building tools and libraries for the global developer community</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-2">
                            <div class="w-6 h-6 bg-purple-400/20 rounded-full flex items-center justify-center mt-1">
                                <svg class="w-3 h-3 text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-background mb-2">Rapid Prototyping</h4>
                                <p class="text-gray-400">Quick validation of innovative concepts before full development</p>
                            </div>
                        </div>
                    </div>

                    <a href="/portfolio" class="btn-primary hover-lift">
                        Explore Our Innovations
                    </a>
                </div>

                <div class="relative">
                    <div class="hero-card protected-image-container bg-gray-900/50 backdrop-blur-sm border border-gray-700">
                        <img src="/ourLab.avif" alt="Innovation lab workspace" class="w-full h-64 object-cover rounded-lg mb-6" loading="lazy" />

                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-accent mb-1">20+</div>
                                <div class="text-gray-400 text-sm">Active Projects</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-green-400 mb-1">12</div>
                                <div class="text-gray-400 text-sm">Open Source</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-purple-400 mb-1">35+</div>
                                <div class="text-gray-400 text-sm">Prototypes</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-yellow-400 mb-1">100%</div>
                                <div class="text-gray-400 text-sm">Innovation</div>
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
