<template>
    <section
        class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20"
    >
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

        <div class="relative z-10 container-max text-center px-4">
            <!-- Main Headline with Staggered Animation -->
            <div class="fade-in">
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
                        "
                    >
                        Where Innovation
                    </span>
                    <span class="block text-background stagger-delay-2"
                        >Meets Execution</span
                    >
                </h1>
            </div>

            <!-- Subtitle -->
            <div class="fade-in stagger-delay-3">
                <p
                    class="text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto"
                >
                    Digital transformation built for Nigerian business success
                </p>
            </div>

            <!-- CTA Buttons -->
            <div
                class="fade-in stagger-delay-3 flex flex-col sm:flex-row gap-4 justify-center mb-16"
            >
                <Link
                    href="/contact"
                    class="btn-primary text-lg px-8 py-4 hover-lift"
                >
                    Start Your Digital Assessment
                </Link>
                <Link
                    href="/portfolio"
                    class="btn-secondary text-lg px-8 py-4 hover-lift"
                >
                    View Our Work
                </Link>
            </div>

            <!-- Live Metrics Counter -->
            <div
                class="fade-in stagger-delay-3 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto"
            >
                <div class="text-center">
                    <div
                        class="text-3xl md:text-4xl font-bold text-accent mb-2"
                        id="revenue-counter"
                    >
                        $50M+
                    </div>
                    <div class="text-gray-400">Client Revenue Generated</div>
                </div>
                <div class="text-center">
                    <div
                        class="text-3xl md:text-4xl font-bold text-green-400 mb-2"
                        id="business-counter"
                    >
                        50+
                    </div>
                    <div class="text-gray-400">
                        Businesses Transform
                    </div>
                </div>
                <div class="text-center">
                    <div
                        class="text-3xl md:text-4xl font-bold text-purple-400 mb-2"
                        id="projects-counter"
                    >
                        150+
                    </div>
                    <div class="text-gray-400">Projects Delivered</div>
                </div>
            </div>
        </div>
    </section>
</template>
