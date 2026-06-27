<template>
    <MainLayout
        title="Portfolio - Forahia Solutions"
        description="Explore the digital infrastructure and products engineered by Forahia Solutions."
    >
        <!-- Portfolio Hero -->
        <section class="relative pt-32 pb-16 border-b border-border overflow-hidden">
            <div class="absolute inset-0 bg-bg-surface opacity-50"></div>
            <!-- Subtle dot grid -->
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle at center, #94A3B8 1px, transparent 1px); background-size: 24px 24px;"></div>
            
            <div class="container mx-auto px-6 relative z-10 text-center" v-motion-fade-visible>
                <div class="inline-flex items-center space-x-2 bg-bg-elevated border border-border rounded-full px-4 py-1.5 text-sm text-text-secondary mb-6">
                    <span class="text-accent-teal font-mono">['./portfolio']</span>
                </div>
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Our Work</h1>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                    We engineer robust, scalable systems that power modern businesses. 
                    Explore our recent production deployments below.
                </p>
            </div>
        </section>

        <!-- Filters (Optional, simplified for the new design) -->
        <section class="py-8 border-b border-border bg-bg-surface sticky top-0 z-40">
            <div class="container mx-auto px-6 flex flex-wrap gap-4 justify-center" v-motion-fade-visible>
                <button 
                    v-for="cat in categories" 
                    :key="cat.id"
                    @click="activeCategory = cat.id"
                    :class="[
                        'px-4 py-2 rounded-full font-mono text-sm transition-colors',
                        activeCategory === cat.id 
                            ? 'bg-primary-blue text-white border-primary-blue shadow-[0_0_10px_var(--color-primary-glow)]' 
                            : 'bg-bg-elevated border border-border text-text-secondary hover:text-text-primary'
                    ]"
                >
                    {{ cat.label }}
                </button>
            </div>
        </section>

        <!-- Portfolio Grid -->
        <section class="py-24 relative">
            <div class="container mx-auto px-6">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div 
                        v-for="project in filteredProjects" 
                        :key="project.id"
                        class="group flex flex-col bg-bg-elevated border border-border rounded-xl overflow-hidden hover:border-primary-blue/50 transition-all duration-300"
                        v-motion-fade-visible
                    >
                        <!-- Image/Visual Area -->
                        <div class="h-56 bg-bg-base relative overflow-hidden border-b border-border protected-image-container flex items-center justify-center">
                            <img :src="project.image" :alt="project.title" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity" />
                            <div class="absolute inset-0 bg-gradient-to-t from-bg-elevated to-transparent"></div>
                        </div>
                        
                        <!-- Content Area -->
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex justify-between items-start mb-3">
                                <div class="text-xs font-mono tracking-widest text-text-secondary uppercase">
                                    {{ project.industry }}
                                </div>
                                <div class="text-xs font-mono text-accent-teal">
                                    {{ project.complexity }}
                                </div>
                            </div>
                            
                            <h3 class="text-xl font-semibold text-text-primary mb-2 group-hover:text-primary-blue transition-colors">
                                {{ project.title }}
                            </h3>
                            
                            <p class="text-sm text-text-secondary mb-6 flex-grow">
                                {{ project.description }}
                            </p>
                            
                            <div class="flex flex-wrap gap-2 mb-6">
                                <span v-for="tech in project.techStack" :key="tech" class="font-mono text-[10px] px-2 py-1 rounded-full bg-bg-surface border border-border text-text-muted">
                                    {{ tech }}
                                </span>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4 mb-6 pt-4 border-t border-border">
                                <div v-for="metric in project.metrics" :key="metric.label">
                                    <div class="text-lg font-bold text-text-primary">{{ metric.value }}</div>
                                    <div class="text-[10px] uppercase tracking-wider text-text-secondary">{{ metric.label }}</div>
                                </div>
                            </div>
                            
                            <div class="mt-auto border-t border-border pt-4">
                                <button @click="openCaseStudy(project)" class="text-primary-blue text-sm font-medium hover:text-blue-400 transition-colors inline-flex items-center">
                                    View Full Case Study <span class="ml-2">→</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Banner -->
        <section class="py-32 relative overflow-hidden border-t border-border bg-bg-surface">
            <div class="absolute inset-0 bg-primary-blue/5"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-primary-blue rounded-full blur-[120px] opacity-20 pointer-events-none"></div>
            
            <div class="container mx-auto px-6 relative z-10 text-center" v-motion-fade-visible>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Ready to Build?</h2>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto mb-10">Bring your complex technical requirements to us. We'll engineer the right architecture for your business.</p>
                <Link href="/contact" class="inline-block bg-primary-blue hover:bg-blue-700 text-white px-10 py-4 rounded-md font-medium text-lg transition-colors shadow-[0_0_20px_var(--color-primary-glow)]">
                    Start a Project →
                </Link>
            </div>
        </section>

        <!-- Case Study Modal Wrapper (using existing if needed, or simple implementation) -->
        <CaseStudyModal
            :project="currentProject"
            :show="showCaseStudy"
            @close="closeCaseStudy"
        />
    </MainLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import MainLayout from '../../Components/Layout/MainLayout.vue';
