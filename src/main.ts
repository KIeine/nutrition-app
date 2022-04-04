import { createApp, h } from 'vue';
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

import './assets/main.css';
import '../auto-imports.d';

import DefaultLayout from './layouts/DefaultLayout.vue';
import BaseIcon from './components/BaseIcon.vue';
import BaseButton from './components/BaseButton.vue';

// TODO fix ziggy's route() not working in template
declare global {
  interface Window {
    route?: any;
  }
}

createInertiaApp({
  resolve: async (name) => {
    const page = (await import(`./pages/${name}.vue`)).default;
    page.layout = page.layout === undefined ? DefaultLayout : page.layout;
    return page;
  },
  setup({ el, app, props, plugin }) {
    createApp({ render: () => h(app, props) })
      .use(plugin)
      // ziggy
      .mixin({ methods: { route: window.route } })
      // inertia
      .component('InertiaLink', Link)
      .component('InertiaHead', Head)
      // components
      .component('BaseIcon', BaseIcon)
      .component('BaseButton', BaseButton)
      .mount(el);
  },
});

InertiaProgress.init();
