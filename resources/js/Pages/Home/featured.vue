<template>
    <section class="section-padding bg-secondary">
        <div class="container-max">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-block px-4 py-2 bg-accent/10 text-accent rounded-full text-sm font-medium mb-6">
                        Featured Case Study
                    </div>
                    <h2 class="text-4xl font-bold text-background mb-6">
                        Transforming a Leading <span
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
                            ">E-commerce Platform</span>
                    </h2>
                    <p class="text-xl text-gray-300 mb-8">
                        How we helped an established retailer increase online revenue by 140% through strategic digital transformation and cutting-edge technology implementation.
                    </p>

                    <!-- Metrics -->
                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div>
                            <div class="text-3xl font-bold text-accent mb-2">140%</div>
                            <div class="text-gray-400">Revenue Increase</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-green-400 mb-2">85%</div>
                            <div class="text-gray-400">Faster Load Times</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-purple-400 mb-2">2.5M+</div>
                            <div class="text-gray-400">Monthly Users</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-yellow-400 mb-2">6 Months</div>
                            <div class="text-gray-400">Implementation Time</div>
                        </div>
                    </div>

                    <a href="portfolio" class="btn-primary hover-lift">
                        View Full Case Study
                    </a>
                </div>

                <div class="relative">
                    <div class="hero-card bg-gray-900/50 backdrop-blur-sm border border-gray-700">
                        <img src="/home.avif" alt="E-commerce platform dashboard" class="w-full h-64 object-cover rounded-lg mb-6" loading="lazy" />

                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">Before Transformation</span>
                                <span class="text-error">$1.2M/month</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">After Transformation</span>
                                <span class="text-success">$5.1M/month</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2">
                                <div class="bg-gradient-to-r from-accent to-success h-2 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
