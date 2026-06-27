<template>
    <MainLayout
        title="Forahia Solutions - Engineering Digital Infrastructure"
        description="Forahia Solutions builds production-grade software for healthcare, fintech, and marketplace businesses."
    >
        <!-- Hero Section -->
        <section class="relative pt-32 pb-20 md:pt-40 md:pb-28 lg:pt-48 lg:pb-32 flex items-center justify-center overflow-hidden border-b border-border">
            <!-- Subtle dot-grid background (using a CSS pattern to mimic SVG) -->
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle at center, #94A3B8 1px, transparent 1px); background-size: 24px 24px;"></div>

            <div class="container mx-auto px-6 relative z-10 grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left: Typography -->
                <div class="space-y-8" v-motion-fade-visible>
                    <div class="inline-flex items-center space-x-2 bg-bg-surface border border-border rounded-full px-4 py-1.5 text-sm text-text-secondary">
                        <span class="w-2 h-2 rounded-full bg-accent-teal animate-pulse"></span>
                        <span>Available for new projects</span>
                    </div>

                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold leading-tight">
                        We Engineer Digital<br/>
                        Infrastructure That<br/>
                        <Transition name="swap" mode="out-in">
                            <span :key="currentWord" class="text-primary-blue inline-block">{{ currentWord }}</span>
                        </Transition>
                    </h1>

                    <p class="text-lg text-text-secondary max-w-xl leading-relaxed">
                        Forahia Solutions builds production-grade software for healthcare, fintech, and marketplace businesses; from first line of code to national-scale deployment.
                    </p>

                    <div class="flex flex-wrap gap-4 pt-4">
                        <Link href="/contact" class="bg-primary-blue hover:bg-blue-700 text-white px-8 py-3 rounded-md font-medium transition-colors shadow-[0_0_15px_var(--color-primary-glow)]">
                            Start a Project →
                        </Link>
                        <Link href="/portfolio" class="bg-transparent border border-border hover:bg-bg-elevated text-text-primary px-8 py-3 rounded-md font-medium transition-colors">
                            View Our Work
                        </Link>
                    </div>
                </div>

                <!-- Right: Terminal Card Visual -->
                <div class="hidden lg:block relative group" v-motion-fade-visible>
                    <div class="absolute -inset-1 bg-gradient-to-r from-primary-blue to-accent-teal rounded-lg blur opacity-20 group-hover:opacity-30 transition duration-1000"></div>
                    <div class="relative bg-bg-elevated border border-border rounded-lg shadow-2xl overflow-hidden">
                        <div class="flex items-center px-4 py-3 border-b border-border bg-bg-surface">
                            <div class="flex space-x-2">
                                <div class="w-3 h-3 rounded-full bg-red-500/20 border border-red-500/50"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-500/20 border border-yellow-500/50"></div>
                                <div class="w-3 h-3 rounded-full bg-green-500/20 border border-green-500/50"></div>
                            </div>
                        </div>
                        <div class="p-6 font-mono text-sm text-text-secondary leading-relaxed">
                            <span class="text-accent-teal">import</span> { Infrastructure } <span class="text-accent-teal">from</span> '@forahia/core';<br/><br/>
                            <span class="text-primary-blue">const</span> project = <span class="text-primary-blue">new</span> Infrastructure({<br/>
                            &nbsp;&nbsp;scale: <span class="text-accent-amber">'national'</span>,<br/>
                            &nbsp;&nbsp;stack: [<span class="text-accent-amber">'Laravel'</span>, <span class="text-accent-amber">'Vue'</span>, <span class="text-accent-amber">'Python'</span>],<br/>
                            &nbsp;&nbsp;founderLed: <span class="text-accent-amber">true</span><br/>
                            });<br/><br/>
                            <span class="text-text-muted">// Ready for production</span><br/>
                            <span class="text-accent-teal">await</span> project.deploy();
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Trust Strip -->
        <section class="py-10 border-b border-border bg-bg-surface overflow-hidden">
            <div class="container mx-auto px-6 flex flex-col md:flex-row md:justify-between items-center gap-6">
                <div class="text-xs font-mono text-text-muted tracking-widest whitespace-nowrap">TRUSTED BY</div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 w-full">
                    <div class="bg-bg-elevated/40 border border-border/50 rounded-2xl p-4 md:p-6 flex items-center justify-center transition-all duration-300 hover:border-primary-blue/40 hover:shadow-[0_0_25px_rgba(37,99,235,0.15)] hover:-translate-y-1 group">
                        <img src="/images/clients/nemsas.png" alt="NEMSAS" class="h-10 md:h-14 object-contain transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="bg-bg-elevated/40 border border-border/50 rounded-2xl p-4 md:p-6 flex items-center justify-center transition-all duration-300 hover:border-primary-blue/40 hover:shadow-[0_0_25px_rgba(37,99,235,0.15)] hover:-translate-y-1 group">
                        <img src="/images/clients/nipost.png" alt="NIPOST" class="h-16 md:h-24 object-contain transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="bg-bg-elevated/40 border border-border/50 rounded-2xl p-4 md:p-6 flex items-center justify-center transition-all duration-300 hover:border-primary-blue/40 hover:shadow-[0_0_25px_rgba(37,99,235,0.15)] hover:-translate-y-1 group">
                        <img src="/images/clients/avo-health.png" alt="AVO HEALTH" class="h-10 md:h-14 object-contain transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="bg-bg-elevated/40 border border-border/50 rounded-2xl p-4 md:p-6 flex items-center justify-center transition-all duration-300 hover:border-primary-blue/40 hover:shadow-[0_0_25px_rgba(37,99,235,0.15)] hover:-translate-y-1 group">
                        <img src="/images/clients/abia-state.png" alt="Abia State Government" class="h-10 md:h-14 object-contain transition-transform duration-300 group-hover:scale-110">
                    </div>
                </div>
            </div>
        </section>

        <!-- Capabilities Grid -->
        <section class="py-24 border-b border-border relative">
            <div class="container mx-auto px-6">
                <div class="mb-16" v-motion-fade-visible>
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Core Capabilities</h2>
                    <p class="text-text-secondary text-lg max-w-2xl">We don't just write code; we architect systems designed for long-term scalability, security, and performance.</p>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Card 1 -->
                    <div class="p-8 rounded-xl bg-bg-surface border border-border hover:border-primary-blue/30 transition-colors" v-motion-fade-visible>
                        <div class="text-primary-blue font-mono text-sm mb-4">01</div>
                        <h3 class="text-xl font-bold mb-3">Backend Engineering</h3>
                        <p class="text-text-secondary mb-6 h-12">Robust, secure, and scalable API architectures and database designs.</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="font-mono text-[11px] px-2.5 py-1 rounded-full bg-bg-elevated border border-border text-text-muted">Laravel</span>
                            <span class="font-mono text-[11px] px-2.5 py-1 rounded-full bg-bg-elevated border border-border text-text-muted">Python/FastAPI</span>
                            <span class="font-mono text-[11px] px-2.5 py-1 rounded-full bg-bg-elevated border border-border text-text-muted">Node.js</span>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="p-8 rounded-xl bg-bg-surface border border-border hover:border-primary-blue/30 transition-colors" v-motion-fade-visible>
                        <div class="text-primary-blue font-mono text-sm mb-4">02</div>
                        <h3 class="text-xl font-bold mb-3">Frontend Engineering</h3>
                        <p class="text-text-secondary mb-6 h-12">Highly interactive, accessible, and performant user interfaces.</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="font-mono text-[11px] px-2.5 py-1 rounded-full bg-bg-elevated border border-border text-text-muted">React</span>
                            <span class="font-mono text-[11px] px-2.5 py-1 rounded-full bg-bg-elevated border border-border text-text-muted">TypeScript</span>
                            <span class="font-mono text-[11px] px-2.5 py-1 rounded-full bg-bg-elevated border border-border text-text-muted">Vue</span>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="p-8 rounded-xl bg-bg-surface border border-border hover:border-primary-blue/30 transition-colors" v-motion-fade-visible>
                        <div class="text-primary-blue font-mono text-sm mb-4">03</div>
                        <h3 class="text-xl font-bold mb-3">AI/LLM Integration</h3>
                        <p class="text-text-secondary mb-6 h-12">Intelligent automation, RAG pipelines, and conversational agents.</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="font-mono text-[11px] px-2.5 py-1 rounded-full bg-bg-elevated border border-border text-text-muted">OpenAI</span>
                            <span class="font-mono text-[11px] px-2.5 py-1 rounded-full bg-bg-elevated border border-border text-text-muted">Anthropic</span>
                            <span class="font-mono text-[11px] px-2.5 py-1 rounded-full bg-bg-elevated border border-border text-text-muted">RAG</span>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="p-8 rounded-xl bg-bg-surface border border-border hover:border-primary-blue/30 transition-colors" v-motion-fade-visible>
                        <div class="text-primary-blue font-mono text-sm mb-4">04</div>
                        <h3 class="text-xl font-bold mb-3">DevOps & Infrastructure</h3>
                        <p class="text-text-secondary mb-6 h-12">Automated deployments, containerization, and cloud management.</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="font-mono text-[11px] px-2.5 py-1 rounded-full bg-bg-elevated border border-border text-text-muted">Docker</span>
                            <span class="font-mono text-[11px] px-2.5 py-1 rounded-full bg-bg-elevated border border-border text-text-muted">CI/CD</span>
                            <span class="font-mono text-[11px] px-2.5 py-1 rounded-full bg-bg-elevated border border-border text-text-muted">AWS/Cloud</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Work (Preview) -->
        <section class="py-24 border-b border-border bg-bg-surface">
            <div class="container mx-auto px-6">
                <div class="flex justify-between items-end mb-12" v-motion-fade-visible>
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold mb-4">Featured Work</h2>
                        <p class="text-text-secondary">Systems we've engineered for production environments.</p>
                    </div>
                    <Link href="/portfolio" class="hidden md:inline-flex text-primary-blue hover:text-blue-400 font-medium items-center transition-colors">
                        View All Projects <span class="ml-2">→</span>
                    </Link>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Project 1 -->
                    <div class="group flex flex-col bg-bg-elevated border border-border rounded-xl overflow-hidden hover:border-primary-blue/50 transition-all duration-300" v-motion-fade-visible>
                        <div class="bg-bg-base relative overflow-hidden border-b border-border">
                            <img src="/images/projects/auramed.png" alt="AuraMed Dashboard" class="w-full h-auto block transition-transform duration-700 group-hover:scale-105">
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="text-xs font-mono tracking-widest text-text-secondary uppercase mb-3">
                                Healthcare <span class="text-text-muted mx-2">&middot;</span> Live in Production
                            </div>
                            <h3 class="text-2xl font-semibold text-text-primary mb-2 group-hover:text-primary-blue transition-colors">AuraMed</h3>
                            <p class="text-text-secondary mb-6 flex-grow">AI-powered clinical management platform for Nigerian healthcare providers.</p>
                            <div class="flex flex-wrap gap-2 mb-6">
                                <span class="font-mono text-[11px] px-2.5 py-1 rounded-full bg-bg-surface border border-border text-text-secondary">HMO Claims</span>
                                <span class="font-mono text-[11px] px-2.5 py-1 rounded-full bg-bg-surface border border-border text-text-secondary">AI Assistant</span>
                                <span class="font-mono text-[11px] px-2.5 py-1 rounded-full bg-bg-surface border border-border text-text-secondary">7 Roles</span>
                            </div>
                            <div class="border-t border-border pt-4">
                                <a href="https://auramed.cc" target="_blank" rel="noopener noreferrer" class="text-primary-blue font-medium hover:text-blue-400 transition-colors">Visit auramed.cc →</a>
                            </div>
                        </div>
                    </div>

                    <!-- Project 2 -->
                    <div class="group flex flex-col bg-bg-elevated border border-border rounded-xl overflow-hidden hover:border-primary-blue/50 transition-all duration-300" v-motion-fade-visible>
                        <div class="bg-bg-base relative overflow-hidden border-b border-border">
                            <img src="/images/projects/forafix.png" alt="Forafix App" class="w-full h-auto block transition-transform duration-700 group-hover:scale-105">
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="text-xs font-mono tracking-widest text-text-secondary uppercase mb-3">
                                Marketplace <span class="text-text-muted mx-2">&middot;</span> Multi-city
                            </div>
                            <h3 class="text-2xl font-semibold text-text-primary mb-2 group-hover:text-primary-blue transition-colors">Forafix</h3>
                            <p class="text-text-secondary mb-6 flex-grow">On-demand home services marketplace with escrow payments and GPS tracking.</p>
                            <div class="flex flex-wrap gap-2 mb-6">
                                <span class="font-mono text-[11px] px-2.5 py-1 rounded-full bg-bg-surface border border-border text-text-secondary">Flutter</span>
                                <span class="font-mono text-[11px] px-2.5 py-1 rounded-full bg-bg-surface border border-border text-text-secondary">Escrow</span>
                                <span class="font-mono text-[11px] px-2.5 py-1 rounded-full bg-bg-surface border border-border text-text-secondary">Real-time Chat</span>
                            </div>
                            <div class="border-t border-border pt-4">
                                <a href="https://forahia.com/forafix" target="_blank" rel="noopener noreferrer" class="text-primary-blue font-medium hover:text-blue-400 transition-colors">Visit forahia.com/forafix →</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 text-center md:hidden">
                    <Link href="/portfolio" class="text-primary-blue font-medium">View All Projects →</Link>
                </div>
            </div>
        </section>

        <!-- Why Forahia -->
        <section class="py-24 border-b border-border">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl md:text-4xl font-bold mb-16 text-center" v-motion-fade-visible>Why Forahia Solutions</h2>
                <div class="grid md:grid-cols-3 gap-12">
                    <div class="space-y-4" v-motion-fade-visible>
                        <div class="text-4xl font-mono text-primary-blue opacity-50 mb-6">01</div>
                        <h3 class="text-xl font-bold">Senior Engineering Experience</h3>
                        <p class="text-text-secondary">Over 6 years of deep technical experience across healthcare, fintech, and complex marketplaces. We don't just build MVPs; we build for scale.</p>
                    </div>
                    <div class="space-y-4" v-motion-fade-visible>
                        <div class="text-4xl font-mono text-primary-blue opacity-50 mb-6">02</div>
                        <h3 class="text-xl font-bold">National-Scale Track Record</h3>
                        <p class="text-text-secondary">Trusted by government agencies like NEMSAS and NIPOST to deliver infrastructure that works flawlessly under pressure and handles sensitive data securely.</p>
                    </div>
                    <div class="space-y-4" v-motion-fade-visible>
                        <div class="text-4xl font-mono text-primary-blue opacity-50 mb-6">03</div>
                        <h3 class="text-xl font-bold">Founder-Led Delivery</h3>
                        <p class="text-text-secondary">No junior handoffs or account managers playing telephone. You work directly with the engineering founder who oversees and delivers your architecture.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Process Stepper -->
        <section class="py-24 border-b border-border bg-bg-surface overflow-hidden">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl md:text-4xl font-bold mb-16" v-motion-fade-visible>Our Engineering Process</h2>
                
                <!-- Horizontal Stepper (Scrolls on mobile) -->
                <div class="flex overflow-x-auto pb-8 snap-x hide-scrollbar" v-motion-fade-visible>
                    <div class="flex space-x-4 min-w-max pr-6">
                        <div v-for="(step, index) in steps" :key="index" class="w-64 snap-start shrink-0">
                            <div class="flex items-center mb-6">
                                <div class="w-10 h-10 rounded-full bg-bg-elevated border border-primary-blue flex items-center justify-center font-mono text-primary-blue font-bold">
                                    {{ index + 1 }}
                                </div>
                                <div class="h-px bg-border flex-grow ml-4" v-if="index < steps.length - 1"></div>
                            </div>
                            <h3 class="text-lg font-bold mb-2">{{ step.title }}</h3>
                            <p class="text-sm text-text-secondary">{{ step.desc }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Banner -->
        <section class="py-32 relative overflow-hidden">
            <div class="absolute inset-0 bg-primary-blue/5"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-primary-blue rounded-full blur-[120px] opacity-20 pointer-events-none"></div>
            
            <div class="container mx-auto px-6 relative z-10 text-center" v-motion-fade-visible>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Have a Project in Mind?</h2>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto mb-10">Whether you're modernizing a legacy system or building a new product from scratch, let's discuss your architecture.</p>
                <Link href="/contact" class="inline-block bg-primary-blue hover:bg-blue-700 text-white px-10 py-4 rounded-md font-medium text-lg transition-colors shadow-[0_0_20px_var(--color-primary-glow)]">
                    Let's Talk →
                </Link>
            </div>
        </section>

    </MainLayout>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { Link } from '@inertiajs/vue3';
import MainLayout from '../Components/Layout/MainLayout.vue';

// Word Cycling logic for Hero
const words = ['Scales', 'Performs', 'Lasts'];
const currentWord = ref(words[0]);
let interval;

onMounted(() => {
    let index = 0;
    interval = setInterval(() => {
        index = (index + 1) % words.length;
        currentWord.value = words[index];
    }, 3000);
});

onUnmounted(() => clearInterval(interval));

// Process steps
const steps = [
    { title: 'Discovery', desc: 'Understanding requirements, constraints, and business goals.' },
    { title: 'Architecture', desc: 'Designing database schemas, API contracts, and infrastructure.' },
    { title: 'Build', desc: 'Iterative, high-quality code delivery with regular updates.' },
    { title: 'Test', desc: 'Automated and manual QA to ensure edge cases are covered.' },
    { title: 'Deploy', desc: 'Zero-downtime deployment to production infrastructure.' },
    { title: 'Support', desc: 'Ongoing maintenance, monitoring, and scaling.' }
];
</script>

<style scoped>
.swap-enter-active, .swap-leave-active { transition: all 0.4s ease; }
.swap-enter-from { opacity: 0; transform: translateY(15px); }
.swap-leave-to { opacity: 0; transform: translateY(-15px); }

/* Hide scrollbar for the stepper container */
.hide-scrollbar::-webkit-scrollbar { display: none; }
.hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
