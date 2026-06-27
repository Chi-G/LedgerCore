<template>
    <MainLayout
        title="Services - Forahia Solutions"
        description="Engineering services across backend, frontend, AI integration, and DevOps."
    >
        <!-- Hero Section -->
        <section class="relative pt-32 pb-20 border-b border-border overflow-hidden">
            <div class="absolute inset-0 bg-bg-surface opacity-50"></div>
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle at center, #94A3B8 1px, transparent 1px); background-size: 24px 24px;"></div>
            
            <div class="container mx-auto px-6 relative z-10 text-center" v-motion-fade-visible>
                <div class="inline-flex items-center space-x-2 bg-bg-elevated border border-border rounded-full px-4 py-1.5 text-sm text-text-secondary mb-6">
                    <span class="text-accent-teal font-mono">['./services']</span>
                </div>
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Engineering Capabilities</h1>
                <p class="text-lg text-text-secondary max-w-3xl mx-auto">
                    We deliver end-to-end technical solutions. From complex API architecture to highly interactive user interfaces and secure cloud deployments.
                </p>
            </div>
        </section>

        <!-- Services Accordion Section -->
        <section class="py-24 border-b border-border relative">
            <div class="container mx-auto px-6 max-w-4xl">
                <div class="space-y-4">
                    <div 
                        v-for="(service, index) in services" 
                        :key="index"
                        class="border border-border bg-bg-surface rounded-xl overflow-hidden transition-colors"
                        :class="{ 'border-primary-blue/50': openIndex === index }"
                        v-motion-fade-visible
                    >
                        <!-- Accordion Header -->
                        <button 
                            @click="toggleAccordion(index)"
                            class="w-full px-8 py-6 flex items-center justify-between text-left focus:outline-none"
                        >
                            <div class="flex items-center space-x-6">
                                <span class="font-mono text-primary-blue opacity-70">0{{ index + 1 }}</span>
                                <h3 class="text-xl md:text-2xl font-bold text-text-primary">{{ service.title }}</h3>
                            </div>
                            <span class="text-text-secondary transition-transform duration-300" :class="{ 'rotate-180 text-primary-blue': openIndex === index }">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </button>
                        
                        <!-- Accordion Body -->
                        <div 
                            v-show="openIndex === index"
                            class="px-8 pb-8 pt-2"
                        >
                            <div class="pl-14 border-l-2 border-border/50 ml-[11px]">
                                <p class="text-text-secondary mb-6 text-lg">{{ service.description }}</p>
                                
                                <div class="grid md:grid-cols-2 gap-6 mb-8">
                                    <ul class="space-y-3">
                                        <li v-for="(feature, fIndex) in service.features.slice(0, 3)" :key="fIndex" class="flex items-start">
                                            <svg class="w-5 h-5 text-accent-teal mr-3 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span class="text-text-primary">{{ feature }}</span>
                                        </li>
                                    </ul>
                                    <ul class="space-y-3">
                                        <li v-for="(feature, fIndex) in service.features.slice(3, 6)" :key="fIndex" class="flex items-start">
                                            <svg class="w-5 h-5 text-accent-teal mr-3 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span class="text-text-primary">{{ feature }}</span>
                                        </li>
                                    </ul>
                                </div>
                                
                                <div>
                                    <h4 class="text-sm font-mono text-text-muted mb-3 uppercase tracking-wider">Tech Stack</h4>
                                    <div class="flex flex-wrap gap-2">
                                        <span v-for="tech in service.tech" :key="tech" class="font-mono text-xs px-3 py-1.5 rounded-full bg-bg-elevated border border-border text-text-secondary">
                                            {{ tech }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tech Stack Marquee (Optional subtle tech representation) -->
        <section class="py-16 border-b border-border overflow-hidden bg-bg-elevated opacity-60">
            <div class="flex space-x-12 animate-marquee whitespace-nowrap">
                <span v-for="i in 3" :key="i" class="flex space-x-12 text-xl font-mono text-text-muted">
                    <span>Laravel</span> <span>Vue.js</span> <span>React</span> <span>Python</span> <span>PostgreSQL</span> <span>Redis</span> <span>AWS</span> <span>Docker</span> <span>NativePHP</span>
                </span>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-32 relative overflow-hidden bg-bg-surface">
            <div class="absolute inset-0 bg-primary-blue/5"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-primary-blue rounded-full blur-[120px] opacity-20 pointer-events-none"></div>
            
            <div class="container mx-auto px-6 relative z-10 text-center" v-motion-fade-visible>
                <h2 class="text-4xl font-bold mb-6">Need a Custom Solution?</h2>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto mb-10">We build software that scales securely. Contact us to discuss your architectural requirements.</p>
                <Link href="/contact" class="inline-block bg-primary-blue hover:bg-blue-700 text-white px-10 py-4 rounded-md font-medium text-lg transition-colors shadow-[0_0_20px_var(--color-primary-glow)]">
                    Schedule a Consultation →
                </Link>
            </div>
        </section>
    </MainLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import MainLayout from '../../Components/Layout/MainLayout.vue';

const openIndex = ref(0);

function toggleAccordion(index) {
    if (openIndex.value === index) {
        openIndex.value = -1;
    } else {
        openIndex.value = index;
    }
}

const services = [
    {
        title: 'Backend Engineering & APIs',
        description: 'We architect highly scalable, secure, and performant backend systems tailored to handle heavy traffic and complex business logic.',
        features: [
            'RESTful & GraphQL API Design',
            'Database Architecture & Optimization',
            'Microservices & Serverless',
            'Payment Gateway Integrations',
            'Real-time WebSockets',
            'Legacy System Refactoring'
        ],
        tech: ['Laravel', 'PHP', 'Python', 'Node.js', 'PostgreSQL', 'Redis']
    },
    {
        title: 'Frontend & Mobile Engineering',
        description: 'Delivering exceptional user experiences through highly interactive, accessible, and blazing fast frontend applications and mobile apps.',
        features: [
            'Single Page Applications (SPAs)',
            'Server-Side Rendering (SSR)',
            'Progressive Web Apps (PWAs)',
            'Cross-platform Mobile Apps',
            'State Management Architecture',
            'Web Performance Optimization'
        ],
        tech: ['Vue.js', 'React', 'TypeScript', 'Tailwind CSS', 'Flutter', 'NativePHP']
    },
    {
        title: 'AI & LLM Integration',
        description: 'Supercharge your business operations by integrating cutting-edge AI models, custom RAG pipelines, and intelligent automation.',
        features: [
            'Custom RAG Pipelines',
            'LLM API Integration (OpenAI/Anthropic)',
            'Conversational Agents & Chatbots',
            'Automated Data Processing',
            'Semantic Search Implementation',
            'AI-Driven Analytics'
        ],
        tech: ['Python', 'LangChain', 'Pinecone', 'OpenAI API']
    },
    {
        title: 'DevOps & Cloud Infrastructure',
        description: 'Ensure your applications are highly available, secure, and easily deployable with our robust DevOps practices and cloud management.',
        features: [
            'CI/CD Pipeline Setup',
            'Docker Containerization',
            'AWS/GCP/Azure Architecture',
            'Infrastructure as Code (IaC)',
            'Security & Compliance Audits',
            '24/7 Monitoring & Alerting'
        ],
        tech: ['AWS', 'Docker', 'GitHub Actions', 'Terraform', 'Linux']
    }
];
</script>

<style scoped>
@keyframes marquee {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}
.animate-marquee {
  animation: marquee 20s linear infinite;
}
</style>
