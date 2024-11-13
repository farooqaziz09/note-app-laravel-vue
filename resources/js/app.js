import './bootstrap';

import { createApp } from 'vue'
import App from './vue/app.vue'
import { createMemoryHistory, createWebHistory, createRouter } from 'vue-router'
import { library } from '@fortawesome/fontawesome-svg-core'
/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faPlusSquare, faTrash, faEdit } from '@fortawesome/free-solid-svg-icons'
import editNoteForm from './vue/editNoteForm.vue';
import Main from './vue/main.vue';

/* add icons to the library */
library.add(faPlusSquare, faTrash, faEdit)
const routes = [
    {
        name: 'Main',
        component: Main,
        path: ""
    },
    {
        name: 'Edit',
        component: editNoteForm,
        path: "/note/:id"
    }];
const router = createRouter({
    history: createWebHistory(),
    routes
})

const app = createApp(App).use(router).component('font-awesome-icon', FontAwesomeIcon).mount('#app')