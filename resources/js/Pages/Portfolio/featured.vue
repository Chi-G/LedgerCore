<template>
    <section class="section-padding bg-secondary portfolio-section">
        <div class="container-max">
            <!-- Portfolio Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Project Card -->
                <div
                    v-for="project in projects"
                    :key="project.id"
                    class="portfolio-item group fade-in"
                    :class="{'visible': true}"
                >
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 transition-all duration-300 hover-lift overflow-hidden"
                             :class="'hover:border-' + project.color"
                        >
                            <div class="relative overflow-hidden rounded-lg mb-6">
                                <img
                                    :src="project.image"
                                :alt="project.title"
                                class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105"
                                loading="lazy"
                                :onerror="`this.src='${project.fallbackImage}'; this.onerror=null;`"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute top-4 right-4">
                                <span
                                    class="px-3 py-1 text-primary text-sm font-medium rounded-full"
                                    :class="'bg-' + project.color + '/90'"
                                >
                                    {{ formatIndustry(project.industry) }}
                                </span>
                            </div>
                        </div>

                        <div class="space-y-4 p-4">
                            <h3
                                class="text-xl font-semibold text-background transition-colors"
                                :class="'group-hover:text-' + project.color"
                            >
                                {{ project.title }}
                            </h3>
                            <p class="text-gray-400 text-sm">{{ project.description }}</p>

                            <!-- Metrics -->
                            <div class="grid grid-cols-2 gap-4 py-4 border-t border-gray-700">
                                <div
                                    v-for="(metric, index) in project.metrics"
                                    :key="index"
                                    class="text-center"
                                >
                                    <div class="text-lg font-bold" :class="index % 2 === 0 ? 'text-success' : 'text-purple-400'">
                                        {{ metric.value }}
                                    </div>
                                    <div class="text-xs text-gray-500">{{ metric.label }}</div>
                                </div>
                            </div>

                            <!-- Tech Stack -->
                            <div class="flex flex-wrap gap-2">
                                <span
                                    v-for="(tech, index) in project.techStack"
                                    :key="index"
                                    class="px-2 py-1 text-xs rounded"
                                    :class="'bg-' + project.color + '/10 text-' + project.color"
                                >
                                    {{ tech }}
                                </span>
                            </div>

                            <button
                                class="w-full mt-4 btn-secondary text-sm transition-colors"
                                :class="'hover:bg-' + project.color + ' hover:text-primary'"
                                @click="viewCaseStudy(project.id)"
                            >
                                View Case Study
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Empty State -->
            <div v-if="projects.length === 0" class="text-center py-16">
                <div class="text-4xl text-gray-700 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-background mb-2">No projects found</h3>
                <p class="text-gray-400">Try changing your filter criteria</p>
            </div>

            <!-- Load More Button -->
            <div v-if="hasMoreProjects" class="text-center mt-12">
                <button
                    class="btn-primary px-8 py-3 hover-lift"
                    @click="loadMore"
                    :disabled="isLoading"
                >
                    <span v-if="isLoading">Loading...</span>
                    <span v-else>Load More Projects</span>
                </button>
            </div>
        </div>
    </section>
</template>

<script setup>
import { inject, computed } from 'vue';

// Props
const props = defineProps({
    projects: {
        type: Array,
        required: true
    },
    isLoading: {
        type: Boolean,
        default: false
    }
});

// Emits
const emit = defineEmits(['view-case-study', 'load-more']);

// Injected state
const openCaseStudy = inject('openCaseStudy', null);
const hasMoreProjects = inject('hasMoreProjects', computed(() => false));

// Format industry label
function formatIndustry(industry) {
    const industries = {
        'real Estate': 'Real Estate',
        'health': 'Healthcare',
        'fashion': 'Fashion',
        'technology': 'Technology',
        'automotive': 'Automotive'
    };

    return industries[industry] || industry.charAt(0).toUpperCase() + industry.slice(1);
}

// Methods
function viewCaseStudy(projectId) {
    if (openCaseStudy) {
        openCaseStudy(projectId);
    } else {
        emit('view-case-study', projectId);
    }
}

function loadMore() {
    emit('load-more');
}
</script>

<style scoped>
.fade-in {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.6s ease, transform 0.6s ease;
}

.fade-in.visible {
    opacity: 1;
    transform: translateY(0);
}

.hover-lift {
    transition: transform 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-5px);
}

.portfolio-section {
    padding-top: 0rem; /* Reduced padding at the top */
    padding-bottom: 4rem; /* Increased padding at the bottom */
}
</style>
