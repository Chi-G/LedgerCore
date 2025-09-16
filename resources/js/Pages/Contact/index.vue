<template>

    <MainLayout title="Contact" description="Get in touch with us for any inquiries or support.">

        <Hero />
        <ContactMethods />
        <MainContact />
        <FaqSection />

    </MainLayout>
</template>

<script setup>
    import MainLayout from '../../Components/Layout/MainLayout.vue';
    import Hero from './hero.vue';
    import ContactMethods from './contactMethods.vue';
    import MainContact from './mainContact.vue';
    import FaqSection from './faq.vue';
</script>
 