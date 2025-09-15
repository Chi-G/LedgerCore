<template>
    <div class="scroll-smooth">
        <Head :title="title">
            <meta name="description" :content="description">
            <link rel="icon" type="image/x-icon" href="/favicon.ico">
            <link rel="icon" type="image/png" sizes="32x32" href="/favicon.ico">
            <link rel="shortcut icon" href="/favicon.ico">
            <link rel="preconnect" href="https://fonts.googleapis.com" />
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        </Head>

        <div class="bg-primary text-background antialiased">
            <Header />
            <main>
                <slot />
            </main>
            <Footer />

            <ErrorHandler />
        </div>
    </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3'
import Header from './Header.vue'
import Footer from './Footer.vue'
import ErrorHandler from '../../Pages/ErrorHandler.vue'

defineProps({
    title: String,
    description: String
})
</script>
