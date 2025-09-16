<template>
    <section class="section-padding bg-secondary">
        <div class="container-max">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-background mb-6">
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
                            ">Client Portal
                        </span> Access
                    </h2>
                    <p class="text-xl text-gray-300 mb-8">
                        Secure access to project status, resources, and direct communication with your dedicated team.
                    </p>

                    <div class="space-y-6 mb-8">
                        <div class="flex items-start space-x-2">
                            <div class="w-8 h-8 bg-accent/10 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-accent" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-background mb-2">Real-time Project Updates</h3>
                                <p class="text-gray-400">Track project milestones, deliverables, and timeline progress in real-time.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-2">
                            <div class="w-8 h-8 bg-success/10 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-success" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-background mb-2">Resource Library</h3>
                                <p class="text-gray-400">Access training materials, documentation, and project assets anytime.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-2">
                            <div class="w-8 h-8 bg-purple-500/10 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-background mb-2">Direct Team Communication</h3>
                                <p class="text-gray-400">Message your project team directly and schedule consultation calls.</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="javascript:void(0)" class="btn-primary hover-lift">
                            Access Client Portal
                        </a>
                        <a href="/contact" class="btn-secondary hover-lift">
                            Request Portal Access
                        </a>
                    </div>
                </div>

                <div class="relative">
                    <div class="hero-card protected-image-container bg-gray-900/50 backdrop-blur-sm border border-gray-700">
                        <img src="/clientPortal.avif" alt="Client portal dashboard interface" class="w-full h-64 object-cover rounded-lg mb-6" loading="lazy"/>

                        <!-- Portal Preview -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">Project Progress</span>
                                <span class="text-success">85% Complete</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2">
                                <div class="bg-gradient-to-r from-accent to-success h-2 rounded-full" style="width: 85%"></div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 text-center">
                                <div>
                                    <div class="text-lg font-semibold text-accent">12</div>
                                    <div class="text-gray-400 text-sm">Active Tasks</div>
                                </div>
                                <div>
                                    <div class="text-lg font-semibold text-success">3</div>
                                    <div class="text-gray-400 text-sm">New Messages</div>
                                </div>
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
