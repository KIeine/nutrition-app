import { h, createSSRApp } from 'vue';
import { renderToString } from 'vue/server-renderer';
import { createInertiaApp, Link, Head } from '@inertiajs/vue3';
import createServer from '@inertiajs/vue3/server';

// import ECharts from 'vue-echarts';
// import { use } from 'echarts/core';
// import { CanvasRenderer } from 'echarts/renderers';
// import { PieChart } from 'echarts/charts';
// import { TooltipComponent } from 'echarts/components';

import './assets/main.css';

import DefaultLayout from './layouts/DefaultLayout.vue';
import BaseIcon from './components/BaseIcon.vue';
import BaseButton from './components/BaseButton.vue';

// use([CanvasRenderer, PieChart, TooltipComponent]);

createServer((page) =>
  createInertiaApp({
    page,
    render: renderToString,
    resolve: async (name) => {
      const page = (await import(`./pages/${name}.vue`)).default;
      page.layout = page.layout === undefined ? DefaultLayout : page.layout;
      return page;
    },
    setup({ el, App, props, plugin }) {
      createSSRApp({ render: () => h(App, props) })
        .use(plugin)
        // inertia
        .component('InertiaLink', Link)
        .component('InertiaHead', Head)
        // components
        // .component('EChart', ECharts)
        .component('BaseIcon', BaseIcon)
        .component('BaseButton', BaseButton)
        .mount(el);
    },
  }),
);
