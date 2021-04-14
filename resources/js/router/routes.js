import Page from '@/views/page'
import Error403 from '@/views/403'
import Error404 from '@/views/404'

export default [
    {
        name: 'index',
        path: '/',
        component: Page,
    },
    {
        name: '403',
        path: '/403',
        component: Error403,
    },
    {
        name: '404',
        path: '/404',
        component: Error404,
    },
    {
        name: 'catch-all',
        path: '*',
        component: Error404,
    },
]
