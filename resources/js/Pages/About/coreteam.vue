<template>
    <section class="section-padding bg-secondary">
        <div class="container-max">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-background mb-6">
                    Our
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
                        ">Expert Team
                    </span>
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Talented professionals from diverse backgrounds united by passion for innovation
                </p>
            </div>

            <!-- Team Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Senior Developer -->
                <div class="group">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-accent transition-all duration-300 hover-lift">
                        <div class="relative mb-4 protected-image-container">
                            <img src="/david.jpg" alt="David Abraham - Fullstack Developer" class="w-20 h-20 rounded-full object-cover mx-auto border-2 border-accent/20" loading="lazy"/>
                        </div>
                        <div class="text-center">
                            <h4 class="text-lg font-semibold text-background mb-1">David Abraham</h4>
                            <p class="text-accent text-sm mb-3">Full-Stack Developer</p>
                            <div class="flex flex-wrap gap-1 justify-center">
                                <span class="px-2 py-1 bg-accent/10 text-accent text-xs rounded">React</span>
                                <span class="px-2 py-1 bg-accent/10 text-accent text-xs rounded">Node.js</span>
                                <span class="px-2 py-1 bg-accent/10 text-accent text-xs rounded">Python</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile Developer -->
                <div class="group">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-purple-500 transition-all duration-300 hover-lift">
                        <div class="relative mb-4 protected-image-container">
                            <img src="/anozie-onyezewe.jpg" alt="Okechukwu Umeh - Mobile Developer" class="w-20 h-20 rounded-full object-cover mx-auto border-2 border-purple-500/20" loading="lazy"/>
                        </div>
                        <div class="text-center">
                            <h4 class="text-lg font-semibold text-background mb-1">Anozie Onyezewe</h4>
                            <p class="text-purple-400 text-sm mb-3">Lead Mobile Developer</p>
                            <div class="flex flex-wrap gap-1 justify-center">
                                <span class="px-2 py-1 bg-purple-500/10 text-purple-400 text-xs rounded">Flutter</span>
                                <span class="px-2 py-1 bg-purple-500/10 text-purple-400 text-xs rounded">React Native</span>
                                <span class="px-2 py-1 bg-purple-500/10 text-purple-400 text-xs rounded">Swift</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- UI/UX Designer -->
                <div class="group">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-green-400 transition-all duration-300 hover-lift">
                        <div class="relative mb-4 protected-image-container">
                            <img src="/chinel.jpg" alt="Chineleobi Ikpeoha - UI/UX Designer" class="w-20 h-20 rounded-full object-cover mx-auto border-2 border-green-400/20" loading="lazy" />
                        </div>
                        <div class="text-center">
                            <h4 class="text-lg font-semibold text-background mb-1">Chineleobi Ikpeoha</h4>
                            <p class="text-green-400 text-sm mb-3">UI/UX Designer</p>
                            <div class="flex flex-wrap gap-1 justify-center">
                                <span class="px-2 py-1 bg-green-400/10 text-green-400 text-xs rounded">Figma</span>
                                <span class="px-2 py-1 bg-green-400/10 text-green-400 text-xs rounded">Adobe XD</span>
                                <span class="px-2 py-1 bg-green-400/10 text-green-400 text-xs rounded">Sketch</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Analyst -->
                <div class="group">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-yellow-400 transition-all duration-300 hover-lift">
                        <div class="relative mb-4 protected-image-container">
                            <img src="/nanya.jpg" alt="Ihunaya Onunka - Data Analyst" class="w-20 h-20 rounded-full object-cover mx-auto border-2 border-yellow-400/20" loading="lazy"/>
                        </div>
                        <div class="text-center">
                            <h4 class="text-lg font-semibold text-background mb-1">Ihunanya Onunka</h4>
                            <p class="text-yellow-400 text-sm mb-3">Data Analyst</p>
                            <div class="flex flex-wrap gap-1 justify-center">
                                <span class="px-2 py-1 bg-yellow-400/10 text-yellow-400 text-xs rounded">Power BI</span>
                                <span class="px-2 py-1 bg-yellow-400/10 text-yellow-400 text-xs rounded">Python</span>
                                <span class="px-2 py-1 bg-yellow-400/10 text-yellow-400 text-xs rounded">SQL</span>
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