import CaseStudyModal from './CaseStudyModal.vue';

import norteImage from '../../../../public/nortelimited.png';
import allyhealthcareImage from '../../../../public/allyhealthcare.png';
import allycarewebsiteImage from '../../../../public/allycarewebsite.png';
import mmrstylesolutionsImage from '../../../../public/mmrstylesolutions.png';
import mbzTechImage from '../../../../public/mbzTech.jpg';
import strongmasImage from '../../../../public/strongmas.jpg';

const categories = [
    { id: 'all', label: 'All Projects' },
    { id: 'healthcare', label: 'Healthcare' },
    { id: 'real-estate', label: 'Real Estate' },
    { id: 'fashion', label: 'Fashion' },
    { id: 'technology', label: 'Technology' },
    { id: 'automotive', label: 'Automotive' }
];

const activeCategory = ref('all');

const portfolioProjects = [
    {
        id: 'auramed',
        title: 'AuraMed',
        description: 'A next-generation AI-powered Clinic Management System and Electronic Medical Records (EMR) software.',
        industry: 'healthcare',
        complexity: 'enterprise',
        image: '/images/projects/auramed.png',
        metrics: [
            { value: '30%', label: 'Efficiency Gain' },
            { value: '24/7', label: 'Availability' }
        ],
        techStack: ['Python', 'FastAPI', 'PostgreSQL', 'AI']
    },
    {
        id: 'norte',
        title: 'Norte Investments',
        description: 'A corporate platform for Norte Investments Limited showcasing their services in construction, real estate, and business investments.',
        industry: 'real-estate',
        complexity: 'enterprise',
        image: norteImage,
        metrics: [
            { value: '92%', label: 'Process Efficiency' },
            { value: '0.5M+', label: 'Active Users' }
        ],
        techStack: ['React', 'Node.js', 'MongoDB', 'AWS']
    },
    {
        id: 'healthcare',
        title: 'Ally HealthCare Platform',
        description: 'A healthcare platform providing information about medical services, facilities, and patient resources.',
        industry: 'healthcare',
        complexity: 'complex',
        image: allyhealthcareImage,
        metrics: [
            { value: '10k+', label: 'Patients Served' },
            { value: '40%', label: 'Conversion' }
        ],
        techStack: ['Vue.js', 'Python', 'PostgreSQL', 'Redis']
    },
    {
        id: 'bas',
        title: 'BAS Technologies',
        description: 'A modern PWA offering users easy access to healthcare information and digital medical services.',
        industry: 'healthcare',
        complexity: 'simple',
        image: allycarewebsiteImage,
        metrics: [
            { value: '180%', label: 'Mobile Sales' },
            { value: '75%', label: 'Load Speed' }
        ],
        techStack: ['PWA', 'React Native', 'Firebase']
    },
    {
        id: 'mmr',
        title: 'MMR Style Solutions',
        description: 'A bespoke platform that helps clients access style consultation and tailored fashion services.',
        industry: 'fashion',
        complexity: 'medium',
        image: mmrstylesolutionsImage,
        metrics: [
            { value: '75%', label: 'Retention' },
            { value: '120%', label: 'Revenue Growth' }
        ],
        techStack: ['Vue.js', 'Laravel', 'MySQL', 'AWS']
    },
    {
        id: 'mbz',
        title: 'MBZ Technology',
        description: 'A comprehensive web application showcasing tech services, products, and technical expertise.',
        industry: 'technology',
        complexity: 'complex',
        image: mbzTechImage,
        metrics: [
            { value: '250%', label: 'Traffic Increase' },
            { value: '65%', label: 'Conversion' }
        ],
        techStack: ['WordPress', 'PHP', 'MySQL', 'jQuery']
    },
    {
        id: 'strongmas',
        title: 'STRONG MAS',
        description: 'An automotive e-commerce platform for car retailing, enabling online vehicle purchases.',
        industry: 'automotive',
        complexity: 'complex',
        image: strongmasImage,
        metrics: [
            { value: '200%', label: 'Sales Growth' },
            { value: '15K+', label: 'Monthly Visitors' }
        ],
        techStack: ['WordPress', 'WooCommerce', 'PHP', 'MySQL']
    },
    {
        id: 'forafix',
        title: 'Forafix',
        description: 'A comprehensive Home Services Marketplace connecting homeowners with trusted local professionals.',
        industry: 'technology',
        complexity: 'complex',
        image: '/images/projects/forafix.png',
        metrics: [
            { value: '5K+', label: 'Providers' },
            { value: '98%', label: 'Satisfaction' }
        ],
        techStack: ['Vue.js', 'Laravel', 'MySQL', 'Redis']
    },
    {
        id: 'flowslot',
        title: 'Flowslot',
        description: 'An intelligent scheduling and booking system designed to streamline appointments and manage time efficiently.',
        industry: 'technology',
        complexity: 'medium',
        image: '/images/projects/flowslot.png',
        metrics: [
            { value: '40%', label: 'Time Saved' },
            { value: '1000+', label: 'Bookings/Day' }
        ],
        techStack: ['Vue.js', 'Node.js', 'MongoDB']
    }
];

