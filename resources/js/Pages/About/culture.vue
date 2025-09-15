<template>
    <section class="section-padding bg-secondary">
        <div class="container-max">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-background mb-6">
                    Our
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
                        ">Core Values
                    </span>
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    The principles that guide every decision, every project, and every interaction at Forahia
                </p>
            </div>

            <!-- Values Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Innovation Excellence -->
                <div class="group">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-accent transition-all duration-300 hover-lift">
                        <div class="w-16 h-16 bg-accent/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-accent/20 transition-colors">
                            <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-background mb-4">Innovation Excellence</h3>
                        <p class="text-gray-400 mb-4">We push boundaries and challenge conventions to deliver solutions that set new industry standards.</p>
                        <div class="text-accent text-sm font-medium">Always Forward-Thinking</div>
                    </div>
                </div>

                <!-- Client Success -->
                <div class="group">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-green-400 transition-all duration-300 hover-lift">
                        <div class="w-16 h-16 bg-green-400/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-green-400/20 transition-colors">
                            <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-background mb-4">Client Success First</h3>
                        <p class="text-gray-400 mb-4">Your success is our success. Every project is measured by the real business impact we create.</p>
                        <div class="text-green-400 text-sm font-medium">Results-Driven Approach</div>
                    </div>
                </div>

                <!-- Technical Mastery -->
                <div class="group">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-purple-500 transition-all duration-300 hover-lift">
                        <div class="w-16 h-16 bg-purple-500/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-purple-500/20 transition-colors">
                            <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-background mb-4">Technical Mastery</h3>
                        <p class="text-gray-400 mb-4">We maintain the highest technical standards and continuously evolve our expertise.</p>
                        <div class="text-purple-400 text-sm font-medium">Continuous Learning</div>
                    </div>
                </div>

                <!-- Cultural Understanding -->
                <div class="group">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-yellow-400 transition-all duration-300 hover-lift">
                        <div class="w-16 h-16 bg-yellow-400/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-yellow-400/20 transition-colors">
                            <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-background mb-4">Cultural Understanding</h3>
                        <p class="text-gray-400 mb-4">Deep appreciation for Nigerian business culture combined with global best practices.</p>
                        <div class="text-yellow-400 text-sm font-medium">Local Expertise, Global Standards</div>
                    </div>
                </div>

                <!-- Transparency -->
                <div class="group">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-cyan-400 transition-all duration-300 hover-lift">
                        <div class="w-16 h-16 bg-cyan-400/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-cyan-400/20 transition-colors">
                            <svg class="w-8 h-8 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-background mb-4">Complete Transparency</h3>
                        <p class="text-gray-400 mb-4">Open communication, clear processes, and honest feedback throughout every project.</p>
                        <div class="text-cyan-400 text-sm font-medium">Trust Through Transparency</div>
                    </div>
                </div>

                <!-- Community Impact -->
                <div class="group">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-pink-400 transition-all duration-300 hover-lift">
                        <div class="w-16 h-16 bg-pink-400/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-pink-400/20 transition-colors">
                            <svg class="w-8 h-8 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-background mb-4">Community Impact</h3>
                        <p class="text-gray-400 mb-4">Contributing to Nigeria's tech ecosystem through mentorship, education, and open-source projects.</p>
                        <div class="text-pink-400 text-sm font-medium">Building the Future Together</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
