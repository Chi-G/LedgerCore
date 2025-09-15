<template>
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
        <!-- Animated Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary via-secondary to-primary"
        >
            <div class="absolute inset-0 opacity-20">
                <div
                    class="absolute top-20 left-20 w-72 h-72 bg-accent/10 rounded-full blur-3xl animate-pulse"
                ></div>
                <div
                    class="absolute bottom-20 right-20 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl animate-pulse"
                    style="animation-delay: 1s"
                ></div>
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-green-400/10 rounded-full blur-3xl animate-pulse"
                    style="animation-delay: 2s"
                ></div>
            </div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto text-center px-4">
            <div class="animate-fade-in">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
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
                        ">Client Success
                    </span>
                    <span class="block text-white">Stories</span>
                </h1>
            </div>

            <div class="mt-8">
                <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto">
                    Real transformations. Measurable results. Businesses thriving through digital innovation.
                </p>
            </div>

            <!-- Success Metrics -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 max-w-5xl mx-auto mb-12 mt-16">
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-green-400 mb-2">98%</div>
                    <div class="text-gray-400">Client Satisfaction</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-blue-400 mb-2">285%</div>
                    <div class="text-gray-400">Average ROI</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-purple-400 mb-2">6 Months</div>
                    <div class="text-gray-400">Average Payback</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-yellow-400 mb-2">150+</div>
                    <div class="text-gray-400">Success Stories</div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#testimonials" class="bg-blue-500 hover:bg-blue-600 text-white text-lg px-8 py-4 rounded-lg transition-all duration-300 transform hover:scale-105">
                    View Success Stories
                </a>
                <a href="#roi-calculator" class="bg-transparent border-2 border-gray-600 hover:border-blue-400 text-gray-300 hover:text-blue-400 text-lg px-8 py-4 rounded-lg transition-all duration-300">
                    Calculate Your ROI
                </a>
            </div>
        </div>
    </section>
</template>

<script setup>
// Empty script setup section - required for Vue 3 Composition API
</script>
