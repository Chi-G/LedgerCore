<template>
  <!-- SEO meta tags are injected into the document head -->
</template>

<script setup>
import { computed, onMounted } from 'vue';
import { generateMetadata } from '../../utils/seo';

const props = defineProps({
  title: {
    type: String,
    default: ''
  },
  description: {
    type: String,
    default: ''
  },
  keywords: {
    type: String,
    default: ''
  },
  image: {
    type: String,
    default: '/logo.png'
  },
  url: {
    type: String,
    default: ''
  },
  type: {
    type: String,
    default: 'website'
  },
  publishedTime: {
    type: String,
    default: ''
  },
  modifiedTime: {
    type: String,
    default: ''
  },
  authorName: {
    type: String,
    default: ''
  },
  siteName: {
    type: String,
    default: 'Forahia Solutions'
  },
  twitterHandle: {
    type: String,
    default: '@forahia'
  },
});

const metadata = computed(() => generateMetadata({
  title: props.title,
  description: props.description,
  keywords: props.keywords,
  image: props.image,
  url: props.url || (typeof window !== 'undefined' ? window.location.href : ''),
  type: props.type,
  publishedTime: props.publishedTime,
  modifiedTime: props.modifiedTime,
  authorName: props.authorName,
  siteName: props.siteName,
  twitterHandle: props.twitterHandle,
}));

// Update document head
onMounted(() => {
  // Set title
  document.title = metadata.value.title;

  // Clean up existing meta tags
  const existingMetas = document.querySelectorAll('meta[data-vue-meta="1"]');
  existingMetas.forEach(meta => meta.remove());

  // Clean up existing JSON-LD scripts
  const existingScripts = document.querySelectorAll('script[type="application/ld+json"][data-vue-meta="1"]');
  existingScripts.forEach(script => script.remove());

  // Add meta tags
  metadata.value.meta.forEach(meta => {
    const metaTag = document.createElement('meta');

    // Set attributes
    for (const [key, value] of Object.entries(meta)) {
      metaTag.setAttribute(key, value);
    }

    metaTag.setAttribute('data-vue-meta', '1');
    document.head.appendChild(metaTag);
  });

  // Add JSON-LD structured data
  const scriptTag = document.createElement('script');
  scriptTag.type = 'application/ld+json';
  scriptTag.textContent = metadata.value.structuredData;
  scriptTag.setAttribute('data-vue-meta', '1');
  document.head.appendChild(scriptTag);
});
</script>
