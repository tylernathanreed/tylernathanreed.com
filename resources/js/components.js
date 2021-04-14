import Vue from 'vue'

import Error403 from '@/views/Error403'
import Error404 from '@/views/Error404'
import FadeTransition from '@/components/FadeTransition'
import Loader from '@/components/Icons/Loader'
import LoadingView from '@/components/LoadingView'

Vue.component('error-403', Error403)
Vue.component('error-404', Error404)
Vue.component('loader', Loader)
Vue.component('loading-view', LoadingView)

Vue.component('fade-transition', FadeTransition)
