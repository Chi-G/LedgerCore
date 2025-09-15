<template>
    <section class="section-padding bg-secondary relative">
        <div class="container-max">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-background mb-6">
                    Our <span style="
                            background: linear-gradient(
                                to right,
                                #00d4ff,
                                #10b981
                            );
                            -webkit-background-clip: text;
                            background-clip: text;
                            color: transparent;
                            -webkit-text-fill-color: transparent;
                        ">Innovation Ecosystem</span>
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Comprehensive digital solutions designed to transform your business operations and accelerate growth
                </p>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Web Development -->
                <div class="group relative">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-accent transition-all duration-300 hover-lift">
                        <div class="w-16 h-16 bg-accent/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-accent/20 transition-colors">
                            <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-background mb-4">Web Development</h3>
                        <p class="text-gray-400 mb-6">Custom web applications built with cutting-edge technologies for optimal performance and scalability.</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-accent/10 text-accent text-sm rounded-full">React</span>
                            <span class="px-3 py-1 bg-accent/10 text-accent text-sm rounded-full">Node.js</span>
                            <span class="px-3 py-1 bg-accent/10 text-accent text-sm rounded-full">Python</span>
                        </div>
                    </div>
                </div>

                <!-- Mobile Apps -->
                <div class="group relative">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-purple-500 transition-all duration-300 hover-lift">
                        <div class="w-16 h-16 bg-purple-500/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-purple-500/20 transition-colors">
                            <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-background mb-4">Mobile Apps</h3>
                        <p class="text-gray-400 mb-6">Native and cross-platform mobile applications designed for the Nigerian market and beyond.</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-purple-500/10 text-purple-400 text-sm rounded-full">React Native</span>
                            <span class="px-3 py-1 bg-purple-500/10 text-purple-400 text-sm rounded-full">Flutter</span>
                            <span class="px-3 py-1 bg-purple-500/10 text-purple-400 text-sm rounded-full">Swift</span>
                        </div>
                    </div>
                </div>

                <!-- UI/UX Design -->
                <div class="group relative">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-green-400 transition-all duration-300 hover-lift">
                        <div class="w-16 h-16 bg-green-400/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-green-400/20 transition-colors">
                            <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-background mb-4">UI/UX Design</h3>
                        <p class="text-gray-400 mb-6">User-centered design solutions that combine aesthetic excellence with psychological optimization.</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-green-400/10 text-green-400 text-sm rounded-full">Figma</span>
                            <span class="px-3 py-1 bg-green-400/10 text-green-400 text-sm rounded-full">Adobe XD</span>
                            <span class="px-3 py-1 bg-green-400/10 text-green-400 text-sm rounded-full">Sketch</span>
                        </div>
                    </div>
                </div>

                <!-- Business Intelligence -->
                <div class="group relative">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-yellow-400 transition-all duration-300 hover-lift">
                        <div class="w-16 h-16 bg-yellow-400/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-yellow-400/20 transition-colors">
                            <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-background mb-4">Business Intelligence</h3>
                        <p class="text-gray-400 mb-6">Data-driven insights and analytics solutions to power informed business decisions and growth.</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-yellow-400/10 text-yellow-400 text-sm rounded-full">Power BI</span>
                            <span class="px-3 py-1 bg-yellow-400/10 text-yellow-400 text-sm rounded-full">Tableau</span>
                            <span class="px-3 py-1 bg-yellow-400/10 text-yellow-400 text-sm rounded-full">Python</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
