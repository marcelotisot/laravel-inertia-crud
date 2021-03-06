require('./bootstrap');

//window.Vue = require('vue');

// Inertia Setup
import { App, plugin } from '@inertiajs/inertia-vue';

// Inertia progress
import { InertiaProgress } from '@inertiajs/progress';
InertiaProgress.init()

import Vue from 'vue';

Vue.use(plugin);

// Element UI
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import locale from 'element-ui/lib/locale/lang/es.js';

// Element UI Globally
Vue.use(ElementUI, { locale });

// Custom $route property
//Vue.prototype.$route = (...args) => route(...args).url();
Vue.prototype.$route = (...args) => route(...args);

const el = document.getElementById('app');

new Vue({
    render: h => h(App, {
        props: {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: name => require(`./Pages/${name}`).default,
        },
  }),
}).$mount(el)