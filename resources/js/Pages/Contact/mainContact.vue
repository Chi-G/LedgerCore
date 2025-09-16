<template>
    <section class="section-padding bg-primary relative">
        <!-- Submitting overlay -->
        <div
            v-if="isSubmitting"
            class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm flex items-center justify-center"
            aria-live="polite"
            aria-busy="true"
        >
            <div class="bg-gray-900/80 border border-gray-700 rounded-lg px-6 py-4 flex items-center space-x-3 text-background">
                <svg class="animate-spin h-5 w-5 text-accent" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v3a5 5 0 00-5 5H4z"></path>
                </svg>
                <span>Submitting your inquiry...</span>
            </div>
        </div>

        <div class="container-max" :aria-busy="isSubmitting">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <!-- Contact Form -->
                <div>
                    <h2 class="text-4xl font-bold text-background mb-6">
                        Start Your
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
                            ">Digital Transformation
                        </span>
                    </h2>
                    <p class="text-xl text-gray-300 mb-8">
                        Tell us about your project and we'll provide a customized solution proposal within 24 hours.
                    </p>

                    <form @submit.prevent="submitForm" class="space-y-6">
                        <fieldset :disabled="isSubmitting" class="space-y-6">
                            <!-- Personal Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="firstName" class="block text-sm font-medium text-gray-300 mb-2">First Name *</label>
                                    <input
                                        v-model="form.firstName"
                                        type="text"
                                        id="firstName"
                                        name="firstName"
                                        required
                                        class="input-field bg-secondary border-gray-700 text-background placeholder-gray-400 focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all"
                                        :class="{ 'border-red-500': errors.firstName }"
                                    />
                                    <span v-if="errors.firstName" class="text-red-400 text-sm mt-1">{{ errors.firstName }}</span>
                                </div>
                                <div>
                                    <label for="lastName" class="block text-sm font-medium text-gray-300 mb-2">Last Name *</label>
                                    <input
                                        v-model="form.lastName"
                                        type="text"
                                        id="lastName"
                                        name="lastName"
                                        required
                                        class="input-field bg-secondary border-gray-700 text-background placeholder-gray-400 focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all"
                                        :class="{ 'border-red-500': errors.lastName }"
                                    />
                                    <span v-if="errors.lastName" class="text-red-400 text-sm mt-1">{{ errors.lastName }}</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address *</label>
                                    <input
                                        v-model="form.email"
                                        type="email"
                                        id="email"
                                        name="email"
                                        required
                                        class="input-field bg-secondary border-gray-700 text-background placeholder-gray-400 focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all"
                                        :class="{ 'border-red-500': errors.email }"
                                    />
                                    <span v-if="errors.email" class="text-red-400 text-sm mt-1">{{ errors.email }}</span>
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-300 mb-2">Phone Number</label>
                                    <input
                                        v-model="form.phone"
                                        type="tel"
                                        id="phone"
                                        name="phone"
                                        class="input-field bg-secondary border-gray-700 text-background placeholder-gray-400 focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all"
                                        placeholder="+1 (555) 123-4567"
                                    />
                                </div>
                            </div>

                            <!-- Company Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="company" class="block text-sm font-medium text-gray-300 mb-2">Company Name *</label>
                                    <input
                                        v-model="form.company"
                                        type="text"
                                        id="company"
                                        name="company"
                                        required
                                        class="input-field bg-secondary border-gray-700 text-background placeholder-gray-400 focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all"
                                        :class="{ 'border-red-500': errors.company }"
                                    />
                                    <span v-if="errors.company" class="text-red-400 text-sm mt-1">{{ errors.company }}</span>
                                </div>
                                <div>
                                    <label for="position" class="block text-sm font-medium text-gray-300 mb-2">Your Position</label>
                                    <input
                                        v-model="form.position"
                                        type="text"
                                        id="position"
                                        name="position"
                                        class="input-field bg-secondary border-gray-700 text-background placeholder-gray-400 focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all"
                                    />
                                </div>
                            </div>

                            <!-- Project Details -->
                            <div>
                                <label for="projectType" class="block text-sm font-medium text-gray-300 mb-2">Project Type *</label>
                                <select
                                    v-model="form.projectType"
                                    id="projectType"
                                    name="projectType"
                                    required
                                    class="input-field bg-secondary border-gray-700 text-background focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all"
                                    :class="{ 'border-red-500': errors.projectType }"
                                >
                                    <option value="">Select project type</option>
                                    <option value="web-development">Web Development</option>
                                    <option value="mobile-app">Mobile App Development</option>
                                    <option value="ui-ux-design">UI/UX Design</option>
                                    <option value="business-intelligence">Business Intelligence</option>
                                    <option value="digital-transformation">Complete Digital Transformation</option>
                                    <option value="consultation">Strategy Consultation</option>
                                    <option value="other">Other</option>
                                </select>
                                <span v-if="errors.projectType" class="text-red-400 text-sm mt-1">{{ errors.projectType }}</span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="budget" class="block text-sm font-medium text-gray-300 mb-2">Budget Range</label>
                                    <select
                                        v-model="form.budget"
                                        id="budget"
                                        name="budget"
                                        class="input-field bg-secondary border-gray-700 text-background focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all"
                                    >
                                        <option value="">Select budget range</option>
                                        <option value="under-5k">Under $5K</option>
                                        <option value="5k-15k">$5K - $15K</option>
                                        <option value="15k-50k">$15K - $50K</option>
                                        <option value="50k-100k">$50K - $100K</option>
                                        <option value="over-100k">Over $100K</option>
                                        <option value="discuss">Prefer to discuss</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="timeline" class="block text-sm font-medium text-gray-300 mb-2">Timeline</label>
                                    <select
                                        v-model="form.timeline"
                                        id="timeline"
                                        name="timeline"
                                        class="input-field bg-secondary border-gray-700 text-background focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all"
                                    >
                                        <option value="">Select timeline</option>
                                        <option value="asap">ASAP</option>
                                        <option value="1-3-months">1-3 months</option>
                                        <option value="3-6-months">3-6 months</option>
                                        <option value="6-12-months">6-12 months</option>
                                        <option value="flexible">Flexible</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Project Description -->
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-300 mb-2">Project Description *</label>
                                <textarea
                                    v-model="form.message"
                                    id="message"
                                    name="message"
                                    rows="6"
                                    required
                                    class="input-field bg-secondary border-gray-700 text-background placeholder-gray-400 focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all"
                                    placeholder="Tell us about your project goals, current challenges, and what you hope to achieve..."
                                    :class="{ 'border-red-500': errors.message }"
                                ></textarea>
                                <span v-if="errors.message" class="text-red-400 text-sm mt-1">{{ errors.message }}</span>
                            </div>

                            <!-- Submit Button -->
                            <button
                                type="submit"
                                class="btn-primary w-full text-lg py-4 hover-lift transition-all duration-300"
                                :disabled="isSubmitting"
                                :class="{ 'opacity-50 cursor-not-allowed': isSubmitting }"
                            >
                                <span v-if="isSubmitting" class="flex items-center justify-center">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Sending...
                                </span>
                                <span v-else>Send Project Inquiry</span>
                            </button>
                        </fieldset>
                        <p class="text-sm text-gray-400 text-center">
                            We'll respond within 2 hours during business hours (8AM-6PM WAT)
                        </p>
                    </form>
                </div>

                <!-- Rest of the component remains the same -->
                <div class="space-y-8">
                    <!-- Quick Consultation Booking -->
                    <div class="hero-card bg-gray-900/50 backdrop-blur-sm border border-gray-700">
                        <h3 class="text-2xl font-semibold text-background mb-6">Book a Consultation</h3>
                        <p class="text-gray-300 mb-6">
                            Schedule a free 30-minute consultation to discuss your project requirements and get expert recommendations.
                        </p>

                        <!-- Calendly Integration -->
                        <div class="bg-secondary rounded-lg p-6 mb-6">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-accent/10 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-background mb-2">Schedule Your Free Consultation</h4>
                                <p class="text-gray-400 mb-4">Choose a time that works best for you</p>

                                <!-- Calendly Widget -->
                                <div class="calendly-inline-widget"
                                     data-url="https://calendly.com/forahia/30min"
                                     style="min-width:320px;height:630px;">
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <p class="text-sm text-gray-400 mb-4">
                                Can't find a suitable time? <a href="mailto:contact@forahia.org.ng" class="text-accent hover:underline">Contact us directly</a>
                            </p>
                        </div>
                    </div>

                    <!-- Office Location -->
                    <div class="hero-card bg-gray-900/50 backdrop-blur-sm border border-gray-700">
                        <h3 class="text-2xl font-semibold text-background mb-6">Global Headquarters</h3>

                        <!-- Map Placeholder -->
                        <div class="bg-secondary rounded-lg h-48 mb-6 flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-12 h-12 text-accent mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <p class="text-gray-400">Interactive Map</p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-start space-x-2">
                                <svg class="w-5 h-5 text-accent mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <div>
                                    <p class="text-background font-medium">Address</p>
                                    <p class="text-gray-300">Independence Avenue Central Business District<br />Abuja, Nigeria</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-2">
                                <svg class="w-5 h-5 text-accent mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div>
                                    <p class="text-background font-medium">Office Hours</p>
                                    <p class="text-gray-300">Monday - Friday: 8:00 AM - 6:00 PM WAT<br />Saturday: 10:00 AM - 2:00 PM WAT</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Consultation Preparation -->
                    <div class="hero-card bg-gray-900/50 backdrop-blur-sm border border-gray-700">
                        <h3 class="text-2xl font-semibold text-background mb-6">Prepare for Your Consultation</h3>
                        <p class="text-gray-300 mb-6">
                            To make our meeting more productive, please prepare the following information:
                        </p>

                        <ul class="space-y-3">
                            <li class="flex items-start space-x-2">
                                <svg class="w-5 h-5 text-accent mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-300">Current business challenges and objectives</span>
                            </li>
                            <li class="flex items-start space-x-2">
                                <svg class="w-5 h-5 text-accent mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-300">Existing technology stack and systems</span>
                            </li>
                            <li class="flex items-start space-x-2">
                                <svg class="w-5 h-5 text-accent mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-300">Budget range and timeline expectations</span>
                            </li>
                            <li class="flex items-start space-x-2">
                                <svg class="w-5 h-5 text-accent mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-300">Key stakeholders and decision makers</span>
                            </li>
                            <li class="flex items-start space-x-2">
                                <svg class="w-5 h-5 text-accent mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-300">Success metrics and KPIs</span>
                            </li>
                        </ul>

                        <div class="mt-6 p-4 bg-accent/10 rounded-lg">
                            <p class="text-accent text-sm">
                                <strong>Pro Tip:</strong> Complete our Digital Assessment Tool before the meeting for personalized recommendations.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'
