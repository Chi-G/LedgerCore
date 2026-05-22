import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { InertiaProgress } from '@inertiajs/progress'
import 'notyf/notyf.min.css'
import { registerServiceWorker } from './utils/serviceWorker'

// Register service worker for PWA support and offline capabilities
registerServiceWorker()

// Performance optimization - preload critical routes
if ('connection' in navigator) {
  if (navigator.connection.saveData === false) {
    // Only preload if user is not on data-saving mode
    const preloadRoutes = ['/about', '/services', '/portfolio', '/contact', '/client']
    if ('requestIdleCallback' in window) {
      requestIdleCallback(() => {
        preloadRoutes.forEach(route => {
          const link = document.createElement('link')
          link.rel = 'prefetch'
          link.href = route
          document.head.appendChild(link)
        })
      })
    }
  }
}

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
    const page = pages[`./Pages/${name}.vue`];
    return page?.default || page;
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) })
    app.use(plugin)
    app.mount(el)
  },

  title: title => `${title} - Forahia Solutions`,
})

document.addEventListener('inertia:error', (event) => {
  const { response } = event.detail;

  if (response && response.status === 404) {
    event.preventDefault();

    window.dispatchEvent(new CustomEvent('show-not-found-modal'));

    const previousUrl = document.referrer || '/';

    if (window.location.href !== previousUrl) {
      window.history.replaceState({}, '', previousUrl);
    }
  }
});

InertiaProgress.init({
  color: '#00d4ff',
  showSpinner: true
})
