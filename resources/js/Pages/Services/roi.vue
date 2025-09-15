
<template>
    <section class="section-padding bg-secondary">
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

            <div class="max-w-4xl mx-auto">
                <div class="hero-card bg-gray-900/50 backdrop-blur-sm border border-gray-700">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Calculator Inputs -->
                        <div>
                            <h3 class="text-xl font-semibold text-background mb-6">Project Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Current Monthly Revenue ($)</label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></span>
                                        <input type="number" v-model.number="currentRevenue" class="input-field pl-7" placeholder="15,000" min="0" @input="validateInput" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Expected Growth (%)</label>
                                    <div class="relative">
                                        <input type="number" v-model.number="growthRate" class="input-field" placeholder="25" min="0" max="1000" @input="validateInput" />
                                        <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">%</span>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Project Investment ($)</label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></span>
                                        <input type="number" v-model.number="investment" class="input-field pl-7" placeholder="25,000" min="0" @input="validateInput" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Service Type</label>
                                    <select v-model="serviceType" class="input-field">
                                        <option value="web">Web Development</option>
                                        <option value="mobile">Mobile App</option>
                                        <option value="design">UI/UX Design</option>
                                        <option value="bi">Business Intelligence</option>
                                        <option value="ecommerce">E-Commerce Solution</option>
                                        <option value="enterprise">Enterprise Integration</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Industry</label>
                                    <select v-model="industry" class="input-field">
                                        <option value="retail">Retail/E-commerce</option>
                                        <option value="finance">Finance/Banking</option>
                                        <option value="healthcare">Healthcare</option>
                                        <option value="education">Education</option>
                                        <option value="technology">Technology</option>
                                        <option value="manufacturing">Manufacturing</option>
                                        <option value="logistics">Logistics/Supply Chain</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Projection Timeframe</label>
                                    <select v-model="timeframe" class="input-field" @change="calculateROI">
                                        <option value="6">6 Months</option>
                                        <option value="12">12 Months</option>
                                        <option value="24">24 Months</option>
                                        <option value="36">36 Months</option>
                                    </select>
                                </div>
                                <button @click="calculateROI" class="btn-primary w-full">Calculate ROI</button>
                            </div>
                        </div>

                        <!-- Results -->
                        <div>
                            <h3 class="text-xl font-semibold text-background mb-6">Projected Results</h3>
                            <div class="space-y-6">
                                <div class="bg-gray-800 rounded-lg p-4">
                                    <div class="text-sm text-gray-400 mb-1">Revenue Increase ({{ timeframe }} months)</div>
                                    <div class="text-2xl font-bold text-success">{{ formatNumber(yearlyIncrease) }}</div>
                                </div>
                                <div class="bg-gray-800 rounded-lg p-4">
                                    <div class="text-sm text-gray-400 mb-1">Cost Savings ({{ timeframe }} months)</div>
                                    <div class="text-2xl font-bold text-blue-400">{{ formatNumber(costSavings) }}</div>
                                </div>
                                <div class="bg-gray-800 rounded-lg p-4">
                                    <div class="text-sm text-gray-400 mb-1">Return on Investment</div>
                                    <div class="text-2xl font-bold text-accent">{{ roi.toFixed(1) }}%</div>
                                    <div class="relative w-full h-2.5 mt-2 bg-gray-700 rounded-full overflow-hidden">
                                        <div
                                            class="absolute top-0 left-0 h-full bg-gradient-to-r from-blue-500 to-green-500 rounded-full"
                                            :class="getROIWidthClass(roi)">
                                        </div>
                                    </div>
                                    <div class="flex justify-between text-xs text-gray-500 mt-1">
                                        <span>0%</span>
                                        <span>100%</span>
                                        <span>200%</span>
                                        <span>300%+</span>
                                    </div>
                                </div>
                                <div class="bg-gray-800 rounded-lg p-4">
                                    <div class="text-sm text-gray-400 mb-1">Payback Period</div>
                                    <div class="text-2xl font-bold text-purple-400">{{ paybackMonths.toFixed(1) }} months</div>
                                    <div class="relative w-full h-2.5 mt-2 bg-gray-700 rounded-full overflow-hidden">
                                        <div
                                            class="absolute top-0 left-0 h-full bg-gradient-to-r from-purple-500 to-pink-500 rounded-full"
                                            :class="getPaybackWidthClass(paybackMonths)">
                                        </div>
                                    </div>
                                    <div class="flex justify-between text-xs text-gray-500 mt-1">
                                        <span>24+ mo</span>
                                        <span>18 mo</span>
                                        <span>12 mo</span>
                                        <span>6 mo</span>
                                    </div>
                                </div>
                                <div class="bg-gray-800 rounded-lg p-4">
                                    <div class="text-sm text-gray-400 mb-1">Net Profit ({{ timeframe }} months)</div>
                                    <div class="text-2xl font-bold text-yellow-400">{{ formatNumber(netProfit) }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Full-width Key Insight Section -->
                        <div class="col-span-1 md:col-span-2 mt-8">
                            <div class="bg-gradient-to-r from-blue-900/50 to-teal-900/50 rounded-lg p-6 border border-blue-500/30">
                                <h4 class="font-bold text-white mb-2">Key Insight</h4>
                                <p class="text-gray-300">
                                    Your {{ serviceOptions[serviceType] || 'digital' }} investment could pay for itself in
                                    <span class="text-accent font-bold">{{ paybackMonths.toFixed(1) }} months</span> and deliver a
                                    <span class="text-accent font-bold">{{ roi.toFixed(1) }}%</span> return over {{ timeframe }} months.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, computed } from 'vue'

