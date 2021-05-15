/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueMeta from 'vue-meta'
import PortalVue from 'portal-vue'
import { App, plugin } from '@inertiajs/inertia-vue'
import { InertiaProgress } from '@inertiajs/progress/src'
import Layout from '@/views/Layout'

Vue.config.productionTip = false

Vue.mixin({
    methods: {
        config: function(key) {
            return Config[key] || null;
        },
        route: window.route
    }
})

Vue.use(plugin)
Vue.use(PortalVue)
Vue.use(VueMeta)

InertiaProgress.init()

const el = document.getElementById('app')

new Vue({
    metaInfo: {
        titleTemplate: title => (title ? `Reedware | ${title}` : 'Reedware'),
    },
    render: h =>
        h(App, {
            props: {
                initialPage: JSON.parse(el.dataset.page),
                resolveComponent: name => import(`@/views/${name}`).then(({default: page}) => {

                    if(page.layout === undefined) {
                        page.layout = Layout
                    }

                    return page

                }),
            },
        }),
}).$mount(el)