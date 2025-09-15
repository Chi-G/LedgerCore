<template>
    <MainLayout title="Services" description="Explore our digital innovation services for Nigerian businesses.">
        <Hero />
        <WebDevelopment />
        <MobileApps />
        <UIUX />
        <BusinessIntelligence />
        <ROICalculator />
        <CTA />
    </MainLayout>
</template>

<script setup>
import MainLayout from '../../Components/Layout/MainLayout.vue'
import Hero from './hero.vue'
import WebDevelopment from './webDev.vue'
import MobileApps from './mobile.vue'
import UIUX from './ui_ux.vue'
import BusinessIntelligence from './business-intelligence.vue'
import ROICalculator from './roi.vue'
import CTA from './cta.vue'
</script>
