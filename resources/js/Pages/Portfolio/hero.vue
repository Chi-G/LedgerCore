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
            <!-- Main Headline -->
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
                        ">Digital Transformations
                    </span>
                    <span class="block text-white">That Drive Results</span>
                </h1>
            </div>

            <!-- Subtitle -->
            <div class="mt-8">
                <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto">
                    Explore our portfolio of successful digital projects across industries
                </p>
            </div>

            <!-- Live Metrics Counter -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-3xl mx-auto">
                <!-- <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-accent mb-2">$2.5B+</div>
                    <div class="text-gray-400">Revenue Generated</div>
                </div> -->
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-green-400 mb-2">300+</div>
                    <div class="text-gray-400">Projects Delivered</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-purple-400 mb-2">98%</div>
                    <div class="text-gray-400">Client Satisfaction</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-yellow-400 mb-2">5</div>
                    <div class="text-gray-400">Industry Awards</div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>
