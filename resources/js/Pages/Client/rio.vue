<template>
    <section id="roi-calculator" class="section-padding bg-primary">
        <div class="container-max">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-background mb-6">
                    Calculate Your
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
                        ">Digital ROI
                    </span>
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Discover the potential return on investment for your digital transformation project
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
                <!-- ROI Calculator Form -->
                <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700">
                    <h3 class="text-2xl font-semibold text-background mb-6">Project Details</h3>
                    <form class="space-y-6" @submit.prevent="calculateROI">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Business Type</label>
                            <select v-model="formData.businessType" class="input-field bg-secondary text-background border-gray-600 focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all">
                                <option value="">Select your industry</option>
                                <option value="ecommerce">E-commerce</option>
                                <option value="fintech">Fintech</option>
                                <option value="healthcare">Healthcare</option>
                                <option value="education">Education</option>
                                <option value="manufacturing">Manufacturing</option>
                                <option value="logistics">Logistics</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Company Size</label>
                            <select v-model="formData.companySize" class="input-field bg-secondary text-background border-gray-600 focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all">
                                <option value="">Select company size</option>
                                <option value="startup">Startup (1-10 employees)</option>
                                <option value="small">Small (11-50 employees)</option>
                                <option value="medium">Medium (51-200 employees)</option>
                                <option value="large">Large (200+ employees)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Current Monthly Revenue ($)</label>
                            <input
                                v-model="formData.monthlyRevenue"
                                type="number"
                                class="input-field bg-secondary text-background border-gray-600 focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all"
                                placeholder="e.g., 50000"
                            />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Project Type</label>
                            <select v-model="formData.projectType" class="input-field bg-secondary text-background border-gray-600 focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all">
                                <option value="">Select project type</option>
                                <option value="website">Website Development</option>
                                <option value="mobile-app">Mobile App</option>
                                <option value="ecommerce-platform">E-commerce Platform</option>
                                <option value="business-intelligence">Business Intelligence</option>
                                <option value="full-transformation">Full Digital Transformation</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Expected Timeline</label>
                            <select v-model="formData.timeline" class="input-field bg-secondary text-background border-gray-600 focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all">
                                <option value="">Select timeline</option>
                                <option value="3">3 months</option>
                                <option value="6">6 months</option>
                                <option value="12">12 months</option>
                                <option value="18">18+ months</option>
                            </select>
                        </div>

                        <button type="submit" class="btn-primary w-full hover-lift transition-all duration-300">
                            Calculate ROI Potential
                        </button>
                    </form>
                </div>

                <!-- ROI Results -->
                <div class="card bg-gray-900/50 backdrop-blur-sm border border-gray-700">
                    <div v-if="!showResults" class="text-center py-12">
                        <div class="w-16 h-16 bg-accent/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-background mb-2">Ready to Calculate?</h3>
                        <p class="text-gray-400">Fill out the form to see your personalized ROI projection</p>
                    </div>

                    <div v-else>
                        <h3 class="text-2xl font-semibold text-background mb-6">Your ROI Projection</h3>

                        <div class="space-y-6">
                            <!-- Main ROI Metrics -->
                            <div class="grid grid-cols-2 gap-4">
                                <div class="text-center p-4 bg-accent/10 rounded-lg border border-accent/20">
                                    <div class="text-2xl font-bold text-accent mb-2">{{ roiData.percentage }}%</div>
                                    <div class="text-gray-400 text-sm">Expected ROI</div>
                                </div>
                                <div class="text-center p-4 bg-success/10 rounded-lg border border-success/20">
                                    <div class="text-2xl font-bold text-success mb-2">{{ roiData.paybackPeriod }}</div>
                                    <div class="text-gray-400 text-sm">Payback Period</div>
                                </div>
                            </div>

                            <!-- Financial Details -->
                            <div class="space-y-4">
                                <div class="flex justify-between items-center py-2 border-b border-gray-700">
                                    <span class="text-gray-300">Investment Range:</span>
                                    <span class="text-background font-semibold">${{ roiData.investmentRange }}</span>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-gray-700">
                                    <span class="text-gray-300">Expected Annual Return:</span>
                                    <span class="text-success font-semibold">${{ roiData.annualReturn }}</span>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-gray-700">
                                    <span class="text-gray-300">Break-even Timeline:</span>
                                    <span class="text-accent font-semibold">{{ roiData.breakEven }}</span>
                                </div>
                            </div>

                            <!-- Benefits List -->
                            <div class="bg-gray-800/50 p-4 rounded-lg border border-gray-700">
                                <h4 class="text-lg font-semibold text-background mb-3">Key Benefits Include:</h4>
                                <ul class="space-y-2 text-gray-300">
                                    <li v-for="benefit in roiData.benefits" :key="benefit" class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-success flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                        <span>{{ benefit }}</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-col sm:flex-row gap-3">
                                <a href="/contact" class="btn-primary flex-1 text-center hover-lift">
                                    Get Detailed Proposal
                                </a>
                                <button @click="resetCalculator" class="btn-secondary flex-1">
                                    Recalculate
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, reactive } from 'vue'

