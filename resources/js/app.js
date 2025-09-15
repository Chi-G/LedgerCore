import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { InertiaProgress } from '@inertiajs/progress'

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

  title: title => `${title} - Forahia Enterprises`,
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
  showSpinner: false
})
