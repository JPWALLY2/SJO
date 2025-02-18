import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

// Import components
import App from './components/App.vue';
import FormularioUsuarios from './components/admin/usuarios/FormularioUsuarios.vue';

// ROTAS
const router = createRouter({
    // history: createWebHistory('/admin'),
    history: createWebHistory(),
    routes: [
        { path: '/usuarios/cadastrar', component: FormularioUsuarios },
        { path: '/usuarios/:id/editar', component: FormularioUsuarios },
    ]
});

const app = createApp(App);
app.use(router);
app.mount('#app');
