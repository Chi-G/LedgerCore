<template>
  <img
    :src="optimizedSrc"
    :srcset="imageSrcset"
    :alt="alt"
    :width="width"
    :height="height"
    :loading="loading"
    :class="computedClass"
    :style="style"
    @error="handleError"
  />
</template>

<script setup>
import { computed, ref } from 'vue';
import { getOptimizedImageSrc, generateSrcset, createBlurPlaceholder, OptimizedImageProps } from '../utils/imageOptimization';

const props = defineProps({
  ...OptimizedImageProps,
  fallbackSrc: {
    type: String,
    default: null
  },
  placeholderColor: {
    type: String,
    default: '#e2e8f0'
  }
});

const hasError = ref(false);
const isLoaded = ref(false);

const optimizedSrc = computed(() => {
  if (hasError.value && props.fallbackSrc) {
    return props.fallbackSrc;
  }
  return getOptimizedImageSrc(props.src);
});

const imageSrcset = computed(() => {
  if (hasError.value) return '';
  return generateSrcset(props.src);
});

const computedClass = computed(() => {
  return `optimized-image ${isLoaded.value ? 'is-loaded' : 'is-loading'} ${props.class}`;
});

const style = computed(() => {
  const styles = {};
  if (!isLoaded.value) {
    styles.backgroundImage = `url('${createBlurPlaceholder(props.placeholderColor)}')`;
    styles.backgroundSize = 'cover';
  }
  return styles;
});

function handleError(e) {
  hasError.value = true;
  if (!props.fallbackSrc) {
    console.error('Image failed to load:', props.src);
  }
}

function handleLoad() {
  isLoaded.value = true;
}

// Listen for load event
if (typeof window !== 'undefined') {
  setTimeout(() => {
    const img = new Image();
    img.src = optimizedSrc.value;
    img.onload = handleLoad;
  }, 0);
}
</script>

<style scoped>
.optimized-image {
  transition: opacity 0.3s ease;
}

.is-loading {
  opacity: 0.5;
}

.is-loaded {
  opacity: 1;
}
</style>
