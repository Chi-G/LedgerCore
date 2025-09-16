
<template>
    <MainLayout
        title="Portfolio"
        description="See how Forahia delivers digital transformation for Nigerian businesses—explore our featured projects, case studies, and client success stories."
    >
        <Hero />

        <FilterSection
            :industries="industries"
            :complexities="complexities"
            :filter-state="filterState"
            @update-filters="updateFilters"
        />

        <FeaturedSection
            :projects="visibleProjects"
            :is-loading="isLoading"
            @view-case-study="openCaseStudy"
            @load-more="loadMoreProjects"
        />

        <CTASection />

        <!-- Case Study Modal -->
        <CaseStudyModal
            :project="currentProject"
            :show="showCaseStudy"
            @close="closeCaseStudy"
        />
    </MainLayout>
</template>

<script setup>
import { ref, reactive, computed, provide, onMounted, onUnmounted } from "vue";
import MainLayout from "../../Components/Layout/MainLayout.vue";
import Hero from "./hero.vue";
import FilterSection from "./filter.vue";
import FeaturedSection from "./featured.vue";
import CTASection from "./cta.vue";
import CaseStudyModal from "./CaseStudyModal.vue";
import norteImage from '../../../../public/nortelimited.png';
import allyhealthcareImage from '../../../../public/allyhealthcare.png';
import allycarewebsiteImage from '../../../../public/allycarewebsite.png';
import mmrstylesolutionsImage from '../../../../public/mmrstylesolutions.png';
import mbzTechImage from '../../../../public/mbzTech.jpg';
import strongmasImage from '../../../../public/strongmas.jpg';

// Filter options
const industries = [
    { value: 'all', label: 'All Industries' },
    { value: 'real Estate', label: 'Real Estate' },
    { value: 'health', label: 'Healthcare' },
    { value: 'fashion', label: 'Fashion' },
    { value: 'technology', label: 'Technology' },
    { value: 'automotive', label: 'Automotive' }
];

const complexities = [
    { value: 'all', label: 'All Complexity' },
    { value: 'medium', label: 'Medium' },
    { value: 'complex', label: 'Complex' },
    { value: 'enterprise', label: 'Enterprise' }
];

// Filter state
const filterState = reactive({
    currentIndustry: 'all',
    currentComplexity: 'all'
});