import { useForm } from '@inertiajs/vue3'

const isSubmitting = ref(false)
const errors = ref({})

const form = useForm({
    firstName: '',
    lastName: '',
    email: '',
    phone: '',
    company: '',
    position: '',
    projectType: '',
    budget: '',
    timeline: '',
    message: ''
})

const submitForm = async () => {
    isSubmitting.value = true
    errors.value = {}

    try {
        await form.post('/contact', {
            onSuccess: (page) => {
                // Show success toast
                showToast('success', 'Thank you for your inquiry! We\'ll get back to you within 2 hours during business hours.')

                // Reset form
                form.reset()
            },
            onError: (errors) => {
                // Show error toast
                showToast('error', 'Please correct the errors below and try again.')
                errors.value = errors
            },
            onFinish: () => {
                isSubmitting.value = false
            }
        })
    } catch (error) {
        console.error('Form submission error:', error)
        showToast('error', 'Sorry, there was an error submitting your form. Please try again.')
        isSubmitting.value = false
    }
}

const showToast = (type, message) => {
    // Create toast element
    const toast = document.createElement('div')
    toast.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg max-w-sm transform transition-all duration-300 ${
        type === 'success'
            ? 'bg-green-500 text-white'
            : 'bg-red-500 text-white'
    }`

    toast.innerHTML = `
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                ${type === 'success'
                    ? '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>'
                    : '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>'
                }
            </svg>
            <span>${message}</span>
            <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-white hover:text-gray-200">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>
    `

    // Add to page
    document.body.appendChild(toast)

    // Animate in
    setTimeout(() => {
        toast.style.transform = 'translateX(0)'
    }, 100)

    // Auto remove after 5 seconds
    setTimeout(() => {
        toast.style.transform = 'translateX(100%)'
        setTimeout(() => {
            if (toast.parentElement) {
                toast.parentElement.removeChild(toast)
            }
        }, 300)
    }, 5000)
}

// Ensure Calendly assets are present and init inline widget
const ensureCalendlyAssetsLoaded = () => new Promise((resolve) => {
    if (window.Calendly) return resolve()

    if (!document.querySelector('link[data-calendly-css]')) {
        const link = document.createElement('link')
        link.setAttribute('rel', 'stylesheet')
        link.setAttribute('href', 'https://assets.calendly.com/assets/external/widget.css')
        link.setAttribute('data-calendly-css', 'true')
        document.head.appendChild(link)
    }

    const script = document.createElement('script')
    script.src = 'https://assets.calendly.com/assets/external/widget.js'
    script.async = true
    script.onload = () => resolve()
    document.body.appendChild(script)
})

onMounted(() => {
    ensureCalendlyAssetsLoaded().then(() => {
        const container = document.querySelector('.calendly-inline-widget')
        if (container && window.Calendly && window.Calendly.initInlineWidget) {
            window.Calendly.initInlineWidget({
                url: 'https://calendly.com/forahia/30min',
                parentElement: container
            })
        }
    })

    // Check for success/error messages from server
    const urlParams = new URLSearchParams(window.location.search)
    if (urlParams.get('success')) {
        showToast('success', 'Thank you for your inquiry! We\'ll get back to you within 2 hours during business hours.')
    }
    if (urlParams.get('error')) {
        showToast('error', 'Sorry, there was an error submitting your form. Please try again.')
    }
})
</script>
