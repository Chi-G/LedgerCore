// Image optimization helper functions

/**
 * Get WebP version of an image if available, fallback to original
 * @param {string} originalSrc - Original image source
 * @returns {string} - WebP version or original
 */
export function getOptimizedImageSrc(originalSrc) {
  // Check if it's a URL or local path
  if (originalSrc.startsWith('http')) {
    // For external URLs, we can't directly provide WebP versions
    return originalSrc;
  }

  // For local images, try to use WebP version if it exists
  const webpSrc = originalSrc.replace(/\.(png|jpe?g)$/i, '.webp');

  // In production, return the WebP path (we assume build process creates these)
  // In development, return original since WebP might not exist yet
  return process.env.NODE_ENV === 'production' ? webpSrc : originalSrc;
}

/**
 * Generate responsive image srcset
 * @param {string} baseSrc - Base image source
 * @returns {string} - srcset attribute value
 */
export function generateSrcset(baseSrc) {
  // If external URL, we can't generate srcset
  if (baseSrc.startsWith('http')) {
    return '';
  }

  // File name without extension
  const baseNameMatch = baseSrc.match(/(.+)\.(\w+)$/);
  if (!baseNameMatch) return '';

  const baseName = baseNameMatch[1];
  const ext = baseNameMatch[2];

  // Generate srcset for different sizes
  return `
    ${baseName}-sm.${ext} 400w,
    ${baseName}-md.${ext} 800w,
    ${baseName}-lg.${ext} 1200w,
    ${baseSrc} 1600w
  `.trim();
}

/**
 * Creates a blur placeholder data URL
 * @param {string} color - Base color for placeholder
 * @returns {string} - Data URL for blur placeholder
 */
export function createBlurPlaceholder(color = '#e2e8f0') {
  // Simple SVG blur placeholder
  const svg = `
    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
      <rect width="100%" height="100%" fill="${color}" />
      <filter id="b" x="0" y="0">
        <feGaussianBlur stdDeviation="10" />
      </filter>
      <rect width="100%" height="100%" fill="${color}" opacity="0.5" filter="url(#b)" />
    </svg>
  `.trim();

  const encoded = btoa(svg);
  return `data:image/svg+xml;base64,${encoded}`;
}

/**
 * Optimized image component props interface
 */
export const OptimizedImageProps = {
  src: {
    type: String,
    required: true
  },
  alt: {
    type: String,
    required: true
  },
  width: {
    type: [Number, String],
    default: null
  },
  height: {
    type: [Number, String],
    default: null
  },
  loading: {
    type: String,
    default: 'lazy',
    validator: (value) => ['lazy', 'eager', 'auto'].includes(value)
  },
  class: {
    type: String,
    default: ''
  }
};