// Projects data - with case studies integrated
const portfolioProjects = reactive([
    {
        id: 'norte',
        title: 'Norte Investments',
        description: 'A corporate platform for Norte Investments Limited showcasing their services in construction, real estate, and business investments.',
        industry: 'real Estate',
        complexity: 'enterprise',
        image: norteImage,
        fallbackImage: norteImage,
        metrics: [
            { value: '$5M', label: 'Revenue Increase' },
            { value: '0.5M+', label: 'Active Users' }
        ],
        techStack: ['React', 'Node.js', 'MongoDB', 'AWS'],
        color: 'accent',
        caseStudy: {
            title: 'Norte Investments',
            content: `
                <div class="space-y-6 protected-image-container">
                    <img src="${norteImage}"
                            alt="Norte Investments" class="w-full h-64 object-cover rounded-lg">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold text-background mb-4">Challenge</h3>
                            <p class="text-gray-300 mb-6">Norte Investments needed a corporate platform that effectively showcases their diverse portfolio in construction, real estate, and business investments while attracting potential clients.</p>

                            <h3 class="text-xl font-semibold text-background mb-4">Solution</h3>
                            <p class="text-gray-300">We developed a comprehensive corporate platform highlighting Norte Investments' services with a professional design, interactive portfolio showcases, and seamless user experience.</p>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold text-background mb-4">Results</h3>
                            <ul class="space-y-2 text-gray-300">
                                <li>• $5M increase in revenue</li>
                                <li>• 0.5M+ active users</li>
                                <li>• 75% increase in client acquisition</li>
                                <li>• 99.9% platform uptime achieved</li>
                            </ul>

                            <div class="mt-6">
                                <h4 class="text-lg font-semibold text-background mb-2">Timeline</h4>
                                <p class="text-gray-300">8 months from concept to full deployment</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-800 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-background mb-4">Technical Architecture</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="text-center">
                                <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center mx-auto mb-2">
                                    <span class="text-accent font-bold">FE</span>
                                </div>
                                <p class="text-sm text-gray-300">React</p>
                            </div>
                            <div class="text-center">
                                <div class="w-12 h-12 bg-green-400/10 rounded-lg flex items-center justify-center mx-auto mb-2">
                                    <span class="text-green-400 font-bold">BE</span>
                                </div>
                                <p class="text-sm text-gray-300">Node.js</p>
                            </div>
                            <div class="text-center">
                                <div class="w-12 h-12 bg-purple-400/10 rounded-lg flex items-center justify-center mx-auto mb-2">
                                    <span class="text-purple-400 font-bold">DB</span>
                                </div>
                                <p class="text-sm text-gray-300">MongoDB</p>
                            </div>
                            <div class="text-center">
                                <div class="w-12 h-12 bg-yellow-400/10 rounded-lg flex items-center justify-center mx-auto mb-2">
                                    <span class="text-yellow-400 font-bold">CL</span>
                                </div>
                                <p class="text-sm text-gray-300">AWS</p>
                            </div>
                        </div>
                    </div>
                </div>
            `
        }
    },
    {
        id: 'healthcare',
        title: 'Ally HealthCare Platform',
        description: 'A healthcare platform providing information about Ally HealthCare’s medical services, facilities, and patient resources.',
        industry: 'health',
        complexity: 'complex',
        image: allyhealthcareImage,
        fallbackImage: allyhealthcareImage,
        metrics: [
            { value: '$1.2M', label: 'GMV Increase' },
            { value: '40%', label: 'Conversion Rate' }
        ],
        techStack: ['Vue.js', 'Python', 'PostgreSQL', 'Redis'],
        color: 'green-400',
        caseStudy: {
            title: 'Ally HealthCare Platform',
            content: `
                <div class="space-y-6 protected-image-container">
                    <img src="${allyhealthcareImage}"
                            alt="Ally HealthCare Platform" class="w-full h-64 object-cover rounded-lg">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold text-background mb-4">Challenge</h3>
                            <p class="text-gray-300 mb-6">Ally HealthCare needed a comprehensive platform to effectively communicate their medical services, facilities, and patient resources while improving patient engagement.</p>

                            <h3 class="text-xl font-semibold text-background mb-4">Solution</h3>
                            <p class="text-gray-300">We developed an intuitive healthcare platform with detailed service information, facility locators, and patient resource centers, optimized for both desktop and mobile users.</p>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold text-background mb-4">Results</h3>
                            <ul class="space-y-2 text-gray-300">
                                <li>• $1.2M increase in revenue</li>
                                <li>• 40% improvement in patient conversion</li>
                                <li>• 60% reduction in appointment cancellations</li>
                                <li>• 99.99% platform availability</li>
                            </ul>

                            <div class="mt-6">
                                <h4 class="text-lg font-semibold text-background mb-2">Timeline</h4>
                                <p class="text-gray-300">6 months development and optimization</p>
                            </div>
                        </div>
                    </div>
                </div>
            `
        }
    },
    {
        id: 'bas',
        title: 'BAS Technologies',
        description: 'A modern web app for AllyCare, offering users easy access to healthcare information and digital medical services.',
        industry: 'health',
        complexity: 'medium',
        image: allycarewebsiteImage,
        fallbackImage: allycarewebsiteImage,
        metrics: [
            { value: '180%', label: 'Mobile Sales' },
            { value: '75%', label: 'Load Speed' }
        ],
        techStack: ['PWA', 'React Native', 'Firebase'],
        color: 'orange-500',
        caseStudy: {
            title: 'BAS Technologies',
            content: `
                <div class="space-y-6 protected-image-container">
                    <img src="${allycarewebsiteImage}"
                            alt="BAS Technologies" class="w-full h-64 object-cover rounded-lg">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold text-background mb-4">Challenge</h3>
                            <p class="text-gray-300 mb-6">AllyCare needed a modern web application to provide users with easy access to healthcare information and digital medical services in an intuitive interface.</p>

                            <h3 class="text-xl font-semibold text-background mb-4">Solution</h3>
                            <p class="text-gray-300">We developed a Progressive Web App with React Native and Firebase, optimizing for mobile users while ensuring fast load times and responsive design.</p>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold text-background mb-4">Results</h3>
                            <ul class="space-y-2 text-gray-300">
                                <li>• 180% increase in mobile usage</li>
                                <li>• 75% improvement in load speed</li>
                                <li>• 45% increase in user engagement</li>
                                <li>• 68% reduction in bounce rate</li>
                            </ul>

                            <div class="mt-6">
                                <h4 class="text-lg font-semibold text-background mb-2">Timeline</h4>
                                <p class="text-gray-300">4 months from concept to deployment</p>
                            </div>
                        </div>
                    </div>
                </div>
            `
        }
    },
    {
        id: 'mmrstylesolutions',
        title: 'MMR Style Solutions',
        description: 'A bespoke fashion solutions platform that helps clients access style consultation, wardrobe planning, and tailored fashion services.',
        industry: 'fashion',
        complexity: 'medium',
        image: mmrstylesolutionsImage,
        fallbackImage: mmrstylesolutionsImage,
        metrics: [
            { value: '75%', label: 'Client Retention' },
            { value: '120%', label: 'Revenue Growth' }
        ],
        techStack: ['Vue.js', 'Laravel', 'MySQL', 'AWS'],
        color: 'yellow-400',
        caseStudy: {
            title: 'MMR Style Solutions',
            content: `
                <div class="space-y-6 protected-image-container">
                    <img src="${mmrstylesolutionsImage}"
                            alt="MMR Style Solutions" class="w-full h-64 object-cover rounded-lg">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold text-background mb-4">Challenge</h3>
                            <p class="text-gray-300 mb-6">MMR Style Solutions needed a sophisticated online platform to extend their boutique fashion services beyond physical consultations and make style expertise accessible to a wider audience.</p>

                            <h3 class="text-xl font-semibold text-background mb-4">Solution</h3>
                            <p class="text-gray-300">We developed a bespoke fashion platform with virtual style consultation tools, interactive wardrobe planning features, and a seamless booking system for tailored fashion services.</p>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold text-background mb-4">Results</h3>
                            <ul class="space-y-2 text-gray-300">
                                <li>• 75% client retention rate</li>
                                <li>• 120% year-over-year revenue growth</li>
                                <li>• 60% increase in consultation bookings</li>
                                <li>• 45% expansion in service offerings</li>
                            </ul>

                            <div class="mt-6">
                                <h4 class="text-lg font-semibold text-background mb-2">Timeline</h4>
                                <p class="text-gray-300">6 months from concept to launch</p>
                            </div>
                        </div>
                    </div>
                </div>
            `
        }
    },
    {
        id: 'mbz-tech',
        title: 'MBZ Technology',
        description: 'A comprehensive web application for a technology company showcasing their services, products, and technical expertise.',
        industry: 'technology',
        complexity: 'complex',
        image: mbzTechImage,
        fallbackImage: mbzTechImage,
        metrics: [
            { value: '250%', label: 'Traffic Increase' },
            { value: '65%', label: 'Conversion Rate' }
        ],
        techStack: ['WordPress', 'PHP', 'MySQL', 'jQuery'],
        color: 'purple-400',
        caseStudy: {
            title: 'MBZ Technology',
            content: `
                <div class="space-y-6 protected-image-container">
                    <img src="${mbzTechImage}"
                            alt="MBZ Technology Website" class="w-full h-64 object-cover rounded-lg">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold text-background mb-4">Challenge</h3>
                            <p class="text-gray-300 mb-6">MBZ Technology needed a robust, professional web presence that effectively showcases their technological services and solutions while improving their online visibility and lead generation.</p>

                            <h3 class="text-xl font-semibold text-background mb-4">Solution</h3>
                            <p class="text-gray-300">We developed a customized WordPress website with optimized page speed, responsive design, and integrated lead capture systems to highlight their technology offerings and expertise.</p>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold text-background mb-4">Results</h3>
                            <ul class="space-y-2 text-gray-300">
                                <li>• 250% increase in website traffic</li>
                                <li>• 65% improvement in lead conversion rate</li>
                                <li>• 40% growth in service inquiries</li>
                                <li>• 85% client satisfaction with website usability</li>
                            </ul>

                            <div class="mt-6">
                                <h4 class="text-lg font-semibold text-background mb-2">Timeline</h4>
                                <p class="text-gray-300">3 months from concept to launch</p>
                            </div>
                        </div>
                    </div>
                </div>
            `
        }
    },
    {
        id: 'strongmas',
        title: 'STRONG MAS NIGERIA',
        description: 'An automotive e-commerce platform for car retailing, enabling customers to browse, compare, and purchase vehicles online.',
        industry: 'automotive',
        complexity: 'complex',
        image: strongmasImage,
        fallbackImage: strongmasImage,
        metrics: [
            { value: '200%', label: 'Sales Growth' },
            { value: '15K+', label: 'Monthly Visitors' }
        ],
        techStack: ['WordPress', 'WooCommerce', 'PHP', 'MySQL'],
        color: 'cyan-400',
        caseStudy: {
            title: 'STRONG MAS NIGERIA',
            content: `
                <div class="space-y-6 protected-image-container">
                    <img src="${strongmasImage}"
                            alt="STRONG MAS NIGERIA" class="w-full h-64 object-cover rounded-lg">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold text-background mb-4">Challenge</h3>
                            <p class="text-gray-300 mb-6">STRONG MAS NIGERIA needed a robust online platform to showcase their car inventory, streamline the purchasing process, and extend their market reach beyond physical showrooms.</p>

                            <h3 class="text-xl font-semibold text-background mb-4">Solution</h3>
                            <p class="text-gray-300">We developed a custom WordPress-based automotive e-commerce platform with advanced vehicle search functionality, detailed product listings, and integrated payment options for seamless car shopping.</p>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold text-background mb-4">Results</h3>
                            <ul class="space-y-2 text-gray-300">
                                <li>• 200% increase in online sales</li>
                                <li>• 15K+ monthly website visitors</li>
                                <li>• 45% reduction in sales cycle time</li>
                                <li>• 80% improvement in customer engagement</li>
                            </ul>

                            <div class="mt-6">
                                <h4 class="text-lg font-semibold text-background mb-2">Timeline</h4>
                                <p class="text-gray-300">4 months from design to deployment</p>
                            </div>
                        </div>
                    </div>
                </div>
            `
        }
    }
]);

