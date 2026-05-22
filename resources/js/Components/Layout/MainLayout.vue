<template>
    <div class="scroll-smooth">
        <Head :title="title">
            <meta name="description" :content="description">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
            <link rel="icon" type="image/x-icon" href="/favicon.ico">
            <link rel="icon" type="image/png" sizes="32x32" href="/favicon.ico">
            <link rel="shortcut icon" href="/favicon.ico">
            <link rel="preconnect" href="https://fonts.googleapis.com" />
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
            <meta name="theme-color" content="#1a1a1a">
            <link rel="canonical" :href="canonicalUrl">

            <!-- PWA meta tags -->
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
            <link rel="apple-touch-icon" href="/apple-touch-icon.png">
            <link rel="manifest" href="/manifest.json">
        </Head>

        <!-- SEO MetaTags -->
        <MetaTags
            :title="fullTitle"
            :description="description"
            :keywords="keywords"
            :image="image"
            :type="type"
        />

        <div class="bg-primary text-background antialiased">
            <Header />
            <main class="overflow-visible">
                <slot />
            </main>
            <Footer />

            <ErrorHandler />
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import { Head } from '@inertiajs/vue3'
import Header from './Header.vue'
import Footer from './Footer.vue'
import ErrorHandler from '../../Pages/ErrorHandler.vue'
import MetaTags from '../Common/MetaTags.vue'
import { registerServiceWorker } from '../../utils/serviceWorker'
import { getCanonicalUrl } from '../../utils/seo'

const props = defineProps({
    title: String,
    description: String,
    keywords: {
        type: String,
        default: 'forahia, digital innovation, web development, consultancy, business transformation'
    },
    image: {
        type: String,
        default: '/logo.png'
    },
    type: {
        type: String,
        default: 'website'
    }
});

// Add 'Forahia' suffix to title if not already included
const fullTitle = computed(() => {
    if (props.title && !props.title.includes('Forahia')) {
        return `${props.title} | Forahia Solutions`;
    }
    return props.title || 'Forahia Solutions - Digital Innovation Consultancy';
});

// Compute canonical URL
const canonicalUrl = computed(() => {
    if (typeof window !== 'undefined') {
        return window.location.href;
    }
    return 'https://forahia.com';
});

// Register service worker on mount
onMounted(() => {
    registerServiceWorker();
});
</script>
