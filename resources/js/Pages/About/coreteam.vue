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
                        ">Expert Team
                    </span>
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Talented professionals from diverse backgrounds united by passion for innovation
                </p>
            </div>

            <!-- Team Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Senior Developer -->
                <div class="group">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-accent transition-all duration-300 hover-lift">
                        <div class="relative mb-4">
                            <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?q=80&w=2787&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Tunde Bakare - Senior Developer" class="w-20 h-20 rounded-full object-cover mx-auto border-2 border-accent/20" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'; this.onerror=null;" />
                        </div>
                        <div class="text-center">
                            <h4 class="text-lg font-semibold text-background mb-1">David Abraham</h4>
                            <p class="text-accent text-sm mb-3">Full-Stack Developer</p>
                            <div class="flex flex-wrap gap-1 justify-center">
                                <span class="px-2 py-1 bg-accent/10 text-accent text-xs rounded">React</span>
                                <span class="px-2 py-1 bg-accent/10 text-accent text-xs rounded">Node.js</span>
                                <span class="px-2 py-1 bg-accent/10 text-accent text-xs rounded">Python</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile Developer -->
                <div class="group">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-purple-500 transition-all duration-300 hover-lift">
                        <div class="relative mb-4">
                            <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=2761&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Aisha Mohammed - Mobile Developer" class="w-20 h-20 rounded-full object-cover mx-auto border-2 border-purple-500/20" loading="lazy" onerror="this.src='https://images.pixabay.com/photo/2017/06/26/02/47/man-2442565_1280.jpg'; this.onerror=null;" />
                        </div>
                        <div class="text-center">
                            <h4 class="text-lg font-semibold text-background mb-1">Okechukwu Umeh</h4>
                            <p class="text-purple-400 text-sm mb-3">Lead Mobile Developer</p>
                            <div class="flex flex-wrap gap-1 justify-center">
                                <span class="px-2 py-1 bg-purple-500/10 text-purple-400 text-xs rounded">Flutter</span>
                                <span class="px-2 py-1 bg-purple-500/10 text-purple-400 text-xs rounded">React Native</span>
                                <span class="px-2 py-1 bg-purple-500/10 text-purple-400 text-xs rounded">Swift</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- UI/UX Designer -->
                <div class="group">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-green-400 transition-all duration-300 hover-lift">
                        <div class="relative mb-4">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Chioma Okwu - UI/UX Designer" class="w-20 h-20 rounded-full object-cover mx-auto border-2 border-green-400/20" loading="lazy" onerror="this.src='https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'; this.onerror=null;" />
                        </div>
                        <div class="text-center">
                            <h4 class="text-lg font-semibold text-background mb-1">Ayobami Gegeoju</h4>
                            <p class="text-green-400 text-sm mb-3">UI/UX Designer</p>
                            <div class="flex flex-wrap gap-1 justify-center">
                                <span class="px-2 py-1 bg-green-400/10 text-green-400 text-xs rounded">Figma</span>
                                <span class="px-2 py-1 bg-green-400/10 text-green-400 text-xs rounded">Adobe XD</span>
                                <span class="px-2 py-1 bg-green-400/10 text-green-400 text-xs rounded">Sketch</span>
                            </div>
                        </div>
                    </div>
                </div> 

                <!-- Data Analyst -->
                <div class="group">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-yellow-400 transition-all duration-300 hover-lift">
                        <div class="relative mb-4">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=2787&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Emeka Nwosu - Data Analyst" class="w-20 h-20 rounded-full object-cover mx-auto border-2 border-yellow-400/20" loading="lazy" onerror="this.src='https://images.pixabay.com/photo/2016/11/18/19/07/happy-1836445_1280.jpg'; this.onerror=null;" />
                        </div>
                        <div class="text-center">
                            <h4 class="text-lg font-semibold text-background mb-1">Emeka Nwosu</h4>
                            <p class="text-yellow-400 text-sm mb-3">Data Analyst</p>
                            <div class="flex flex-wrap gap-1 justify-center">
                                <span class="px-2 py-1 bg-yellow-400/10 text-yellow-400 text-xs rounded">Power BI</span>
                                <span class="px-2 py-1 bg-yellow-400/10 text-yellow-400 text-xs rounded">Python</span>
                                <span class="px-2 py-1 bg-yellow-400/10 text-yellow-400 text-xs rounded">SQL</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