// Function to prevent right-click on protected images
const handleContextMenu = (e) => {
    if (e.target.closest('.protected-image-container')) {
        e.preventDefault();
        showProtectionToast('Image is protected');
        return false;
    }
};

// Function to prevent keyboard shortcuts for saving images
const handleKeyDown = (e) => {
    // Prevent Ctrl+S, Ctrl+U, F12, etc.
    if ((e.ctrlKey || e.metaKey) && (e.key === 's' || e.key === 'S' || e.key === 'u' || e.key === 'U')) {
        e.preventDefault();
        showProtectionToast('Keyboard shortcut blocked');
        return false;
    }
};

// Function to prevent drag operations on protected images
const handleDragStart = (e) => {
    if (e.target.closest('.protected-image-container')) {
        e.preventDefault();
        return false;
    }
};

// Function to show toast notification
const showProtectionToast = (message) => {
    toastMessage.value = message;
    showToast.value = true;

    // Hide after 3 seconds
    setTimeout(() => {
        showToast.value = false;
    }, 3000);
};

onMounted(() => {
    document.addEventListener('contextmenu', handleContextMenu);
    document.addEventListener('keydown', handleKeyDown);
    document.addEventListener('dragstart', handleDragStart);

    // Also prevent copy events
    document.addEventListener('copy', (e) => {
        if (e.target.closest('.protected-image-container')) {
            e.preventDefault();
            showProtectionToast('Copy operation blocked');
            return false;
        }
    });
});

