
<template>
    <MainLayout
        title="Client Success Portal"
        description="Access exclusive client resources, testimonials, ROI tools, and support for your digital transformation journey with Forahia."
    >

        <Hero />
        <FeaturedVideoTestimonials />
        <ROI />
        <TimeLineTools />
        <SupportResources />
        <ClientPortal />
        <ReferralProgram />
    </MainLayout>
</template>

<script setup>
import MainLayout from '../../Components/Layout/MainLayout.vue'
import Hero from './hero.vue'
import FeaturedVideoTestimonials from './featured.vue'
import ROI from './rio.vue'
import TimeLineTools from './timeLineTools.vue'
import SupportResources from './supportResources.vue'
import ClientPortal from './clientPortal.vue'
import ReferralProgram from './referralProgram.vue'
</script>

