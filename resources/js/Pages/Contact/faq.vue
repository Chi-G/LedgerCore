<template>
    <section class="section-padding bg-secondary">
        <div class="container-max">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-background mb-6">
                    Frequently Asked
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
                        ">Questions
                    </span>
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Quick answers to common questions about our consultation process and services
                </p>
            </div>

            <div class="max-w-4xl mx-auto space-y-6">
                <div
                    v-for="(faq, idx) in faqs"
                    :key="idx"
                    class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700"
                >
                    <button
                        class="w-full text-left flex items-center justify-between p-6 focus:outline-none"
                        @click="toggleFAQ(idx)"
                    >
                        <h3 class="text-lg font-semibold text-background">{{ faq.question }}</h3>
                        <svg
                            class="w-5 h-5 text-accent transform transition-transform"
                            :class="{ 'rotate-180': openFAQ === idx }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div v-show="openFAQ === idx" class="px-6 pb-6">
                        <p class="text-gray-300">
                            {{ faq.answer }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue'

const faqs = [
    {
        question: 'How quickly can we start working together?',
        answer: 'After our initial consultation, we can typically begin project work within 1-2 weeks. For urgent projects, we offer expedited onboarding with dedicated resources available within 48-72 hours.'
    },
    {
        question: 'What happens during the free consultation?',
        answer: 'We\'ll discuss your business objectives, current challenges, and technical requirements. You\'ll receive a preliminary project roadmap, technology recommendations, and estimated timeline and budget ranges. No commitment required.'
    },
    {
        question: 'Do you work with companies outside Abuja?',
        answer: 'Absolutely! We serve clients across Nigeria and internationally. We offer remote collaboration tools, video consultations, and can arrange travel for project kickoffs and key milestones when needed.'
    },
    {
        question: 'What information should I prepare before contacting you?',
        answer: 'Having a clear understanding of your business goals, current challenges, budget range, and timeline will help us provide more accurate recommendations. However, we\'re happy to help you define these during our consultation.'
    }
]

const openFAQ = ref(null)
function toggleFAQ(idx) {
    openFAQ.value = openFAQ.value === idx ? null : idx
}
</script>