onUnmounted(() => {
    document.removeEventListener('contextmenu', handleContextMenu);
    document.removeEventListener('keydown', handleKeyDown);
    document.removeEventListener('dragstart', handleDragStart);
});

// Loading state and pagination
const isLoading = ref(false);
const projectsPerPage = ref(3); // Set to 3 to enable pagination with "Load More"
const currentPage = ref(1);
const showCaseStudy = ref(false);
const currentProject = ref(null);

// Toast notification variables
const showToast = ref(false);
const toastMessage = ref('');

// Computed properties
const filteredProjects = computed(() => {
    return portfolioProjects.filter(project => {
        const industryMatch = filterState.currentIndustry === 'all' ||
                            project.industry.toLowerCase() === filterState.currentIndustry.toLowerCase();
        const complexityMatch = filterState.currentComplexity === 'all' ||
                              project.complexity === filterState.currentComplexity;
        return industryMatch && complexityMatch;
    });
});

const visibleProjects = computed(() => {
    const endIndex = currentPage.value * projectsPerPage.value;
    return filteredProjects.value.slice(0, endIndex);
});

const hasMoreProjects = computed(() => {
    return visibleProjects.value.length < filteredProjects.value.length;
});

// Methods
function updateFilters(industry, complexity) {
    filterState.currentIndustry = industry;
    filterState.currentComplexity = complexity;
    currentPage.value = 1; // Reset pagination when filters change
}

