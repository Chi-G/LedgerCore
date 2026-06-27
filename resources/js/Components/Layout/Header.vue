<template>
    <nav class="fixed top-0 left-0 right-0 z-50 bg-bg-base/80 backdrop-blur-md border-b border-border">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="flex items-center justify-between py-4">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <Link href="/" class="flex items-center">
                        <img src="/logo.png" alt="Forahia Logo" class="w-auto h-8 md:h-10 object-contain theme-logo">
                    </Link>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-6">
                    <NavLink href="/">Home</NavLink>
                    <NavLink href="/services">Services</NavLink>
                    <NavLink href="/portfolio">Portfolio</NavLink>
                    <NavLink href="/about">About</NavLink>

                    <!-- Theme Toggle -->
                    <button @click="toggleTheme" class="p-2 ml-2 rounded-full bg-bg-elevated/50 hover:bg-bg-elevated border border-border transition-colors text-text-secondary hover:text-text-primary" aria-label="Toggle Theme">
                        <!-- Sun Icon for Light Mode -->
                        <svg v-if="!isDark" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <!-- Moon Icon for Dark Mode -->
                        <svg v-else class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button>

                    <NavLink href="/contact" :is-button="page.url !== '/contact'" class="bg-primary-blue hover:bg-blue-700 text-white px-5 py-2 rounded-md font-medium transition-colors shadow-[0_0_10px_var(--color-primary-glow)]">
                        {{ contactButtonText }}
                    </NavLink>
                </div>

                <!-- Mobile Menu Button -->
                <button
                    @click="toggleMobileMenu"
                    class="md:hidden text-text-primary focus:outline-none"
                    aria-label="Open mobile menu"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path v-if="!showMobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <Transition name="fade-slide">
            <div v-show="showMobileMenu" class="md:hidden bg-bg-surface border-t border-border absolute w-full left-0 shadow-xl">
                <div class="px-6 py-4 flex flex-col space-y-4">
                    <Link href="/" class="text-text-secondary hover:text-text-primary text-lg font-medium transition-colors">Home</Link>
                    <Link href="/services" class="text-text-secondary hover:text-text-primary text-lg font-medium transition-colors">Services</Link>
                    <Link href="/portfolio" class="text-text-secondary hover:text-text-primary text-lg font-medium transition-colors">Portfolio</Link>
                    <Link href="/about" class="text-text-secondary hover:text-text-primary text-lg font-medium transition-colors">About</Link>
                    
                    <div class="flex items-center justify-between py-2 border-t border-border">
                        <span class="text-text-secondary font-medium">Theme</span>
                        <button @click="toggleTheme" class="p-2 rounded-md bg-bg-elevated border border-border transition-colors text-text-primary flex items-center gap-2">
                            <svg v-if="!isDark" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <svg v-else class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                            <span>{{ isDark ? 'Dark Mode' : 'Light Mode' }}</span>
                        </button>
                    </div>

                    <div class="pt-2">
                        <Link href="/contact" class="inline-block text-center w-full bg-primary-blue hover:bg-blue-700 text-white px-5 py-3 rounded-md font-medium transition-colors shadow-[0_0_10px_var(--color-primary-glow)]">
                            {{ contactButtonText }}
                        </Link>
                    </div>
                </div>
            </div>
        </Transition>
    </nav>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import NavLink from '@/Components/Layout/NavLink.vue'

const showMobileMenu = ref(false)
const toggleMobileMenu = () => {
    showMobileMenu.value = !showMobileMenu.value
}

const page = usePage()
const contactButtonText = computed(() => (page.url === '/contact' ? 'Get in Touch' : 'Start a Project'))

// Theme toggle logic
const isDark = ref(true)

const toggleTheme = () => {
    isDark.value = !isDark.value
    if (isDark.value) {
        document.documentElement.classList.add('dark')
        localStorage.setItem('theme', 'dark')
    } else {
        document.documentElement.classList.remove('dark')
        localStorage.setItem('theme', 'light')
    }
}

onMounted(() => {
    const savedTheme = localStorage.getItem('theme')
    if (savedTheme === 'light' || (!savedTheme && window.matchMedia('(prefers-color-scheme: light)').matches)) {
        isDark.value = false
        document.documentElement.classList.remove('dark')
    } else {
        isDark.value = true
        document.documentElement.classList.add('dark')
    }
})
</script>

<style scoped>
.fade-slide-enter-active,
.fade-slide-leave-active {
  transition: all 0.3s ease;
}
.fade-slide-enter-from,
.fade-slide-leave-to {
  opacity: 0;
  transform: translateY(-10px);
}
</style>
