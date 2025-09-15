<template>
    <section class="section-padding bg-secondary">
        <div class="container-max">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-background mb-6">
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
                        ">Implementation
                    </span> Timeline
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Understand our proven methodology and project phases for successful digital transformation
                </p>
            </div>

            <!-- Timeline Visualization -->
            <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-gradient-to-b from-accent via-success to-purple-500 rounded-full"></div>

                <!-- Timeline Items -->
                <div class="space-y-16">
                    <!-- Phase 1 -->
                    <div class="flex items-center">
                        <div class="w-1/2 pr-8 text-right">
                            <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-accent transition-all duration-300">
                                <div class="flex items-center justify-end space-x-4 mb-4">
                                    <div>
                                        <h3 class="text-xl font-semibold text-background">Discovery & Strategy</h3>
                                        <p class="text-accent font-medium">Week 1-2</p>
                                    </div>
                                    <div class="w-12 h-12 bg-accent/10 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="text-gray-300 space-y-2 text-sm">
                                    <li>• Business requirements analysis</li>
                                    <li>• Technical architecture planning</li>
                                    <li>• Project roadmap creation</li>
                                    <li>• Resource allocation</li>
                                </ul>
                            </div>
                        </div>
                        <div class="w-8 h-8 bg-accent rounded-full border-4 border-primary z-10 flex items-center justify-center">
                            <div class="w-3 h-3 bg-primary rounded-full"></div>
                        </div>
                        <div class="w-1/2 pl-8"></div>
                    </div>

                    <!-- Phase 2 -->
                    <div class="flex items-center">
                        <div class="w-1/2 pr-8"></div>
                        <div class="w-8 h-8 bg-success rounded-full border-4 border-primary z-10 flex items-center justify-center">
                            <div class="w-3 h-3 bg-primary rounded-full"></div>
                        </div>
                        <div class="w-1/2 pl-8">
                            <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-success transition-all duration-300">
                                <div class="flex items-center space-x-4 mb-4">
                                    <div class="w-12 h-12 bg-success/10 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-semibold text-background">Design & Prototyping</h3>
                                        <p class="text-success font-medium">Week 3-6</p>
                                    </div>
                                </div>
                                <ul class="text-gray-300 space-y-2 text-sm">
                                    <li>• UI/UX design creation</li>
                                    <li>• Interactive prototypes</li>
                                    <li>• User testing & feedback</li>
                                    <li>• Design system development</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Phase 3 -->
                    <div class="flex items-center">
                        <div class="w-1/2 pr-8 text-right">
                            <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-purple-500 transition-all duration-300">
                                <div class="flex items-center justify-end space-x-4 mb-4">
                                    <div>
                                        <h3 class="text-xl font-semibold text-background">Development & Testing</h3>
                                        <p class="text-purple-400 font-medium">Week 7-16</p>
                                    </div>
                                    <div class="w-12 h-12 bg-purple-500/10 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="text-gray-300 space-y-2 text-sm">
                                    <li>• Frontend & backend development</li>
                                    <li>• Quality assurance testing</li>
                                    <li>• Performance optimization</li>
                                    <li>• Security implementation</li>
                                </ul>
                            </div>
                        </div>
                        <div class="w-8 h-8 bg-purple-500 rounded-full border-4 border-primary z-10 flex items-center justify-center">
                            <div class="w-3 h-3 bg-primary rounded-full"></div>
                        </div>
                        <div class="w-1/2 pl-8"></div>
                    </div>

                    <!-- Phase 4 -->
                    <div class="flex items-center">
                        <div class="w-1/2 pr-8"></div>
                        <div class="w-8 h-8 bg-yellow-400 rounded-full border-4 border-primary z-10 flex items-center justify-center">
                            <div class="w-3 h-3 bg-primary rounded-full"></div>
                        </div>
                        <div class="w-1/2 pl-8">
                            <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-yellow-400 transition-all duration-300">
                                <div class="flex items-center space-x-4 mb-4">
                                    <div class="w-12 h-12 bg-yellow-400/10 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-semibold text-background">Launch & Support</h3>
                                        <p class="text-yellow-400 font-medium">Week 17-20</p>
                                    </div>
                                </div>
                                <ul class="text-gray-300 space-y-2 text-sm">
                                    <li>• Production deployment</li>
                                    <li>• Team training & handover</li>
                                    <li>• Performance monitoring</li>
                                    <li>• Ongoing support setup</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
