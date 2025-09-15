<template>
    <section id="testimonials" class="section-padding bg-secondary">
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
                        ">Global Leaders
                    </span> Share Their Success
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Hear directly from CEOs and business leaders worldwide about their digital transformation journey with Forahia
                </p>
            </div>

            <!-- Video Testimonials Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
                <!-- Video Testimonial 1 -->
                <div class="group relative">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-accent transition-all duration-300 hover-lift">
                        <div class="relative mb-6">
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=2426&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="CEO Adebayo Ogundimu video testimonial" class="w-full h-48 object-cover rounded-lg" loading="lazy" onerror="this.src='https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'; this.onerror=null;" />
                            <div class="absolute inset-0 bg-black/40 rounded-lg flex items-center justify-center group-hover:bg-black/30 transition-colors">
                                <button class="w-16 h-16 bg-accent/90 rounded-full flex items-center justify-center hover:bg-accent transition-colors">
                                    <svg class="w-6 h-6 text-primary ml-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4">
                                <img src="/black.jpg" alt="Adebayo Ogundimu" class="w-12 h-12 rounded-full object-cover" loading="lazy" onerror="this.src='https://images.pixabay.com/photo/2016/11/21/12/42/beard-1845166_1280.jpg'; this.onerror=null;" />
                                <div>
                                    <h3 class="text-lg font-semibold text-background">Adebayo Ogundimu</h3>
                                    <p class="text-gray-400">CEO, TechHub Global</p>
                                </div>
                            </div>
                            <blockquote class="text-gray-300 italic">
                                "Forahia transformed our entire business model. We went from struggling with manual processes to becoming the leading fintech platform in our region. Our revenue increased by 450% in just 18 months."
                            </blockquote>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-success/10 text-success text-sm rounded-full">450% Revenue Growth</span>
                                <span class="px-3 py-1 bg-accent/10 text-accent text-sm rounded-full">18 Months ROI</span>
                                <span class="px-3 py-1 bg-purple-500/10 text-purple-400 text-sm rounded-full">Fintech</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Video Testimonial 2 -->
                <div class="group relative">
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-success transition-all duration-300 hover-lift">
                        <div class="relative mb-6">
                            <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=2340&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="CEO Kemi Adebisi video testimonial" class="w-full h-48 object-cover rounded-lg" loading="lazy" onerror="this.src='https://images.pexels.com/photos/3184338/pexels-photo-3184338.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'; this.onerror=null;" />
                            <div class="absolute inset-0 bg-black/40 rounded-lg flex items-center justify-center group-hover:bg-black/30 transition-colors">
                                <button class="w-16 h-16 bg-success/90 rounded-full flex items-center justify-center hover:bg-success transition-colors">
                                    <svg class="w-6 h-6 text-primary ml-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4">
                                <img src="/black2.jpg" alt="Kemi Adebisi" class="w-12 h-12 rounded-full object-cover" loading="lazy" />
                                <div>
                                    <h3 class="text-lg font-semibold text-background">Kemi Adebisi</h3>
                                    <p class="text-gray-400">Founder, Global Fashion House</p>
                                </div>
                            </div>
                            <blockquote class="text-gray-300 italic">
                                "The e-commerce platform Forahia built for us revolutionized how we reach customers globally. Our online sales now represent 75% of total revenue, up from zero before the partnership."
                            </blockquote>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-success/10 text-success text-sm rounded-full">75% Online Revenue</span>
                                <span class="px-3 py-1 bg-accent/10 text-accent text-sm rounded-full">12 Months</span>
                                <span class="px-3 py-1 bg-purple-500/10 text-purple-400 text-sm rounded-full">E-commerce</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- More Testimonials Button -->
            <div class="text-center">
                <a href="/portfolio" class="btn-primary hover-lift">
                    View All Success Stories
                </a>
            </div>
        </div>
    </section>
</template>
