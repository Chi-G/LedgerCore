<template>
    <section id="testimonials" class="section-padding bg-secondary">
        <div class="container-max">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-background mb-6">
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
                        ">Global Leaders
                    </span> Share Their Success
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Hear directly from CEOs and business leaders worldwide about their digital transformation journey with Forahia
                </p>
            </div>

            <!-- Video Testimonials Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
                <!-- Video Testimonial 1 -->
                <div class="group relative">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-accent transition-all duration-300 hover-lift">
                        <div class="relative mb-6 protected-image-container">
                            <img src="/adebayo.avif" alt="CEO Adebayo Ogundimu video testimonial" class="w-full h-48 object-cover rounded-lg" loading="lazy"/>
                            <div class="absolute inset-0 bg-black/40 rounded-lg flex items-center justify-center group-hover:bg-black/30 transition-colors">
                                <button class="w-16 h-16 bg-accent/90 rounded-full flex items-center justify-center hover:bg-accent transition-colors">
                                    <svg class="w-6 h-6 text-primary ml-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4">
                                <img src="/black.jpg" alt="Adebayo Ogundimu" class="w-12 h-12 rounded-full object-cover" loading="lazy"/>
                                <div>
                                    <h3 class="text-lg font-semibold text-background">Adebayo Ogundimu</h3>
                                    <p class="text-gray-400">CEO, TechHub Global</p>
                                </div>
                            </div>
                            <blockquote class="text-gray-300 italic">
                                "Forahia transformed our entire business model. We went from struggling with manual processes to becoming the leading fintech platform in our region. Our revenue increased by 450% in just 18 months."
                            </blockquote>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-success/10 text-success text-sm rounded-full">450% Revenue Growth</span>
                                <span class="px-3 py-1 bg-accent/10 text-accent text-sm rounded-full">18 Months ROI</span>
                                <span class="px-3 py-1 bg-purple-500/10 text-purple-400 text-sm rounded-full">Fintech</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Video Testimonial 2 -->
                <div class="group relative">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-success transition-all duration-300 hover-lift">
                        <div class="relative mb-6 protected-image-container">
                            <img src="/alex_adebisi.avif" alt="CEO Alex Adebisi video testimonial" class="w-full h-48 object-cover rounded-lg" loading="lazy"/>
                            <div class="absolute inset-0 bg-black/40 rounded-lg flex items-center justify-center group-hover:bg-black/30 transition-colors">
                                <button class="w-16 h-16 bg-success/90 rounded-full flex items-center justify-center hover:bg-success transition-colors">
                                    <svg class="w-6 h-6 text-primary ml-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4">
                                <img src="/black2.jpg" alt="Kemi Adebisi" class="w-12 h-12 rounded-full object-cover" loading="lazy"/>
                                <div>
                                    <h3 class="text-lg font-semibold text-background">Alex Adebisi</h3>
                                    <p class="text-gray-400">Founder, Global Fashion House</p>
                                </div>
                            </div>
                            <blockquote class="text-gray-300 italic">
                                "The e-commerce platform Forahia built for us revolutionized how we reach customers globally. Our online sales now represent 75% of total revenue, up from zero before the partnership."
                            </blockquote>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-success/10 text-success text-sm rounded-full">75% Online Revenue</span>
                                <span class="px-3 py-1 bg-accent/10 text-accent text-sm rounded-full">12 Months</span>
                                <span class="px-3 py-1 bg-purple-500/10 text-purple-400 text-sm rounded-full">E-commerce</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- More Testimonials Button -->
            <div class="text-center">
                <a href="/portfolio" class="btn-primary hover-lift">
                    View All Success Stories
                </a>
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
