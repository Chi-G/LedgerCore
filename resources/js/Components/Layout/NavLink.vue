<template>
    <Link
        :href="href"
        :class="linkClasses"
    >
        <slot />
    </Link>
</template>

<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

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
    const currentUrl = page.url || '/'
    // Exact match for home, startsWith for other routes
    return currentUrl === props.href || (props.href !== '/' && currentUrl.startsWith(props.href))
})

const linkClasses = computed(() => {
    let base = ''

    if (props.isButton) {
        base = props.isMobile
            ? 'block py-2 font-medium ' + (isActive.value ? 'text-primary-blue' : 'text-text-secondary hover:text-text-primary')
            : 'btn-primary'
    } else {
        const desktopActiveIndicator = 'relative after:absolute after:-bottom-1 after:left-0 after:w-full after:h-0.5 after:bg-primary-blue after:rounded-full'
        base = props.isMobile
            ? `block py-2 transition-colors font-medium ${isActive.value ? 'text-primary-blue font-bold' : 'text-text-secondary hover:text-text-primary'}`
            : `transition-colors font-medium ${isActive.value ? 'text-primary-blue ' + desktopActiveIndicator : 'text-text-secondary hover:text-text-primary'}`
    }

    return base
})
</script>
