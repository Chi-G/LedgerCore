
<template>
    <MainLayout
        title="About"
        description="Learn about Forahia’s mission, leadership, culture, and the team driving digital transformation for Nigerian businesses."
    >
        <Hero />
        <CompanyStory />
        <LeadershipTeam />
        <CoreTeam />
        <InnovationLab />
        <CultureValues />
        <ContactOffice />
        <CareerOpportunities />
    </MainLayout>
</template>


<script setup>
    import MainLayout from '../../Components/Layout/MainLayout.vue';
    import Hero from './hero.vue';
    import CompanyStory from './companyStory.vue';
    import LeadershipTeam from './leadershipTeam.vue';
    import CoreTeam from './coreTeam.vue';
    import InnovationLab from './innovationLab.vue';
    import CultureValues from './culture.vue';
    import ContactOffice from './contactOffice.vue';
    import CareerOpportunities from './careerOpp.vue';

</script>
