import { createApp, h } from 'vue'
import {createInertiaApp, Link} from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import '../sass/app.scss'
import 'bootstrap'
import 'bootstrap/scss/bootstrap.scss'

InertiaProgress.init()
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

createInertiaApp({
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mixin({ methods: { route: window.route } })
            .component('Link', Link)
            .mount(el)
    },
});