const showResults = ref(false)

const formData = reactive({
    businessType: '',
    companySize: '',
    monthlyRevenue: '',
    projectType: '',
    timeline: ''
})

const roiData = reactive({
    percentage: 0,
    paybackPeriod: '',
    investmentRange: '',
    annualReturn: '',
    breakEven: '',
    benefits: []
})

const calculateROI = () => {
    // Validate form
    if (!formData.businessType || !formData.companySize || !formData.monthlyRevenue || !formData.projectType || !formData.timeline) {
        alert('Please fill in all fields to calculate ROI')
        return
    }

    // Calculate ROI based on form data
    const revenue = parseFloat(formData.monthlyRevenue)
    const timeline = parseInt(formData.timeline)

    // Base calculations
    let baseROI = 0
    let investmentMin = 0
    let investmentMax = 0

    // Adjust based on project type
    switch (formData.projectType) {
        case 'website':
            baseROI = 200
            investmentMin = revenue * 0.1
            investmentMax = revenue * 0.3
            break
        case 'mobile-app':
            baseROI = 250
            investmentMin = revenue * 0.2
            investmentMax = revenue * 0.5
            break
        case 'ecommerce-platform':
            baseROI = 300
            investmentMin = revenue * 0.3
            investmentMax = revenue * 0.6
            break
        case 'business-intelligence':
            baseROI = 180
            investmentMin = revenue * 0.15
            investmentMax = revenue * 0.4
            break
        case 'full-transformation':
            baseROI = 400
            investmentMin = revenue * 0.5
            investmentMax = revenue * 1.2
            break
    }

    // Adjust based on company size
    switch (formData.companySize) {
        case 'startup':
            baseROI *= 1.2
            break
        case 'small':
            baseROI *= 1.1
            break
        case 'medium':
            baseROI *= 1.0
            break
        case 'large':
            baseROI *= 0.9
            break
    }

    // Adjust based on timeline
    if (timeline <= 3) baseROI *= 1.1
    else if (timeline >= 18) baseROI *= 0.9

    // Calculate derived values
    const avgInvestment = (investmentMin + investmentMax) / 2
    const annualReturn = (revenue * 12 * (baseROI / 100))
    const paybackMonths = Math.ceil((avgInvestment / (revenue * (baseROI / 100))) * 12)

    // Update ROI data
    roiData.percentage = Math.round(baseROI)
    roiData.paybackPeriod = `${paybackMonths} months`
    roiData.investmentRange = `${Math.round(investmentMin / 1000)}K - $${Math.round(investmentMax / 1000)}K`
    roiData.annualReturn = `${Math.round(annualReturn / 1000)}K - $${Math.round(annualReturn * 1.2 / 1000)}K`
    roiData.breakEven = `${Math.max(3, paybackMonths - 2)}-${paybackMonths + 2} months`

    // Set benefits based on project type
    roiData.benefits = [
        'Increased operational efficiency',
        'Enhanced customer experience',
        'Competitive market advantage',
        'Streamlined business processes',
        'Data-driven decision making',
        'Improved scalability'
    ]

    showResults.value = true
}

const resetCalculator = () => {
    showResults.value = false
    Object.keys(formData).forEach(key => {
        formData[key] = ''
    })
}
</script>