const filteredProjects = computed(() => {
    if (activeCategory.value === 'all') return portfolioProjects;
    return portfolioProjects.filter(p => p.industry === activeCategory.value);
});

// Modal Logic
const showCaseStudy = ref(false);
const currentProject = ref(null);

function openCaseStudy(project) {
    // Because we simplified the object, the old CaseStudyModal might expect `caseStudy` HTML string.
    // Let's pass the project down and adapt the modal if needed, or pass dummy data to prevent crashes.
    currentProject.value = {
        ...project,
        caseStudy: {
            title: project.title,
            content: `
                <div class="space-y-6">
                    <img src="${project.image}" alt="${project.title}" class="w-full h-64 object-cover rounded-lg border border-border">
                    <h3 class="text-xl font-semibold text-text-primary mb-4">Project Overview</h3>
                    <p class="text-text-secondary">${project.description}</p>
                    <div class="bg-bg-base border border-border rounded-lg p-6 mt-6">
                        <h4 class="text-lg font-mono text-primary-blue mb-4">Tech Stack Highlights</h4>
                        <div class="flex flex-wrap gap-2">
                            ${project.techStack.map(t => `<span class="bg-bg-surface px-3 py-1 rounded border border-border text-text-muted text-sm font-mono">${t}</span>`).join('')}
                        </div>
                    </div>
                </div>
            `
        }
    };
    showCaseStudy.value = true;
}

function closeCaseStudy() {
    showCaseStudy.value = false;
    setTimeout(() => {
        currentProject.value = null;
    }, 300);
}
</script>

<style scoped>
.protected-image-container img {
  pointer-events: none;
  -webkit-user-drag: none;
  user-select: none;
}
</style>
