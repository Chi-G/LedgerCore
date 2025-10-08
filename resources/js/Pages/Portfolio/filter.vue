<template>
    <section class="section-padding bg-secondary portfolio-section">
        <div class="container-max">
            <!-- Filter Controls -->
            <div class="bg-gray-900/50 backdrop-blur-sm border border-gray-700 rounded-xl p-6 mb-6">
                <div class="flex flex-col lg:flex-row gap-6 items-center justify-between">
                    <!-- Industry Filter -->
                    <div class="flex flex-col sm:flex-row gap-4 flex-1">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"/>
                            </svg>
                            <span class="text-background font-medium">Filter by:</span>
                        </div>
                        <div class="flex flex-wrap gap-3">
                            <button
                                v-for="industry in industries"
                                :key="industry.value"
                                class="filter-btn px-5 py-2.5 bg-gray-800 text-gray-300 rounded-lg transition-all duration-200 hover:bg-gray-700 hover:text-white border border-gray-600 hover:border-gray-500 font-medium text-sm"
                                :class="{'bg-accent text-primary font-semibold border-accent shadow-lg': filterState.currentIndustry === industry.value}"
                                @click="selectIndustry(industry.value)"
                            >
                                {{ industry.label }}
                            </button>
                        </div>
                    </div>

                    <!-- Industry Filter Dropdown -->
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <select
                                class="bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-accent cursor-pointer transition-all duration-200 hover:border-gray-500"
                                v-model="filterState.currentIndustry"
                                @change="changeIndustry($event)"
                            >
                                <option value="all">All Industries</option>
                                <option value="real-estate">Real Estate</option>
                                <option value="healthcare">Healthcare</option>
                                <option value="fashion">Fashion</option>
                                <option value="technology">Technology</option>
                                <option value="automotive">Automotive</option>
                            </select>
                        </div>

                        <!-- Reset Filter -->
                        <button
                            class="flex items-center gap-2 px-4 py-2 text-gray-400 hover:text-accent hover:bg-gray-800 rounded-lg transition-all duration-200 border border-gray-600 hover:border-accent group"
                            @click="resetFilters"
                            title="Reset all filters"
                        >
                            <svg class="w-5 h-5 group-hover:rotate-180 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            <span class="text-sm font-medium hidden sm:inline">Reset</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { inject } from 'vue';

// Props
const props = defineProps({
    industries: {
        type: Array,
        default: () => [
            { value: 'all', label: 'All Industries' },
            { value: 'real-estate', label: 'Real Estate' },
            { value: 'healthcare', label: 'Healthcare' },
            { value: 'fashion', label: 'Fashion' },
            { value: 'technology', label: 'Technology' },
            { value: 'automotive', label: 'Automotive' }
        ]
    },
    complexities: {
        type: Array,
        default: () => [
            { value: 'all', label: 'All Complexities' },
            { value: 'simple', label: 'Simple' },
            { value: 'medium', label: 'Medium' },
            { value: 'complex', label: 'Complex' },
            { value: 'enterprise', label: 'Enterprise' }
        ]
    },
    filterState: {
        type: Object,
        required: true
    }
});

// Emits
const emit = defineEmits(['update-filters']);

// Injected state from parent
const updateFilters = inject('updateFilters');

// Filter methods
function selectIndustry(industry) {
    updateFilters(industry, props.filterState.currentComplexity);
}

function changeIndustry(event) {
    updateFilters(event.target.value, props.filterState.currentComplexity);
}

function changeComplexity(event) {
    updateFilters(props.filterState.currentIndustry, event.target.value);
}

function resetFilters() {
    updateFilters('all', 'all');
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
    padding-top: 2rem; /* Reduced from 4rem to bring closer to hero */
    padding-bottom: 2rem; /* Reduced bottom padding */
}
</style>
