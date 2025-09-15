<template>
    <section class="section-padding bg-primary">
            <div class="container-max">
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

                        <form class="space-y-6" id="contact-form">
                            <!-- Personal Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="firstName" class="block text-sm font-medium text-gray-300 mb-2">First Name *</label>
                                    <input type="text" id="firstName" name="firstName" required class="input-field bg-secondary border-gray-700 text-background placeholder-gray-400" />
                                </div>
                                <div>
                                    <label for="lastName" class="block text-sm font-medium text-gray-300 mb-2">Last Name *</label>
                                    <input type="text" id="lastName" name="lastName" required class="input-field bg-secondary border-gray-700 text-background placeholder-gray-400" />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address *</label>
                                    <input type="email" id="email" name="email" required class="input-field bg-secondary border-gray-700 text-background placeholder-gray-400" />
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-300 mb-2">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" class="input-field bg-secondary border-gray-700 text-background placeholder-gray-400" placeholder="+234" />
                                </div>
                            </div>

                            <!-- Company Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="company" class="block text-sm font-medium text-gray-300 mb-2">Company Name *</label>
                                    <input type="text" id="company" name="company" required class="input-field bg-secondary border-gray-700 text-background placeholder-gray-400" />
                                </div>
                                <div>
                                    <label for="position" class="block text-sm font-medium text-gray-300 mb-2">Your Position</label>
                                    <input type="text" id="position" name="position" class="input-field bg-secondary border-gray-700 text-background placeholder-gray-400" />
                                </div>
                            </div>

                            <!-- Project Details -->
                            <div>
                                <label for="projectType" class="block text-sm font-medium text-gray-300 mb-2">Project Type *</label>
                                <select id="projectType" name="projectType" required class="input-field bg-secondary border-gray-700 text-background">
                                    <option value>Select project type</option>
                                    <option value="web-development">Web Development</option>
                                    <option value="mobile-app">Mobile App Development</option>
                                    <option value="ui-ux-design">UI/UX Design</option>
                                    <option value="business-intelligence">Business Intelligence</option>
                                    <option value="digital-transformation">Complete Digital Transformation</option>
                                    <option value="consultation">Strategy Consultation</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="budget" class="block text-sm font-medium text-gray-300 mb-2">Budget Range</label>
                                    <select id="budget" name="budget" class="input-field bg-secondary border-gray-700 text-background">
                                        <option value>Select budget range</option>
                                        <option value="under-5m">Under ₦5M</option>
                                        <option value="5m-15m">₦5M - ₦15M</option>
                                        <option value="15m-50m">₦15M - ₦50M</option>
                                        <option value="50m-100m">₦50M - ₦100M</option>
                                        <option value="over-100m">Over ₦100M</option>
                                        <option value="discuss">Prefer to discuss</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="timeline" class="block text-sm font-medium text-gray-300 mb-2">Timeline</label>
                                    <select id="timeline" name="timeline" class="input-field bg-secondary border-gray-700 text-background">
                                        <option value>Select timeline</option>
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
                                <textarea id="message" name="message" rows="6" required class="input-field bg-secondary border-gray-700 text-background placeholder-gray-400" placeholder="Tell us about your project goals, current challenges, and what you hope to achieve..."></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn-primary w-full text-lg py-4 hover-lift">
                                Send Project Inquiry
                            </button>

                            <p class="text-sm text-gray-400 text-center">
                                We'll respond within 2 hours during business hours (8AM-6PM WAT)
                            </p>
                        </form>
                    </div>

                    <!-- Consultation Booking & Office Info -->
                    <div class="space-y-8">
                        <!-- Quick Consultation Booking -->
                        <div class="hero-card bg-gray-900/50 backdrop-blur-sm border border-gray-700">
                            <h3 class="text-2xl font-semibold text-background mb-6">Book a Consultation</h3>
                            <p class="text-gray-300 mb-6">
                                Schedule a free 30-minute consultation to discuss your project requirements and get expert recommendations.
                            </p>

                            <!-- Calendar Integration Placeholder -->
                            <div class="bg-secondary rounded-lg p-6 mb-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-lg font-semibold text-background">Available Times</h4>
                                    <span class="text-sm text-gray-400">December 2025</span>
                                </div>

                                <div class="grid grid-cols-2 gap-3">
                                    <button class="p-3 bg-accent/10 text-accent rounded-lg hover:bg-accent/20 transition-colors text-sm">
                                        Today 2:00 PM
                                    </button>
                                    <button class="p-3 bg-accent/10 text-accent rounded-lg hover:bg-accent/20 transition-colors text-sm">
                                        Today 4:00 PM
                                    </button>
                                    <button class="p-3 bg-accent/10 text-accent rounded-lg hover:bg-accent/20 transition-colors text-sm">
                                        Tomorrow 10:00 AM
                                    </button>
                                    <button class="p-3 bg-accent/10 text-accent rounded-lg hover:bg-accent/20 transition-colors text-sm">
                                        Tomorrow 3:00 PM
                                    </button>
                                </div>
                            </div>

                            <a href="javascript:void(0)" class="btn-primary w-full text-center hover-lift">
                                Schedule Free Consultation
                            </a>
                        </div>

                        <!-- Office Location -->
                        <div class="hero-card bg-gray-900/50 backdrop-blur-sm border border-gray-700">
                            <h3 class="text-2xl font-semibold text-background mb-6">Abuja Office</h3>

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
                                <div class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-accent mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <div>
                                        <p class="text-background font-medium">Address</p>
                                        <p class="text-gray-300">Plot 1422, Independence Avenue<br />Central Business District, Abuja, Nigeria</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3">
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
                                <li class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-accent mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span class="text-gray-300">Current business challenges and objectives</span>
                                </li>
                                <li class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-accent mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span class="text-gray-300">Existing technology stack and systems</span>
                                </li>
                                <li class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-accent mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span class="text-gray-300">Budget range and timeline expectations</span>
                                </li>
                                <li class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-accent mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span class="text-gray-300">Key stakeholders and decision makers</span>
                                </li>
                                <li class="flex items-start space-x-3">
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
