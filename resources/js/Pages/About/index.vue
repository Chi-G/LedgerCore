<template>
    <MainLayout
        title="About - Forahia Solutions"
        description="Learn about our engineering culture, founder-led delivery model, and the team driving digital infrastructure."
    >
        <!-- Hero / Company Story -->
        <section class="relative pt-32 pb-24 border-b border-border overflow-hidden">
            <div class="absolute inset-0 bg-bg-surface opacity-50"></div>
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle at center, #94A3B8 1px, transparent 1px); background-size: 24px 24px;"></div>
            
            <div class="container mx-auto px-6 relative z-10 grid lg:grid-cols-2 gap-16 items-center" v-motion-fade-visible>
                <div>
                    <div class="inline-flex items-center space-x-2 bg-bg-elevated border border-border rounded-full px-4 py-1.5 text-sm text-text-secondary mb-6">
                        <span class="text-accent-teal font-mono">['./about']</span>
                    </div>
                    <h1 class="text-4xl md:text-6xl font-bold mb-8 leading-tight">
                        Built by Engineers,<br/>
                        For Complex Systems
                    </h1>
                    <div class="space-y-6 text-lg text-text-secondary">
                        <p>
                            Forahia Solutions was founded on a simple premise: businesses need resilient software architecture, not just code that barely works.
                        </p>
                        <p>
                            We are a boutique, founder-led technical consultancy specializing in designing, building, and scaling software infrastructure for ambitious companies in Nigeria and beyond.
                        </p>
                    </div>
                </div>
                
                <div class="relative hidden lg:block" v-motion-fade-visible>
                    <!-- Abstract visual representing structure/architecture -->
                    <div class="absolute -inset-1 bg-gradient-to-r from-primary-blue to-accent-teal rounded-lg blur opacity-20"></div>
                    <div class="relative bg-bg-elevated border border-border rounded-xl aspect-square flex flex-col items-center justify-center p-8 overflow-hidden">
                        <div class="w-full h-full border border-border/50 rounded-lg relative overflow-hidden flex flex-col justify-between p-6">
                            <!-- Grid Lines -->
                            <div class="w-full h-px bg-primary-blue/30 absolute top-1/3 left-0"></div>
                            <div class="w-full h-px bg-primary-blue/30 absolute top-2/3 left-0"></div>
                            <div class="h-full w-px bg-primary-blue/30 absolute top-0 left-1/3"></div>
                            <div class="h-full w-px bg-primary-blue/30 absolute top-0 left-2/3"></div>
                            
                            <!-- Animated Nodes -->
                            <div class="absolute top-1/3 left-1/3 w-3 h-3 bg-accent-teal rounded-full shadow-[0_0_15px_rgba(45,212,191,1)] -translate-x-1/2 -translate-y-1/2 animate-pulse"></div>
                            <div class="absolute top-1/3 left-2/3 w-2 h-2 bg-primary-blue rounded-full shadow-[0_0_15px_rgba(59,130,246,1)] -translate-x-1/2 -translate-y-1/2 animate-ping" style="animation-duration: 3s"></div>
                            <div class="absolute top-2/3 left-1/3 w-2 h-2 bg-primary-blue rounded-full shadow-[0_0_15px_rgba(59,130,246,1)] -translate-x-1/2 -translate-y-1/2 animate-pulse" style="animation-duration: 2s; animation-delay: 1s"></div>
                            <div class="absolute top-2/3 left-2/3 flex items-center justify-center -translate-x-1/2 -translate-y-1/2">
                                <div class="w-5 h-5 bg-accent-teal/40 rounded-full animate-ping absolute" style="animation-duration: 2.5s"></div>
                                <div class="w-2 h-2 bg-accent-teal rounded-full relative z-10 shadow-[0_0_10px_rgba(45,212,191,1)]"></div>
                            </div>
                            
                            <div class="z-10 font-mono text-primary-blue text-xl font-bold tracking-widest bg-bg-surface/80 backdrop-blur-sm px-3 py-1 rounded border border-primary-blue/20">SYSTEM</div>
                            <div class="z-10 self-end font-mono text-accent-teal text-xl font-bold tracking-widest bg-bg-surface/80 backdrop-blur-sm px-3 py-1 rounded border border-accent-teal/20">ARCHITECTURE</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Values -->
        <section class="py-24 border-b border-border relative bg-bg-surface">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl md:text-4xl font-bold mb-16 text-center" v-motion-fade-visible>Our Method</h2>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="p-8 bg-bg-elevated border border-border rounded-xl" v-motion-fade-visible>
                        <div class="w-12 h-12 rounded-lg bg-primary-blue/10 flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-primary-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Resilient by Default</h3>
                        <p class="text-text-secondary">We assume systems will fail under load. We architect redundancies, caching layers, and security barriers from day one.</p>
                    </div>
                    
                    <div class="p-8 bg-bg-elevated border border-border rounded-xl" v-motion-fade-visible>
                        <div class="w-12 h-12 rounded-lg bg-accent-teal/10 flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-accent-teal" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Zero Bureaucracy</h3>
                        <p class="text-text-secondary">No project managers playing telephone. You communicate directly with the engineers architecting your product.</p>
                    </div>
                    
                    <div class="p-8 bg-bg-elevated border border-border rounded-xl" v-motion-fade-visible>
                        <div class="w-12 h-12 rounded-lg bg-accent-amber/10 flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-accent-amber" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Clean Code</h3>
                        <p class="text-text-secondary">We adhere to strict coding standards, comprehensive testing, and extensive documentation. We write code other engineers love to read.</p>
                    </div>
                    
                    <div class="p-8 bg-bg-elevated border border-border rounded-xl" v-motion-fade-visible>
                        <div class="w-12 h-12 rounded-lg bg-primary-blue/10 flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-primary-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Long-Term Thinking</h3>
                        <p class="text-text-secondary">We avoid trendy frameworks that die in two years. We build on battle-tested technologies that will support your business for a decade.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team -->
        <section class="py-24 border-b border-border relative">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16" v-motion-fade-visible>
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Leadership</h2>
                    <p class="text-text-secondary max-w-2xl mx-auto">Led by experienced engineers with a passion for digital infrastructure.</p>
                </div>
                
                <div class="flex justify-center" v-motion-fade-visible>
                    <div class="max-w-2xl w-full bg-bg-surface border border-border rounded-xl overflow-hidden shadow-lg hover:border-primary-blue/30 transition-colors duration-300">
                        <div class="h-40 bg-bg-elevated border-b border-border flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 bg-primary-blue/5"></div>
                            <img src="/images/chijindu.png" alt="Chijindu Nwokeohuru" class="w-24 h-24 rounded-full border-2 border-primary-blue object-cover relative z-10 shadow-[0_0_15px_rgba(59,130,246,0.2)]">
                        </div>
                        <div class="p-8 md:p-10 text-left">
                            <div class="mb-6">
                                <h3 class="text-3xl font-bold mb-1">Chijindu Nwokeohuru</h3>
                                <div class="text-primary-blue font-mono text-sm uppercase tracking-wider">Founder & Lead Engineer</div>
                            </div>
                            
                            <div class="text-text-secondary leading-relaxed">
                                <p class="mb-3">
                                    Brain behind the vision. A result-driven Software Engineer with a passion for building scalable and efficient systems.
                                </p>                                
                            </div>

                            <div class="mt-8 pt-6 border-t border-border">
                                <div class="text-xs font-mono text-text-muted uppercase tracking-widest mb-3">Core Stack</div>
                                <div class="flex flex-wrap gap-2">
                                    <span class="font-mono text-[11px] px-3 py-1.5 rounded-full bg-bg-elevated border border-border text-text-primary">Python / FastAPI</span>
                                    <span class="font-mono text-[11px] px-3 py-1.5 rounded-full bg-bg-elevated border border-border text-text-primary">Laravel</span>
                                    <span class="font-mono text-[11px] px-3 py-1.5 rounded-full bg-bg-elevated border border-border text-text-primary">OpenAI / Anthropic APIs</span>
                                    <span class="font-mono text-[11px] px-3 py-1.5 rounded-full bg-bg-elevated border border-border text-text-primary">React & Vue</span>
                                    <span class="font-mono text-[11px] px-3 py-1.5 rounded-full bg-bg-elevated border border-border text-text-primary">Node.js</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-32 relative overflow-hidden bg-bg-surface">
            <div class="absolute inset-0 bg-primary-blue/5"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-primary-blue rounded-full blur-[120px] opacity-20 pointer-events-none"></div>
            
            <div class="container mx-auto px-6 relative z-10 text-center" v-motion-fade-visible>
                <h2 class="text-4xl font-bold mb-6">Join Our Technical Partners</h2>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto mb-10">We limit our client roster to ensure every project receives our full engineering focus.</p>
                <Link href="/contact" class="inline-block bg-primary-blue hover:bg-blue-700 text-white px-10 py-4 rounded-md font-medium text-lg transition-colors shadow-[0_0_20px_var(--color-primary-glow)]">
                    Inquire About Availability →
                </Link>
            </div>
        </section>
    </MainLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import MainLayout from '../../Components/Layout/MainLayout.vue';
</script>
