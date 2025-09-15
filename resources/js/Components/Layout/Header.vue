<template>
    <nav class="fixed top-0 left-0 right-0 z-50 bg-primary/90 backdrop-blur-md border-b border-gray-800">
        <div class="container-max">
            <div class="flex items-center justify-between py-4">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <Link href="/">
                        <img src="/logo.png" alt="Forahia Logo" class="w-30 h-12 object-contain">
                    </Link>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center">
                    <NavLink href="/">Home</NavLink>
                    <NavLink href="/services" class="ml-8">Services</NavLink>
                    <NavLink href="/portfolio" class="ml-8">Portfolio</NavLink>
                    <NavLink href="/about" class="ml-8">About</NavLink>
                    <NavLink href="/client" class="ml-8">Success Stories</NavLink>
                    <NavLink href="/contact" :is-button="page.url !== '/contact'" class="ml-8">{{ contactButtonText }}</NavLink>
                </div>

                <!-- Mobile Menu Button -->
                <button
                    @click="toggleMobileMenu"
                    class="md:hidden text-background mr-4"
                    aria-label="Open mobile menu"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div v-show="showMobileMenu" class="md:hidden bg-secondary border-t border-gray-800">
            <div class="px-4 py-2 space-y-2">
                <NavLink href="/" :is-mobile="true">Home</NavLink>
                <NavLink href="/services" :is-mobile="true">Services</NavLink>
                <NavLink href="/portfolio" :is-mobile="true">Portfolio</NavLink>
                <NavLink href="/about" :is-mobile="true">About</NavLink>
                <NavLink href="/client" :is-mobile="true">Success Stories</NavLink>
                <NavLink href="/contact" :is-mobile="true" :is-button="true">{{ contactButtonText }}</NavLink>
            </div>
        </div>
    </nav>
</template>

<script setup>

import { ref, computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import NavLink from '@/components/Layout/NavLink.vue'

const showMobileMenu = ref(false)
const toggleMobileMenu = () => {
    showMobileMenu.value = !showMobileMenu.value
}

const page = usePage()
const contactButtonText = computed(() => (page.url === '/contact' ? 'Contact' : 'Get Started'))
</script>
