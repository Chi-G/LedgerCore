<template>
    <Link
        :href="href"
        :class="linkClasses"
        :style="isActive ? { color: accentColor } : {}"
    >
        <slot />
    </Link>
</template>

<script setup>

import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
// Set your accent color here to match your Tailwind config
const accentColor = '#109db9' // matches --color-accent in your CSS

const props = defineProps({
    href: {
        type: String,
        required: true
    },
    isButton: {
        type: Boolean,
        default: false
    },
    isMobile: {
        type: Boolean,
        default: false
    }
})

const page = usePage()

const isActive = computed(() => {
    const currentUrl = page.url.value || page.url
    // Exact match for home, startsWith for other routes
    return currentUrl === props.href || (props.href !== '/' && currentUrl.startsWith(props.href))
})

const linkClasses = computed(() => {
    let base = ''

    if (props.isButton) {
        base = props.isMobile
            ? 'block py-2 text-accent font-medium'
            : 'btn-primary'
    } else {
        base = props.isMobile
            ? 'block py-2 text-gray-300 hover:text-accent transition-colors'
            : 'text-gray-300 hover:text-accent transition-colors font-medium'
    }

    const activeClass = isActive.value ? 'font-medium' : ''

    return [base, activeClass].filter(Boolean).join(' ')
})
</script>
