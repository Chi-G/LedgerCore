<template>
  <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20 bg-gradient-to-br from-blue-900 via-gray-900 to-blue-900">

    <!-- Animated Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-primary via-secondary to-primary"
    >
        <div class="absolute inset-0 opacity-20">
            <div
                class="absolute top-20 left-20 w-72 h-72 bg-accent/10 rounded-full blur-3xl animate-pulse"
            ></div>
            <div
                class="absolute bottom-20 right-20 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 1s"
            ></div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-green-400/10 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 2s"
            ></div>
        </div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto text-center px-4">
      <div class="animate-fade-in">
        <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
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
                ">
            Innovation
          </span>
          <span class="block text-white">Ecosystem</span>
        </h1>
      </div>

      <div class="mt-8">
        <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto">
          Comprehensive digital solutions engineered for global business transformation
        </p>
      </div>

      <!-- Service Navigation -->
      <div class="flex flex-wrap justify-center gap-4 mb-16">
        <button
          v-for="service in services"
          :key="service.id"
          class="px-6 py-3 rounded-lg border transition-all duration-300"
          :class="activeService === service.id
            ? 'bg-blue-500 text-white border-blue-500'
            : 'bg-transparent text-gray-300 border-gray-600 hover:border-blue-400 hover:text-blue-400'"
          @click="activeService = service.id"
        >
          {{ service.label }}
        </button>
      </div>

      <!-- Service Content -->
      <div class="max-w-2xl mx-auto">
        <div
          v-for="service in services"
          :key="service.id + '-section'"
          v-show="activeService === service.id"
          class="transition-opacity duration-300"
        >
          <p class="text-lg text-gray-200">{{ service.description }}</p>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue'

const services = [
  {
    id: 'web-dev',
    label: 'Web Development',
    description: 'Build robust, scalable websites and web apps tailored for your business.'
  },
  {
    id: 'mobile-apps',
    label: 'Mobile Apps',
    description: 'Reach your customers on any device with custom mobile solutions.'
  },
  {
    id: 'ui-ux',
    label: 'UI/UX Design',
    description: 'Delight users with beautiful, intuitive, and accessible interfaces.'
  },
  {
    id: 'business-intel',
    label: 'Business Intelligence',
    description: 'Unlock insights and drive growth with smart data analytics.'
  }
]

const activeService = ref(services[0].id)
</script>
