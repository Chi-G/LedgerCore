<template>
    <section class="section-padding bg-secondary">
        <div class="container-max">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-background mb-6">
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
                            ">Client Portal
                        </span> Access
                    </h2>
                    <p class="text-xl text-gray-300 mb-8">
                        Secure access to project status, resources, and direct communication with your dedicated team.
                    </p>

                    <div class="space-y-6 mb-8">
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-accent/10 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-accent" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-background mb-2">Real-time Project Updates</h3>
                                <p class="text-gray-400">Track project milestones, deliverables, and timeline progress in real-time.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-success/10 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-success" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-background mb-2">Resource Library</h3>
                                <p class="text-gray-400">Access training materials, documentation, and project assets anytime.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-purple-500/10 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-background mb-2">Direct Team Communication</h3>
                                <p class="text-gray-400">Message your project team directly and schedule consultation calls.</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="javascript:void(0)" class="btn-primary hover-lift">
                            Access Client Portal
                        </a>
                        <a href="contact_consultation.html" class="btn-secondary hover-lift">
                            Request Portal Access
                        </a>
                    </div>
                </div>

                <div class="relative">
                    <div class="hero-card bg-gray-900/50 backdrop-blur-sm border border-gray-700">
                        <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?q=80&w=2340&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Client portal dashboard interface" class="w-full h-64 object-cover rounded-lg mb-6" loading="lazy" onerror="this.src='https://images.pexels.com/photos/265087/pexels-photo-265087.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'; this.onerror=null;" />

                        <!-- Portal Preview -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">Project Progress</span>
                                <span class="text-success">85% Complete</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2">
                                <div class="bg-gradient-to-r from-accent to-success h-2 rounded-full" style="width: 85%"></div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 text-center">
                                <div>
                                    <div class="text-lg font-semibold text-accent">12</div>
                                    <div class="text-gray-400 text-sm">Active Tasks</div>
                                </div>
                                <div>
                                    <div class="text-lg font-semibold text-success">3</div>
                                    <div class="text-gray-400 text-sm">New Messages</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
