<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-XXXXXXXXXX');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Primary Meta Tags -->
    <title>{{ config('app.name', 'Forahia Enterprise') }} - Innovative Tech Solutions</title>
    <meta name="title" content="Forahia Enterprise - Innovative Tech Solutions">
    <meta name="description" content="Forahia Enterprise offers cutting-edge software development, web design, mobile app development, digital transformation, and IT consulting services to businesses across Nigeria and beyond.">

    <!-- Keywords -->
    <meta name="keywords" content="forahia, Forahia Enterprise, tech services, software development, web design, mobile app development, digital transformation, IT consulting, Nigeria tech company">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://forahia.org.ng/">
    <meta property="og:title" content="Forahia Enterprise - Innovative Tech Solutions">
    <meta property="og:description" content="Forahia Enterprise offers cutting-edge software development, web design, mobile app development, digital transformation, and IT consulting services to businesses across Nigeria and beyond.">
    <meta property="og:image" content="https://forahia.org.ng/logo.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://forahia.org.ng/">
    <meta property="twitter:title" content="Forahia Enterprise - Innovative Tech Solutions">
    <meta property="twitter:description" content="Forahia Enterprise offers cutting-edge software development, web design, mobile app development, digital transformation, and IT consulting services to businesses across Nigeria and beyond.">
    <meta property="twitter:image" content="https://forahia.org.ng/logo.png">

    <!-- Canonical URL -->
    <link rel="canonical" href="https://forahia.org.ng{{ request()->path() != '/' ? '/' . request()->path() : '' }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @inertiaHead
</head>
<body>
    @inertia

    <!-- Calendly Widget -->
    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>

    <!-- Structured Data for Organization -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Forahia Enterprise",
        "url": "https://forahia.org.ng",
        "logo": "https://forahia.org.ng/logo.png",
        "description": "Forahia Enterprise offers cutting-edge software development, web design, mobile app development, digital transformation, and IT consulting services.",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+234-706-591-0449",
            "contactType": "customer service",
            "areaServed": "Nigeria"
        },
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "Nigeria"
        },
        "sameAs": [
            "https://facebook.com/forahia",
            "https://twitter.com/forahia",
            "https://instagram.com/forahia",
            "https://linkedin.com/company/forahia"
        ]
    }
    </script>
</body>
</html>
