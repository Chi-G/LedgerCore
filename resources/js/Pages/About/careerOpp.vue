<template>
     <section class="section-padding bg-secondary">
        <div class="container-max">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-background mb-6">
                    Join Our
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
                        ">Innovation Journey
                    </span>
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    We're always looking for passionate individuals who want to shape the future of Nigerian technology
                </p>
            </div>

            <!-- Open Positions -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Senior Developer -->
                <div class="group">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-accent transition-all duration-300 hover-lift">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-semibold text-background">Senior Full-Stack Developer</h3>
                            <span class="px-3 py-1 bg-accent/10 text-accent text-sm rounded-full">Remote</span>
                        </div>
                        <p class="text-gray-400 mb-4">
                            Lead complex web application development using React, Node.js, and cloud technologies.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <span class="px-2 py-1 bg-accent/10 text-accent text-xs rounded">React</span>
                            <span class="px-2 py-1 bg-accent/10 text-accent text-xs rounded">Node.js</span>
                            <span class="px-2 py-1 bg-accent/10 text-accent text-xs rounded">AWS</span>
                        </div>
                        <a href="contact" class="text-accent hover:text-background transition-colors font-medium">
                            Apply Now →
                        </a>
                    </div>
                </div>

                <!-- UI/UX Designer -->
                <div class="group">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-green-400 transition-all duration-300 hover-lift">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-semibold text-background">UI/UX Designer</h3>
                            <span class="px-3 py-1 bg-green-400/10 text-green-400 text-sm rounded-full">Lagos</span>
                        </div>
                        <p class="text-gray-400 mb-4">
                            Create exceptional user experiences for Nigerian businesses and international clients.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <span class="px-2 py-1 bg-green-400/10 text-green-400 text-xs rounded">Figma</span>
                            <span class="px-2 py-1 bg-green-400/10 text-green-400 text-xs rounded">Adobe XD</span>
                            <span class="px-2 py-1 bg-green-400/10 text-green-400 text-xs rounded">Research</span>
                        </div>
                        <a href="contact" class="text-green-400 hover:text-background transition-colors font-medium">
                            Apply Now →
                        </a>
                    </div>
                </div>

                <!-- DevOps Engineer -->
                <div class="group">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-purple-500 transition-all duration-300 hover-lift">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-semibold text-background">DevOps Engineer</h3>
                            <span class="px-3 py-1 bg-purple-500/10 text-purple-400 text-sm rounded-full">Hybrid</span>
                        </div>
                        <p class="text-gray-400 mb-4">
                            Build and maintain scalable infrastructure for our growing portfolio of applications.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <span class="px-2 py-1 bg-purple-500/10 text-purple-400 text-xs rounded">Docker</span>
                            <span class="px-2 py-1 bg-purple-500/10 text-purple-400 text-xs rounded">Kubernetes</span>
                            <span class="px-2 py-1 bg-purple-500/10 text-purple-400 text-xs rounded">CI/CD</span>
                        </div>
                        <a href="contact" class="text-purple-400 hover:text-background transition-colors font-medium">
                            Apply Now →
                        </a>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <p class="text-gray-400 mb-6">Don't see the perfect role? We're always interested in exceptional talent.</p>
                <a href="contact" class="btn-primary hover-lift">
                    Send Us Your Resume
                </a>
            </div>
        </div>
    </section>
</template>
