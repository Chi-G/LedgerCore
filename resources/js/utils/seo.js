// SEO Utilities for Forahia Enterprises

/**
 * Generate structured metadata for a page
 * @param {Object} options - Metadata options
 * @returns {Object} - Meta tags and structured data
 */
export function generateMetadata(options = {}) {
  const defaults = {
    title: 'Forahia Enterprises - Digital Innovation Consultancy',
    description: 'Transforming businesses through world-class digital innovation. We bridge the gap between ambitious business dreams and technical execution.',
    keywords: 'forahia, digital innovation, business transformation, web development, technology consultancy',
    image: '/logo.png',
    url: typeof window !== 'undefined' ? window.location.href : 'https://forahia.org.ng',
    type: 'website',
    siteName: 'Forahia Enterprises',
    twitterHandle: '@forahia',
  };

  const meta = { ...defaults, ...options };

  // Generate structured data (JSON-LD)
  const structuredData = {
    '@context': 'https://schema.org',
    '@type': meta.type === 'article' ? 'Article' : 'WebSite',
    headline: meta.title,
    description: meta.description,
    image: meta.image.startsWith('http') ? meta.image : `https://forahia.org.ng${meta.image}`,
    url: meta.url,
    name: meta.siteName,
    publisher: {
      '@type': 'Organization',
      name: 'Forahia Enterprises',
      logo: {
        '@type': 'ImageObject',
        url: 'https://forahia.org.ng/logo.png'
      }
    }
  };

  // If it's an article, add more specific properties
  if (meta.type === 'article' && meta.publishedTime) {
    structuredData.datePublished = meta.publishedTime;
    if (meta.modifiedTime) {
      structuredData.dateModified = meta.modifiedTime;
    }
    if (meta.authorName) {
      structuredData.author = {
        '@type': 'Person',
        name: meta.authorName
      };
    }
  }

  return {
    title: meta.title,
    meta: [
      { name: 'description', content: meta.description },
      { name: 'keywords', content: meta.keywords },

      // Open Graph
      { property: 'og:title', content: meta.title },
      { property: 'og:description', content: meta.description },
      { property: 'og:image', content: meta.image.startsWith('http') ? meta.image : `https://forahia.org.ng${meta.image}` },
      { property: 'og:url', content: meta.url },
      { property: 'og:type', content: meta.type },
      { property: 'og:site_name', content: meta.siteName },

      // Twitter
      { name: 'twitter:card', content: 'summary_large_image' },
      { name: 'twitter:site', content: meta.twitterHandle },
      { name: 'twitter:title', content: meta.title },
      { name: 'twitter:description', content: meta.description },
      { name: 'twitter:image', content: meta.image.startsWith('http') ? meta.image : `https://forahia.org.ng${meta.image}` },

      // Additional SEO
      { name: 'robots', content: 'index, follow' },
      { name: 'canonical', content: meta.url },
    ],
    structuredData: JSON.stringify(structuredData)
  };
}

/**
 * Generate a canonical URL
 * @param {string} path - URL path after domain
 * @returns {string} - Full canonical URL
 */
export function getCanonicalUrl(path = '') {
  const baseUrl = 'https://forahia.org.ng';
  return `${baseUrl}${path.startsWith('/') ? path : `/${path}`}`;
}

/**
 * Generate SEO-friendly slug from text
 * @param {string} text - Text to convert to slug
 * @returns {string} - URL-friendly slug
 */
export function generateSlug(text) {
  return text
    .toLowerCase()
    .replace(/[^\w\s-]/g, '') // Remove special characters
    .replace(/\s+/g, '-')     // Replace spaces with hyphens
    .replace(/-+/g, '-')      // Replace multiple hyphens with single hyphen
    .trim();                  // Trim whitespace
}
