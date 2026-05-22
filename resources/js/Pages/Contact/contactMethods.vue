<template>
    <section class="section-padding bg-secondary">
            <div class="container-max">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-background mb-6">
                        Multiple Ways to
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
                            ">Connect
                        </span>
                    </h2>
                    <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                        Choose the communication method that works best for you and your team
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Phone Contact -->
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-accent transition-all duration-300 hover-lift text-center">
                        <div class="w-16 h-16 bg-accent/10 rounded-xl flex items-center justify-center mb-6 mx-auto">
                            <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-background mb-4">Phone</h3>
                        <p class="text-gray-400 mb-4">Direct line to our office</p>
                        <a href="tel:+2347065910449" class="text-accent font-semibold hover:text-accent/80 transition-colors">
                            +234 706 591 0449
                        </a>
                        <p class="text-sm text-gray-500 mt-2">Mon-Fri: 8AM-8PM WAT</p>
                    </div>

                    <!-- WhatsApp Business -->
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-green-400 transition-all duration-300 hover-lift text-center">
                        <div class="w-16 h-16 bg-green-400/10 rounded-xl flex items-center justify-center mb-6 mx-auto">
                            <svg class="w-8 h-8 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-background mb-4">WhatsApp Business</h3>
                        <p class="text-gray-400 mb-4">Instant messaging & file sharing</p>
                        <a href="https://wa.me/2347065910449" target="_blank" class="text-green-400 font-semibold hover:text-green-400/80 transition-colors">
                            Start Chat
                        </a>
                        <p class="text-sm text-gray-500 mt-2">24/7 Automated responses</p>
                    </div>

                    <!-- Email -->
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-purple-400 transition-all duration-300 hover-lift text-center">
                        <div class="w-16 h-16 bg-purple-400/10 rounded-xl flex items-center justify-center mb-6 mx-auto">
                            <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-background mb-4">Email</h3>
                        <p class="text-gray-400 mb-4">Detailed project discussions</p>
                        <a href="mailto:info@forahia.com" class="text-purple-400 font-semibold hover:text-purple-400/80 transition-colors">
                            info@forahia.com
                        </a>
                        <p class="text-sm text-gray-500 mt-2">24-hour response guarantee</p>
                    </div>

                    <!-- Emergency Support -->
                    <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700 hover:border-yellow-400 transition-all duration-300 hover-lift text-center">
                        <div class="w-16 h-16 bg-yellow-400/10 rounded-xl flex items-center justify-center mb-6 mx-auto">
                            <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-background mb-4">Emergency Support</h3>
                        <p class="text-gray-400 mb-4">For existing clients only</p>
                        <a href="tel:+2347065910449" class="text-yellow-400 font-semibold hover:text-yellow-400/80 transition-colors">
                            +234 706 591 0449
                        </a>
                        <p class="text-sm text-gray-500 mt-2">24/7 Critical issues</p>
                    </div>
                </div>
            </div>
        </section>
</template>
