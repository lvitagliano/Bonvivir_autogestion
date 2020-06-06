import Vue from 'vue';
import VueRouter from 'vue-router';

import configurables from './components/planes/planConfig.vue'
import planes from './components/planes/index.vue'
import pagos from './components/planes/pago.vue'
import compras from './components/planes/compras/compras.vue'

Vue.use(VueRouter);

const router = new VueRouter(
    {
        mode: 'history',
        
        routes: [
            {
                path: '/planes',
                name: 'planes',
                component: planes,
                children: [ 
                    { path: 'cotizar*', component: configurables },
                    { path: 'pagar*', component: pagos }

                 ] 
            },
            {
                path: '/compras',
                name: 'compras',
                component: compras
            }
        ]
    });

export default router;