const currentRevenue = ref()
const growthRate = ref()
const investment = ref()
const serviceType = ref('')
const industry = ref('')
const timeframe = ref()

const yearlyIncrease = ref(0)
const roi = ref(0)
const paybackMonths = ref(0)
const netProfit = ref(0)
const costSavings = ref(0)

const industryMultipliers = {
    retail: 1.2,
    finance: 1.35,
    healthcare: 1.25,
    education: 1.15,
    technology: 1.4,
    manufacturing: 1.18,
    logistics: 1.22,
    other: 1.2
}

const serviceMultipliers = {
    web: 1.2,
    mobile: 1.4,
    design: 1.1,
    bi: 1.3,
    ecommerce: 1.25,
    enterprise: 1.35
}

const costSavingsRates = {
    web: 0.03,
    mobile: 0.02,
    design: 0.01,
    bi: 0.05,
    ecommerce: 0.04,
    enterprise: 0.06
}

const serviceOptions = {
    web: 'Web Development',
    mobile: 'Mobile App',
    design: 'UI/UX Design',
    bi: 'Business Intelligence',
    ecommerce: 'E-Commerce Solution',
    enterprise: 'Enterprise Integration'
}

const industryMultiplier = computed(() => {
    return industryMultipliers[industry.value] || 1.2
})

const serviceMultiplier = computed(() => {
    return serviceMultipliers[serviceType.value] || 1.2
})

function calculateROI() {
    // Get multipliers based on service type and industry
    const combinedMultiplier = serviceMultiplier.value * industryMultiplier.value

    // Calculate adjusted growth rate with multipliers
    const adjustedGrowthRate = growthRate.value * combinedMultiplier / 100

    // Calculate monthly and projected total revenue increases based on timeframe
    const monthlyIncrease = currentRevenue.value * adjustedGrowthRate
    const months = parseInt(timeframe.value)
    yearlyIncrease.value = monthlyIncrease * months

    // Calculate cost savings based on service type and timeframe
    const savingsRate = costSavingsRates[serviceType.value] || 0.02
    costSavings.value = currentRevenue.value * savingsRate * months

    // Calculate total benefit (revenue increase + cost savings)
    const totalBenefit = yearlyIncrease.value + costSavings.value

    // Calculate ROI percentage
    roi.value = ((totalBenefit - investment.value) / investment.value) * 100

    // Calculate payback period in months
    const monthlyBenefit = totalBenefit / months
    paybackMonths.value = investment.value / (monthlyBenefit || 1)

    // Calculate net profit for the selected timeframe
    netProfit.value = totalBenefit - investment.value
}

function formatNumber(num) {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
        maximumFractionDigits: 0
    }).format(num)
}

function validateInput() {
    // Ensure values are not negative
    if (currentRevenue.value < 0) currentRevenue.value = 0
    if (growthRate.value < 0) growthRate.value = 0
    if (investment.value < 0) investment.value = 0

    // Recalculate with new values
    calculateROI()
}

// Helper function that returns Tailwind classes for ROI bar width
function getROIWidthClass(value) {
    const normalizedValue = Math.min(value, 300)

    if (normalizedValue <= 25) return 'w-1/12'
    if (normalizedValue <= 50) return 'w-2/12'
    if (normalizedValue <= 75) return 'w-3/12'
    if (normalizedValue <= 100) return 'w-4/12'
    if (normalizedValue <= 125) return 'w-5/12'
    if (normalizedValue <= 150) return 'w-6/12'
    if (normalizedValue <= 175) return 'w-7/12'
    if (normalizedValue <= 200) return 'w-8/12'
    if (normalizedValue <= 225) return 'w-9/12'
    if (normalizedValue <= 250) return 'w-10/12'
    if (normalizedValue <= 275) return 'w-11/12'
    return 'w-full'
}

// Helper function that returns Tailwind classes for payback period bar width
function getPaybackWidthClass(months) {
    const percentage = Math.min(100 - (months/24)*100, 100)

    if (percentage <= 8) return 'w-1/12'
    if (percentage <= 16) return 'w-2/12'
    if (percentage <= 25) return 'w-3/12'
    if (percentage <= 33) return 'w-4/12'
    if (percentage <= 41) return 'w-5/12'
    if (percentage <= 50) return 'w-6/12'
    if (percentage <= 58) return 'w-7/12'
    if (percentage <= 66) return 'w-8/12'
    if (percentage <= 75) return 'w-9/12'
    if (percentage <= 83) return 'w-10/12'
    if (percentage <= 91) return 'w-11/12'
    return 'w-full'
}

// Calculate initial values
calculateROI()
</script>
