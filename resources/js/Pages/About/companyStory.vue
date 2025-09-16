<template>
    <section class="section-padding bg-secondary">
        <div class="container-max">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-block px-4 py-2 bg-accent/10 text-accent rounded-full text-sm font-medium mb-6">
                        Our Story
                    </div>
                    <h2 class="text-4xl font-bold text-background mb-6">
                        Bridging Dreams with
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
                            ">Digital Reality
                        </span>
                    </h2>
                    <p class="text-xl text-gray-300 mb-6">
                        Founded in 2019 with a simple yet ambitious vision: to transform businesses through world-class digital innovation. We recognized the gap between ambitious business dreams and technical execution in emerging markets.
                    </p>
                    <p class="text-lg text-gray-400 mb-8">
                        Our founders, having worked with international tech giants and understanding the unique challenges of businesses in diverse regions, created Forahia to be the bridge between global technical standards and local business culture. Today, we're proud to be a premier digital innovation consultancy.
                    </p>

                    <!-- Key Milestones -->
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-accent rounded-full"></div>
                            <span class="text-gray-300 ml-4"><strong class="text-accent">2019:</strong> Founded with 3 passionate developers</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                            <span class="text-gray-300 ml-4"><strong class="text-green-400">2021:</strong> Expanded to 15+ team members across multiple regions</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-purple-400 rounded-full"></div>
                            <span class="text-gray-300 ml-4"><strong class="text-purple-400">2023:</strong> Launched Out Innovations for projects</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                            <span class="text-gray-300 ml-4"><strong class="text-yellow-400">2025:</strong> 150+ successful transformations completed</span>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="hero-card protected-image-container bg-gray-900/50 backdrop-blur-sm border border-gray-700">
                        <img src="/ourMission.avif" alt="Forahia team collaboration" class="w-full h-64 object-cover rounded-lg mb-6" loading="lazy" />

                        <div class="text-center">
                            <h3 class="text-xl font-semibold text-background mb-4">Our Mission</h3>
                            <p class="text-gray-400">
                                To empower businesses worldwide with world-class digital solutions that drive real transformation and sustainable growth.
                            </p>
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
