<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use App\Models\PortfolioProject;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class AdminContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Portfolio Projects
        PortfolioProject::create([
            'title' => 'Modern Real Estate Platform',
            'description' => 'A comprehensive real estate platform with advanced search, virtual tours, and property management features.',
            'industry' => 'real-estate',
            'complexity' => 'complex',
            'image' => 'portfolio/realestate-hero.jpg',
            'fallback_image' => 'portfolio/realestate-fallback.jpg',
            'metrics' => [
                ['value' => '150%', 'label' => 'Increase in Property Views'],
                ['value' => '45%', 'label' => 'Faster Search Results'],
                ['value' => '300+', 'label' => 'Properties Listed'],
            ],
            'tech_stack' => [
                ['technology' => 'Laravel'],
                ['technology' => 'Vue.js'],
                ['technology' => 'MySQL'],
                ['technology' => 'AWS S3'],
                ['technology' => 'Stripe API'],
            ],
            'color' => 'green-400',
            'case_study_content' => '<h2>Project Overview</h2><p>This modern real estate platform revolutionized how properties are searched, viewed, and managed online.</p><h3>Key Features</h3><ul><li>Advanced property search with filters</li><li>Virtual tour integration</li><li>Property management dashboard</li><li>Integrated payment processing</li></ul>',
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 1,
        ]);

        PortfolioProject::create([
            'title' => 'Healthcare Management System',
            'description' => 'A complete healthcare management solution for clinics and hospitals with patient records, appointments, and billing.',
            'industry' => 'healthcare',
            'complexity' => 'enterprise',
            'image' => 'portfolio/healthcare-hero.jpg',
            'fallback_image' => 'portfolio/healthcare-fallback.jpg',
            'metrics' => [
                ['value' => '60%', 'label' => 'Reduction in Administrative Time'],
                ['value' => '95%', 'label' => 'Patient Satisfaction Rate'],
                ['value' => '1000+', 'label' => 'Patients Managed Daily'],
            ],
            'tech_stack' => [
                ['technology' => 'Laravel'],
                ['technology' => 'React'],
                ['technology' => 'PostgreSQL'],
                ['technology' => 'Redis'],
                ['technology' => 'HIPAA Compliance'],
            ],
            'color' => 'blue-500',
            'case_study_content' => '<h2>Healthcare Innovation</h2><p>This comprehensive system streamlined healthcare operations while maintaining strict compliance standards.</p>',
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 2,
        ]);

        // Services
        Service::create([
            'name' => 'Custom Web Development',
            'slug' => 'custom-web-development',
            'description' => 'Build powerful, scalable web applications tailored to your business needs with modern technologies and best practices.',
            'content' => '<h2>Custom Web Development Services</h2><p>We create bespoke web applications that drive business growth and enhance user experience.</p><h3>Our Approach</h3><ul><li>Requirements analysis and planning</li><li>Modern technology stack selection</li><li>Agile development methodology</li><li>Comprehensive testing and deployment</li></ul>',
            'icon' => 'CodeBracketIcon',
            'image' => 'services/web-development.jpg',
            'features' => [
                ['feature' => 'Responsive Design'],
                ['feature' => 'Custom Backend Development'],
                ['feature' => 'API Integration'],
                ['feature' => 'Performance Optimization'],
                ['feature' => 'Security Implementation'],
            ],
            'tech_stack' => [
                ['technology' => 'Laravel'],
                ['technology' => 'Vue.js'],
                ['technology' => 'React'],
                ['technology' => 'Node.js'],
                ['technology' => 'MySQL'],
                ['technology' => 'AWS'],
            ],
            'pricing_tiers' => [
                [
                    'name' => 'Basic Website',
                    'price' => '$2,500',
                    'description' => 'Perfect for small businesses and startups',
                    'features' => [
                        ['feature' => 'Up to 5 pages'],
                        ['feature' => 'Responsive design'],
                        ['feature' => 'Contact form'],
                        ['feature' => 'Basic SEO'],
                    ],
                ],
                [
                    'name' => 'Business Application',
                    'price' => '$8,500',
                    'description' => 'Custom web application with advanced features',
                    'features' => [
                        ['feature' => 'Custom functionality'],
                        ['feature' => 'User authentication'],
                        ['feature' => 'Database integration'],
                        ['feature' => 'Admin dashboard'],
                    ],
                ],
            ],
            'category' => 'development',
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 1,
        ]);

        Service::create([
            'name' => 'E-commerce Solutions',
            'slug' => 'ecommerce-solutions',
            'description' => 'Complete e-commerce platforms with payment processing, inventory management, and customer analytics.',
            'content' => '<h2>E-commerce Development</h2><p>Build powerful online stores that convert visitors into customers.</p>',
            'icon' => 'ShoppingCartIcon',
            'image' => 'services/ecommerce.jpg',
            'features' => [
                ['feature' => 'Shopping Cart & Checkout'],
                ['feature' => 'Payment Gateway Integration'],
                ['feature' => 'Inventory Management'],
                ['feature' => 'Order Management'],
                ['feature' => 'Customer Analytics'],
            ],
            'tech_stack' => [
                ['technology' => 'Laravel'],
                ['technology' => 'Stripe'],
                ['technology' => 'PayPal'],
                ['technology' => 'Redis'],
            ],
            'pricing_tiers' => [
                [
                    'name' => 'Starter Store',
                    'price' => '$5,000',
                    'description' => 'Basic e-commerce functionality',
                    'features' => [
                        ['feature' => 'Product catalog'],
                        ['feature' => 'Shopping cart'],
                        ['feature' => 'Payment processing'],
                    ],
                ],
            ],
            'category' => 'development',
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 2,
        ]);

        // Testimonials
        Testimonial::create([
            'client_name' => 'Sarah Johnson',
            'client_title' => 'CEO',
            'company_name' => 'PropTech Solutions',
            'testimonial' => 'Forahia Enterprises delivered an exceptional real estate platform that exceeded our expectations. The team\'s attention to detail and technical expertise helped us increase our property listings by 300% within six months.',
            'client_image' => 'testimonials/clients/sarah-johnson.jpg',
            'company_logo' => 'testimonials/companies/proptech-logo.png',
            'metrics' => [
                ['label' => 'Revenue Growth', 'value' => '150%'],
                ['label' => 'User Engagement', 'value' => '+85%'],
            ],
            'project_type' => 'web-development',
            'rating' => 5.0,
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 1,
            'project_date' => '2023-12-01',
        ]);

        Testimonial::create([
            'client_name' => 'Dr. Michael Chen',
            'client_title' => 'Medical Director',
            'company_name' => 'HealthFirst Clinic',
            'testimonial' => 'The healthcare management system has transformed our clinic operations. Patient scheduling is now seamless, and our administrative efficiency has improved dramatically.',
            'client_image' => 'testimonials/clients/michael-chen.jpg',
            'company_logo' => 'testimonials/companies/healthfirst-logo.png',
            'metrics' => [
                ['label' => 'Time Saved', 'value' => '60%'],
                ['label' => 'Patient Satisfaction', 'value' => '95%'],
            ],
            'project_type' => 'custom-software',
            'rating' => 5.0,
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 2,
            'project_date' => '2024-01-15',
        ]);

        // Company Settings
        CompanySetting::create([
            'key' => 'company_name',
            'label' => 'Company Name',
            'value' => 'Forahia Enterprises',
            'type' => 'text',
            'description' => 'Company name displayed across the website',
            'group' => 'general',
            'sort_order' => 1,
        ]);

        CompanySetting::create([
            'key' => 'company_tagline',
            'label' => 'Company Tagline',
            'value' => 'Innovative Web Solutions for Modern Businesses',
            'type' => 'text',
            'description' => 'Main tagline displayed on homepage',
            'group' => 'general',
            'sort_order' => 2,
        ]);

        CompanySetting::create([
            'key' => 'contact_email',
            'label' => 'Contact Email',
            'value' => 'hello@forahia.com',
            'type' => 'text',
            'description' => 'Primary contact email address',
            'group' => 'contact',
            'sort_order' => 1,
        ]);

        CompanySetting::create([
            'key' => 'contact_phone',
            'label' => 'Contact Phone',
            'value' => '+234 123 456 7890',
            'type' => 'text',
            'description' => 'Primary contact phone number',
            'group' => 'contact',
            'sort_order' => 2,
        ]);

        CompanySetting::create([
            'key' => 'company_address',
            'label' => 'Company Address',
            'value' => 'Lagos, Nigeria',
            'type' => 'textarea',
            'description' => 'Physical office address',
            'group' => 'contact',
            'sort_order' => 3,
        ]);

        // Team Members
        TeamMember::create([
            'name' => 'Adebayo Ogunmola',
            'title' => 'CEO & Lead Developer',
            'department' => 'Leadership',
            'bio' => 'Passionate full-stack developer with over 8 years of experience building scalable web applications. Specializes in Laravel, Vue.js, and modern web technologies.',
            'image' => 'team/adebayo-ogunmola.jpg',
            'email' => 'adebayo@forahia.com',
            'linkedin' => 'https://linkedin.com/in/adebayo-ogunmola',
            'twitter' => 'https://twitter.com/adebayo_dev',
            'skills' => [
                ['skill' => 'Laravel'],
                ['skill' => 'Vue.js'],
                ['skill' => 'Project Management'],
                ['skill' => 'System Architecture'],
            ],
            'location' => 'Lagos, Nigeria',
            'is_leadership' => true,
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 1,
            'joined_date' => '2020-01-01',
        ]);

        TeamMember::create([
            'name' => 'Funmi Adeleke',
            'title' => 'Frontend Developer & UI/UX Designer',
            'department' => 'Development',
            'bio' => 'Creative frontend developer and designer who brings beautiful, user-centered designs to life with modern technologies and best practices.',
            'image' => 'team/funmi-adeleke.jpg',
            'email' => 'funmi@forahia.com',
            'linkedin' => 'https://linkedin.com/in/funmi-adeleke',
            'twitter' => null,
            'skills' => [
                ['skill' => 'Vue.js'],
                ['skill' => 'React'],
                ['skill' => 'UI/UX Design'],
                ['skill' => 'Figma'],
            ],
            'location' => 'Lagos, Nigeria',
            'is_leadership' => false,
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 2,
            'joined_date' => '2021-06-15',
        ]);
    }
}
