<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a sitemap for the website';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating sitemap...');

        // Base URL of your site
        $baseUrl = config('app.url', 'https://forahia.org.ng');

        // Main public routes we want to include
        $routes = [
            '/' => [
                'loc' => $baseUrl,
                'lastmod' => date('Y-m-d'),
                'priority' => '1.0',
                'changefreq' => 'daily',
            ],
            '/about' => [
                'loc' => $baseUrl . '/about',
                'lastmod' => date('Y-m-d'),
                'priority' => '0.8',
                'changefreq' => 'weekly',
            ],
            '/services' => [
                'loc' => $baseUrl . '/services',
                'lastmod' => date('Y-m-d'),
                'priority' => '0.9',
                'changefreq' => 'weekly',
            ],
            '/portfolio' => [
                'loc' => $baseUrl . '/portfolio',
                'lastmod' => date('Y-m-d'),
                'priority' => '0.9',
                'changefreq' => 'weekly',
            ],
            '/contact' => [
                'loc' => $baseUrl . '/contact',
                'lastmod' => date('Y-m-d'),
                'priority' => '0.7',
                'changefreq' => 'monthly',
            ],
            // Add more static routes as needed
        ];

        // You can add dynamic routes here by querying your database
        // For example, get all blog posts or portfolio items

        // Generating the XML
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($routes as $route) {
            $xml .= '<url>';
            $xml .= '<loc>' . $route['loc'] . '</loc>';
            $xml .= '<lastmod>' . $route['lastmod'] . '</lastmod>';
            $xml .= '<priority>' . $route['priority'] . '</priority>';
            $xml .= '<changefreq>' . $route['changefreq'] . '</changefreq>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        // Save the sitemap
        File::put(public_path('sitemap.xml'), $xml);

        $this->info('Sitemap generated successfully at public/sitemap.xml');

        return Command::SUCCESS;
    }
}
