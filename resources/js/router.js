import { createWebHistory, createRouter } from 'vue-router';

const Landing = () => import('./pages/Landing.vue');
const Account = () => import('./pages/Account.vue');
const DataInsert = () => import('./pages/DataInsert.vue');
const TyConsumer = () => import('./pages/TyConsumer.vue');
const TyBusiness = () => import('./pages/TyBusiness.vue');

const routes = [
    { path: '/:id', component: Landing },
    { path: '/:id/account', component: Account },
    { path: '/:id/business', component: DataInsert },
    { path: '/:id/ty_consumer', component: TyConsumer },
    { path: '/:id/ty_business', component: TyBusiness }
];

const router = createRouter({
    history: createWebHistory(),
    routes, 
  });

export default router;