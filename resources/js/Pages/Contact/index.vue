<template>
    <MainLayout
        title="Contact - Forahia Solutions"
        description="Get in touch to discuss your architecture, software infrastructure, or digital products."
    >
        <!-- Hero Section -->
        <section class="relative pt-32 pb-16 border-b border-border overflow-hidden">
            <div class="absolute inset-0 bg-bg-surface opacity-50"></div>
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle at center, #94A3B8 1px, transparent 1px); background-size: 24px 24px;"></div>
            
            <div class="container mx-auto px-6 relative z-10 text-center" v-motion-fade-visible>
                <div class="inline-flex items-center space-x-2 bg-bg-elevated border border-border rounded-full px-4 py-1.5 text-sm text-text-secondary mb-6">
                    <span class="text-accent-teal font-mono">['./contact']</span>
                </div>
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Initiate Connection</h1>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                    Let's discuss how we can engineer the right software infrastructure for your business requirements.
                </p>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="py-24 relative">
            <div class="container mx-auto px-6 max-w-6xl">
                <div class="grid lg:grid-cols-5 gap-16">
                    <!-- Contact Info -->
                    <div class="lg:col-span-2 space-y-12" v-motion-fade-visible>
                        <div>
                            <h3 class="text-xs font-mono text-text-muted tracking-widest uppercase mb-4">Direct Contact</h3>
                            <div class="space-y-6">
                                <a href="mailto:info@forahia.com" class="flex items-start group">
                                    <div class="w-10 h-10 rounded-lg bg-bg-surface border border-border flex items-center justify-center mr-4 group-hover:border-primary-blue transition-colors">
                                        <svg class="w-5 h-5 text-text-secondary group-hover:text-primary-blue transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-medium text-text-primary">Email Us</div>
                                        <div class="text-text-secondary">info@forahia.com</div>
                                    </div>
                                </a>
                                
                                <div class="flex items-start group">
                                    <div class="w-10 h-10 rounded-lg bg-bg-surface border border-border flex items-center justify-center mr-4 group-hover:border-accent-teal transition-colors">
                                        <svg class="w-5 h-5 text-text-secondary group-hover:text-accent-teal transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-medium text-text-primary">Our Office</div>
                                        <div class="text-text-secondary">Abuja, Nigeria (Remote First)</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-8 border-t border-border">
                            <h3 class="text-xs font-mono text-text-muted tracking-widest uppercase mb-4">Availability</h3>
                            <div class="bg-bg-elevated border border-border rounded-lg p-6">
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="w-3 h-3 rounded-full bg-green-500 animate-pulse"></div>
                                    <div class="font-medium">Accepting New Projects</div>
                                </div>
                                <p class="text-sm text-text-secondary">Currently scheduling consultations for Q3/Q4 deployments.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="lg:col-span-3" v-motion-fade-visible>
                        <div class="bg-bg-elevated border border-border rounded-xl p-8 shadow-xl">
                            <h2 class="text-2xl font-bold mb-6">Send a Message</h2>
                            
                            <form @submit.prevent="submit" class="space-y-6">
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <label for="name" class="text-sm font-medium text-text-secondary">Full Name</label>
                                        <input 
                                            id="name"
                                            v-model="form.name"
                                            type="text" 
                                            class="w-full bg-bg-base border border-border rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-blue/50 focus:border-primary-blue transition-colors text-text-primary"
                                            placeholder="John Doe"
                                            required
                                        >
                                        <div v-if="form.errors.name" class="text-red-500 text-xs">{{ form.errors.name }}</div>
                                    </div>
                                    <div class="space-y-2">
                                        <label for="email" class="text-sm font-medium text-text-secondary">Email Address</label>
                                        <input 
                                            id="email"
                                            v-model="form.email"
                                            type="email" 
                                            class="w-full bg-bg-base border border-border rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-blue/50 focus:border-primary-blue transition-colors text-text-primary"
                                            placeholder="john@company.com"
                                            required
                                        >
                                        <div v-if="form.errors.email" class="text-red-500 text-xs">{{ form.errors.email }}</div>
                                    </div>
                                </div>
                                
                                <div class="space-y-2">
                                    <label for="subject" class="text-sm font-medium text-text-secondary">Subject / Project Type</label>
                                    <input 
                                        id="subject"
                                        v-model="form.subject"
                                        type="text" 
                                        class="w-full bg-bg-base border border-border rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-blue/50 focus:border-primary-blue transition-colors text-text-primary"
                                        placeholder="e.g. Healthcare Platform Architecture"
                                        required
                                    >
                                    <div v-if="form.errors.subject" class="text-red-500 text-xs">{{ form.errors.subject }}</div>
                                </div>
                                
                                <div class="space-y-2">
                                    <label for="message" class="text-sm font-medium text-text-secondary">Project Details</label>
                                    <textarea 
                                        id="message"
                                        v-model="form.message"
                                        rows="5" 
                                        class="w-full bg-bg-base border border-border rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-blue/50 focus:border-primary-blue transition-colors text-text-primary resize-none"
                                        placeholder="Tell us about your requirements, timeline, and challenges..."
                                        required
                                    ></textarea>
                                    <div v-if="form.errors.message" class="text-red-500 text-xs">{{ form.errors.message }}</div>
                                </div>
                                
                                <button 
                                    type="submit" 
                                    :disabled="form.processing"
                                    class="w-full bg-primary-blue hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed text-white px-8 py-4 rounded-md font-medium transition-colors shadow-[0_0_15px_var(--color-primary-glow)] flex justify-center items-center"
                                >
                                    <span v-if="form.processing">
                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        Transmitting...
                                    </span>
                                    <span v-else>Send Message</span>
                                </button>
                                
                                <div v-if="form.recentlySuccessful" class="p-4 bg-green-500/10 border border-green-500/30 rounded-md text-green-400 text-sm mt-4 text-center">
                                    Message received. We'll respond within 24 hours.
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </MainLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import MainLayout from '../../Components/Layout/MainLayout.vue';

const form = useForm({
    name: '',
    email: '',
    subject: '',
    message: ''
});

const submit = () => {
    form.post('/contact', {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};
</script>