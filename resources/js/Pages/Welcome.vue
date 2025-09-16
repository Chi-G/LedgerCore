<template>
    <MainLayout
        title="Forahia Digital Innovation - Where Innovation Meets Execution"
        description="Premium digital innovation consultancy transforming Nigerian businesses"
    >

        <HeroSection />
        <ServicesSection />
        <ClientLogos />
        <FeaturedCaseStudy />
        <CTASection />
    </MainLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import MainLayout from '../Components/Layout/MainLayout.vue'
import HeroSection from '../Pages/Home/hero.vue'
import ServicesSection from '../Pages/Home/services.vue'
import ClientLogos from '../Pages/Home/clientlogo.vue'
import FeaturedCaseStudy from '../Pages/Home/featured.vue'
import CTASection from '../Pages/Home/cta.vue'


const showSplash = ref(true)
onMounted(() => {
    setTimeout(() => {
        showSplash.value = false
    }, 2000)

    // Fade-in on scroll: add 'visible' when elements intersect
    const fadeEls = document.querySelectorAll('.fade-in')
    if (fadeEls.length) {
        const fadeObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) entry.target.classList.add('visible')
            })
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' })
        fadeEls.forEach((el) => fadeObserver.observe(el))
    }

    // Counter animation similar to vanilla
    function animateCounter(el, target, duration = 2000) {
        let start = 0
        const increment = target / (duration / 16)
        function tick() {
            start += increment
            if (start < target) {
                el.textContent = Math.floor(start).toLocaleString()
                requestAnimationFrame(tick)
            } else {
                el.textContent = target.toLocaleString()
            }
        }
        tick()
    }
    const counters = document.querySelectorAll('[id$="-counter"]')
    if (counters.length) {
        const counterObserver = new IntersectionObserver((entries, obs) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return
                const el = entry.target
                const text = el.textContent || ''
                if (text.includes('$')) {
                    el.textContent = '$5M+'
                } else if (text.includes('+')) {
                    const number = parseInt(text.replace(/[^0-9]/g, ''))
                    if (!Number.isNaN(number)) {
                        animateCounter(el, number)
                        el.textContent += '+'
                    }
                }
                obs.unobserve(el)
            })
        }, { threshold: 0.5 })
        counters.forEach((el) => counterObserver.observe(el))
    }
})
</script>