function openCaseStudy(projectId) {
    currentProject.value = portfolioProjects.find(p => p.id === projectId);
    showCaseStudy.value = true;
}

function closeCaseStudy() {
    showCaseStudy.value = false;
    setTimeout(() => {
        currentProject.value = null;
    }, 300); // Wait for transition to complete
}

function loadMoreProjects() {
    if (!hasMoreProjects.value) return;

    isLoading.value = true;

    // Simulate API call with timeout
    setTimeout(() => {
        currentPage.value += 1;
        isLoading.value = false;
    }, 800);
}

// Share state with child components via provide/inject
provide('portfolioProjects', portfolioProjects);
provide('filterState', filterState);
provide('filteredProjects', filteredProjects);
provide('updateFilters', updateFilters);
provide('openCaseStudy', openCaseStudy);
provide('hasMoreProjects', hasMoreProjects);

// Intersection Observer for fade-in effects
onMounted(() => {
    document.addEventListener('contextmenu', handleContextMenu);
    document.addEventListener('keydown', handleKeyDown);
    document.addEventListener('dragstart', handleDragStart);

    // Also prevent copy events
    document.addEventListener('copy', (e) => {
        if (e.target.closest('.protected-image-container')) {
            e.preventDefault();
            showProtectionToast('Copy operation blocked');
            return false;
        }
    });

    // Using Vue's built-in nextTick to ensure the DOM is fully rendered
    setTimeout(() => {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all fade-in elements
        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });
    }, 300);
});
</script>

<style>
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

.filter-btn {
    padding: 0.5rem 1rem;
    background-color: rgba(31, 41, 55, 1);
    color: rgba(209, 213, 219, 1);
    border-radius: 0.5rem;
    transition: all 0.2s ease;
}

.filter-btn:hover {
    background-color: rgba(55, 65, 81, 1);
    color: rgba(255, 255, 255, 1);
}

.filter-btn.active {
    background-color: var(--color-accent);
    color: var(--color-primary);
    font-weight: 500;
}

/* Explicit hover border styles for portfolio cards */
.hover\:border-orange-500:hover {
    border-color: #f97316 !important;
}

/* Protected image container - handles all the protections */
.protected-image-container {
  position: relative;
  pointer-events: auto; /* Allow interactions with the container */
  overflow: hidden;
}

/* Only images inside the container should be non-interactive */
.protected-image-container img {
  pointer-events: none;
  -webkit-user-drag: none;
  -khtml-user-drag: none;
  -moz-user-drag: none;
  -o-user-drag: none;
  user-select: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
}

/* Apply CSS protection pattern over the image */ 
.protected-image-container::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: linear-gradient(
    45deg,
    rgba(255, 255, 255, 0.02) 25%,
    transparent 25%,
    transparent 50%,
    rgba(255, 255, 255, 0.02) 50%,
    rgba(255, 255, 255, 0.02) 75%,
    transparent 75%
  );
  background-size: 4px 4px;
  pointer-events: none;
  z-index: 5;
}
</style>
