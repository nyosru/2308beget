// Page Components
import Home from './components/pages/Home'

import Vitrin from './components/pages/Vitrin.vue'
import Trebs from './components/pages/Trebs.vue'

import About from './components/pages/About'
import Contact from './components/pages/Contact'
import Help from './components/pages/Help'
import Page from './components/PageComponent.vue'

// import FormReg from "./components/pages/RegFormComponent.vue";
import Rega from './components/formReg/Base.vue'
import ParticipationComponent from './components/VitrinParticipation/BodyComponent.vue'
import Participation2Component from './components/VitrinParticipation2/BodyComponent.vue'

export default [
    // { path: "/", component: Home, name: 'Home' },
    // { path: "/vitrin", component: Vitrin, name: 'Vitrin' },
    // { path: "/about", component: About, name: 'About' },
    // { path: "/contact", component: Contact, name: 'Contact', params: { username: 'erina' }, meta: { type: 'page' } },
    // { path: "/contact", component: Page, name: 'Contact', params: { username: 'erina' }, meta: { type: 'page' } },
    // { path: "/contact", component: Page, name: 'Contact', meta: { type: 'page' } },

    // { path: "/", component: Page, name: 'Dobro' },
    // { path: "/dobro", component: Page, name: 'Dobro' },
    {
        path: '/about',
        component: Page,
        name: 'About',
        meta: { type: 'page', name: 'О нас' },
    },
    {
        path: '/documents',
        component: Page,
        name: 'Documents',
        meta: { type: 'page', name: 'Документы' },
    },

    {
        path: '/reg',
        component: Rega,
        name: 'Reg',
        meta: { name: 'Регистрация' },
        // children: [{
        //         path: 'fiz',
        //         // component: Rega,
        //         name: 'RegFiz',
        //         meta: { name: 'Регистрация Физ лица' },
        //     },
        //     {
        //         path: 'ur',
        //         // component: Rega,
        //         name: 'RegUr',
        //         meta: { name: 'Регистрация Юр лица' },
        //     },
        // ],
    },

    { path: '/trebs', component: Trebs, name: 'Trebs' },

    { path: '/participation', component: ParticipationComponent, name: 'Participation' },
    { path: '/participation2', component: Participation2Component, name: 'Participation' },

    {
        path: '/balance',
        component: Page,
        name: 'Balance',
        meta: { type: 'page', name: 'Наша экономика' },
    },
    {
        path: '/contacts',
        component: Page,
        name: 'Contact',
        meta: { type: 'page', name: 'Контакты' },
    },
    // { path: "/reg", component: FormReg, name: 'FormReg' },

    { path: '/', component: Vitrin, name: 'Vitrin' },
    { path: '/:any', redirect: { name: 'Vitrin' } },

    // { path: "/:any", component: Vitrin, name: 'Vitrin' },
    // { path: "/:any", component: Vitrin, name: 'Vitrin' },
    // { path: "/index", component: Vitrin, name: 'Vitrin2' },
    // { path: "/help", component: Help, name: 'Help' },
]