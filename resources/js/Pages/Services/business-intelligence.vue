<template>
    <section id="business-intel" class="service-section section-padding bg-primary">
        <div class="container-max">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
                <div class="order-2 lg:order-1">
                    <div class="hero-card bg-gray-900/50 backdrop-blur-sm border border-gray-700">
                        <!-- Dashboard Preview -->
                        <div class="mb-6">
                            <h3 class="text-xl font-semibold text-background mb-4">Live Dashboard Preview</h3>
                            <div class="bg-gray-800 rounded-lg p-4">
                                <div class="grid grid-cols-2 gap-4 mb-4">
                                    <div class="bg-gray-700 rounded p-3">
                                        <div class="text-xs text-gray-400 mb-1">Revenue</div>
                                        <div class="text-lg font-bold text-success">$1.45M</div>
                                        <div class="text-xs text-success">+12.5%</div>
                                    </div>
                                    <div class="bg-gray-700 rounded p-3">
                                        <div class="text-xs text-gray-400 mb-1">Customers</div>
                                        <div class="text-lg font-bold text-accent">12,847</div>
                                        <div class="text-xs text-accent">+8.3%</div>
                                    </div>
                                </div>

                                <!-- Chart Visualization -->
                                <div class="bg-gray-700 rounded p-3">
                                    <div class="text-xs text-gray-400 mb-2">Sales Trend</div>
                                    <svg class="w-full h-20" viewBox="0 0 300 80">
                                        <polyline fill="none" stroke="#00d4ff" stroke-width="2" points="0,60 50,45 100,30 150,35 200,20 250,25 300,15"/>
                                        <circle cx="300" cy="15" r="3" fill="#00d4ff"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- BI Metrics -->
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400">Data Processing Speed</span>
                                <span class="text-yellow-400 font-semibold">&lt; 3 seconds</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400">Report Accuracy</span>
                                <span class="text-success font-semibold">99.7%</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400">Real-time Updates</span>
                                <span class="text-accent font-semibold">Live</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="order-1 lg:order-2">
                    <div class="inline-block px-4 py-2 bg-yellow-400/10 text-yellow-400 rounded-full text-sm font-medium mb-6">
                        Business Intelligence
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-background mb-6">
                        Data-Driven
                        <span
                            style="
                                background: linear-gradient(
                                    to right,
                                    #00d4ff,
                                    #10b981
                                );
                                -webkit-background-clip: text;
                                background-clip: text;
                                color: transparent;
                                -webkit-text-fill-color: transparent;
                            ">Business Insights
                        </span>
                    </h2>
                    <p class="text-xl text-gray-300 mb-8">
                        Transform your business data into actionable insights with custom dashboards and analytics solutions tailored for global market dynamics and regional adaptability.
                    </p>

                    <!-- BI Technologies -->
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
                        <div class="tech-card">
                            <div class="w-12 h-12 flex items-center justify-center bg-[#F2C811] p-2 rounded-lg mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-full w-auto">
                                    <path fill="#000000" d="M10.63,11.82H2.06V3.4h8.57Zm-7.5-1.07h6.44V4.47H3.13Zm16.8-7.35H11.36V11.98h8.57Zm-7.5,1.07h6.44v6.28H12.43Zm7.51,7.35H11.36v8.57h8.57Zm-7.5,1.07h6.44v6.44H12.44ZM10.63,12v8.57H2.06V12Z"/>
                                </svg>
                            </div>
                            <h4 class="font-semibold text-background">Power BI</h4>
                            <p class="text-sm text-gray-400">Microsoft analytics</p>
                        </div>
                        <div class="tech-card">
                            <div class="w-12 h-12 flex items-center justify-center bg-[#E97627] p-2 rounded-lg mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-full w-auto" fill="#FFFFFF">
                                    <path d="M11.654 17.022h.624v-3.34h3.341v-.625h-3.341V9.713h-.624v3.341H8.313v.625h3.341v3.343zm4.932-8.850v.624h3.341v3.341h.637v-3.341h3.328v-.624h-3.328V4.83h-.637v3.342h-3.341zm-6.635 5.252v-.624H6.61V9.458h-.625v3.342H2.644v.624H5.985v3.341h.625v-3.341h3.341zm1.95 6.322h-.637v-3.342H7.923v-.624h3.341v-3.341h.637v3.341h3.341v.624h-3.341v3.342z"/>
                                </svg>
                            </div>
                            <h4 class="font-semibold text-background">Tableau</h4>
                            <p class="text-sm text-gray-400">Data visualization</p>
                        </div>
                        <div class="tech-card">
                            <div class="w-12 h-12 flex items-center justify-center bg-gradient-to-r from-[#366B98] to-[#FFD142] p-2 rounded-lg mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-full w-auto">
                                    <path fill="#FFF" d="M11.95,2.33c-5.24,0-4.92,2.27-4.92,2.27l0,2.36H12.1v.74H4.83s-3.16-.35-3.16,4.63,2.76,4.79,2.76,4.79H6.6V14.5s-.13-2.76,2.72-2.76h4.68s2.64.04,2.64-2.55V5.29s.4-2.95-4.69-2.95m-2.67,1.7a.88.88,0,1,1-.88.88.88.88,0,0,1,.88-.88"/>
                                    <path fill="#FFF" d="M12.17,21.67c5.24,0,4.92-2.27,4.92-2.27l0-2.36H12V16.3h7.26s3.16.35,3.16-4.63-2.76-4.79-2.76-4.79H17.5V9.5s.13,2.76-2.72,2.76H10.1s-2.64,0-2.64,2.55v3.9s-.4,2.95,4.7,2.95m2.67-1.7a.88.88,0,1,1,.88-.88.88.88,0,0,1-.88.88"/>
                                </svg>
                            </div>
                            <h4 class="font-semibold text-background">Python</h4>
                            <p class="text-sm text-gray-400">Data science</p>
                        </div>
                        <div class="tech-card">
                            <div class="w-12 h-12 flex items-center justify-center bg-[#0072C6] p-2 rounded-lg mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="h-full w-auto" fill="#FFFFFF">
                                    <path d="M15.958 0C7.174 0 0 2.943 0 6.576v18.848C0 29.057 7.174 32 15.958 32c8.784 0 15.958-2.943 15.958-6.576V6.576C31.916 2.943 24.742 0 15.958 0zm0 2.647c7.578 0 13.312 2.476 13.312 4.106 0 1.63-5.734 4.106-13.312 4.106-7.578 0-13.312-2.476-13.312-4.106 0-1.63 5.734-4.106 13.312-4.106zm13.577 21.394c-.345 1.271-5.967 3.694-13.577 3.694-7.609 0-13.232-2.423-13.577-3.694v-4.878c2.524 1.39 7.86 2.355 13.577 2.355 5.717 0 11.053-.965 13.577-2.355v4.878zm0-7.662c-.345 1.271-5.967 3.694-13.577 3.694-7.609 0-13.232-2.423-13.577-3.694v-4.878c2.524 1.39 7.86 2.355 13.577 2.355 5.717 0 11.053-.965 13.577-2.355v4.878z"/>
                                </svg>
                            </div>
                            <h4 class="font-semibold text-background">SQL</h4>
                            <p class="text-sm text-gray-400">Database queries</p>
                        </div>
                        <div class="tech-card">
                            <div class="w-12 h-12 flex items-center justify-center bg-[#4E2A8E] p-2 rounded-lg mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-full w-auto" fill="none" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 16v1.5c0 1.1-.9 2-2 2h-4c-1.1 0-2-.9-2-2v-10c0-1.1.9-2 2-2h4c1.1 0 2 .9 2 2V9"/>
                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/>
                                    <path d="M3 10l2 -2v8"/>
                                    <path d="M21 8v8l-2 -2"/>
                                    <path d="M12 7v1"/>
                                    <path d="M12 16v1"/>
                                    <path d="M15 16a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/>
                                    <path d="M19 12a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/>
                                    <path d="M15 8a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/>
                                    <path d="M7 8a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/>
                                    <path d="M3 12a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/>
                                    <path d="M7 16a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/>
                                </svg>
                            </div>
                            <h4 class="font-semibold text-background">ML Models</h4>
                            <p class="text-sm text-gray-400">Predictive analytics</p>
                        </div>
                        <div class="tech-card">
                            <div class="w-12 h-12 flex items-center justify-center bg-gradient-to-br from-[#4285F4] to-[#34A853] p-2 rounded-lg mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-full w-auto" fill="#FFFFFF">
                                    <path d="M9.5,1.75C7.68,1.75,6.28,3.15,6.28,4.97C6.28,5,6.28,5.03,6.28,5.06C4.67,5.5,3.5,6.96,3.5,8.69C3.5,10.78,5.21,12.5,7.3,12.5H16.7C18.79,12.5,20.5,10.78,20.5,8.69C20.5,6.96,19.33,5.5,17.72,5.06C17.72,5.03,17.72,5,17.72,4.97C17.72,3.15,16.32,1.75,14.5,1.75C13.77,1.75,13.09,2.01,12.53,2.45C11.57,1.67,10.33,1.25,9.5,1.75"/>
                                    <path d="M6,16.5V21.75"/>
                                    <path d="M10,14.5V21.75"/>
                                    <path d="M14,16.5V21.75"/>
                                    <path d="M18,14.5V21.75"/>
                                    <path d="M3,21.75H21"/>
                                </svg>
                            </div>
                            <h4 class="font-semibold text-background">Cloud BI</h4>
                            <p class="text-sm text-gray-400">Scalable analytics</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BI Pricing -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700">
                    <h4 class="text-lg font-semibold text-background mb-4">Analytics Setup</h4>
                    <div class="text-3xl font-bold text-yellow-400 mb-2">$2K - $5K</div>
                    <p class="text-gray-400 mb-4">Basic reporting solution</p>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li>• Standard dashboards</li>
                        <li>• Basic data integration</li>
                        <li>• Monthly reports</li>
                        <li>• 3 months support</li>
                    </ul>
                </div>
                <div class="card bg-gray-900/50 backdrop-blur-sm border border-yellow-400">
                    <div class="inline-block px-3 py-1 bg-yellow-400/10 text-yellow-400 rounded-full text-xs font-medium mb-4">
                        Popular Choice
                    </div>
                    <h4 class="text-lg font-semibold text-background mb-4">Advanced Analytics</h4>
                    <div class="text-3xl font-bold text-yellow-400 mb-2">$5K - $10K</div>
                    <p class="text-gray-400 mb-4">Comprehensive BI solution</p>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li>• Custom dashboards</li>
                        <li>• Real-time analytics</li>
                        <li>• Predictive modeling</li>
                        <li>• 6 months support</li>
                    </ul>
                </div>
                <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700">
                    <h4 class="text-lg font-semibold text-background mb-4">Enterprise BI</h4>
                    <div class="text-3xl font-bold text-yellow-400 mb-2">$15K+</div>
                    <p class="text-gray-400 mb-4">Full-scale data platform</p>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li>• Data warehouse setup</li>
                        <li>• AI-powered insights</li>
                        <li>• Multi-source integration</li>
                        <li>• 12 months support</li>
                    </ul>
                </div>
            </div>

            <!-- BI Testimonial -->
            <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700">
                <div class="flex items-start space-x-4">
                    <div class="protected-image-container relative w-16 h-16 rounded-full overflow-hidden">
                        <!-- Main image with proper styling -->
                        <div class="w-full h-full bg-cover bg-center"
                             style="background-image: url('david_martin.jpeg');">
                        </div>

                        <!-- Permanent subtle watermark -->
                        <div class="absolute inset-0 flex items-center justify-center z-10 opacity-20">
                            <span class="text-[10px] font-bold text-white rotate-45 transform select-none">FORAHIA</span>
                        </div>

                        <!-- Interactive hover effect with enhanced watermark -->
                        <div class="absolute inset-0 bg-gradient-to-br from-yellow-400/40 to-primary/60
                                    opacity-0 hover:opacity-80 transition-opacity duration-300
                                    flex items-center justify-center">
                            <div class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-auto mb-1 text-white"
                                     viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1.323l3.954 1.582a1 1 0 01.646.938V17.5a1 1 0 01-1 1H5.4a1 1 0 01-1-1V6.843a1 1 0 01.646-.938L9 4.323V3a1 1 0 011-1zm0 8a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-[8px] font-bold text-white select-none">© FORAHIA</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-300 mb-4 italic">
                            "Forahia's BI solution helped us identify cost savings and optimize our supply chain across 3 continents. Their global market insights and analytics platform delivered immediate ROI."
                        </p>
                        <div>
                            <div class="font-semibold text-background">David Martinez</div>
                            <div class="text-sm text-gray-400">Operations Director, Global AgriTech Solutions</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { onMounted, onUnmounted } from 'vue';

// Function to prevent right-click on protected images
const handleContextMenu = (e) => {
    if (e.target.closest('.protected-image-container')) {
        e.preventDefault();
        return false;
    }
};

// Function to prevent keyboard shortcuts for saving images
const handleKeyDown = (e) => {
    // Prevent Ctrl+S, Ctrl+U, F12, etc.
    if ((e.ctrlKey || e.metaKey) && (e.key === 's' || e.key === 'S' || e.key === 'u' || e.key === 'U')) {
        e.preventDefault();
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

onMounted(() => {
    document.addEventListener('contextmenu', handleContextMenu);
    document.addEventListener('keydown', handleKeyDown);
    document.addEventListener('dragstart', handleDragStart);

    // Also prevent copy events
    document.addEventListener('copy', (e) => {
        if (e.target.closest('.protected-image-container')) {
            e.preventDefault();
            return false;
        }
    });
});

onUnmounted(() => {
    document.removeEventListener('contextmenu', handleContextMenu);
    document.removeEventListener('keydown', handleKeyDown);
    document.removeEventListener('dragstart', handleDragStart);
});
</script>

<style>
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
