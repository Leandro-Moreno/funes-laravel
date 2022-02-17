/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import { BootstrapVueIcons } from 'bootstrap-vue'
import 'bootstrap-vue/dist/bootstrap-vue-icons.min.css'
import BootstrapVue from 'bootstrap-vue'
import Vue from 'vue'
import {store} from './Store/index'
import PortalVue from 'portal-vue'
// import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
// const externalComponent = () => import('./utils.js');
// import externalComponent from "./components/utils"
// window.Vue = Vue
Vue.use(PortalVue)
Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)
Vue.use(require('./components/utils'))

// window.Vue = require('bootstrap-vue');
// Vue.use(require('bootstrap-vue'));
// Vue.use(BootstrapVueIcons);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
//Vue.use(require('bootstrap-vue'));
Vue.component('registro-crear', () => import('./components/Registro/Create.vue'));
Vue.component('registro-index', () => import('./components/registro/RegistroIndex.vue'));
Vue.component('registro-type-article', () => import('./components/Registro/Type/Article.vue'));
Vue.component('registro-type-book-section', () => import('./components/Registro/Type/BookSection.vue'));
Vue.component('registro-type-edited-book', () => import('./components/Registro/Type/EditedBook.vue'));
Vue.component('registro-type-book', () => import('./components/Registro/Type/Book.vue'));
Vue.component('registro-results', () => import('./components/Registro/Results.vue'));
Vue.component('registro-latest', () => import('./components/Registro/Latest.vue'));


Vue.component('registro-core-details', () => import('./components/Registro/Components/DetailsCore.vue'));
Vue.component('registro-components-publisher', () => import('./components/Registro/Components/Publisher.vue'));
Vue.component('registro-components-refereed', () => import('./components/Registro/Components/Refereed.vue'));
Vue.component('registro-components-official-url', () => import('./components/Registro/Components/OfficialUrl.vue'));
Vue.component('registro-components-volume', () => import('./components/Registro/Components/Volume.vue'));
Vue.component('registro-components-pagerange', () => import('./components/Registro/Components/Pagerange.vue'));
Vue.component('registro-components-number', () => import('./components/Registro/Components/Number.vue'));
Vue.component('registro-components-id-number', () => import('./components/Registro/Components/IdNumber.vue'));
Vue.component('registro-components-date', () => import('./components/Registro/Components/Date.vue'));
Vue.component('registro-components-date-type', () => import('./components/Registro/Components/DateType.vue'));
Vue.component('registro-components-publication', () => import('./components/Registro/Components/Publication.vue'));
Vue.component('registro-components-issn', () => import('./components/Registro/Components/Issn.vue'));
Vue.component('registro-components-isbn', () => import('./components/Registro/Components/Isbn.vue'));
Vue.component('registro-components-book-title', () => import('./components/Registro/Components/BookTitle.vue'));
Vue.component('registro-components-place-of-pub', () => import('./components/Registro/Components/PlaceOfPub.vue'));
Vue.component('registro-components-pages', () => import('./components/Registro/Components/Pages.vue'));
Vue.component('registro-components-series', () => import('./components/Registro/Components/Series.vue'));
Vue.component('registro-components-thesis-type', () => import('./components/Registro/Components/ThesisType.vue'));
Vue.component('registro-components-authors', () => import('./components/Registro/Components/Authors.vue'));

Vue.component('cargar-archivo', () => import('./components/cargarArchivo.vue'));
Vue.component('pdf-viewer', () => import('./components/pdfViewer.vue'));
Vue.component('registro-autores-institucionales', () => import('./components/registro/registroAutoresInstitucional.vue'));
Vue.component('registro-info-adicional', () => import('./components/registro/registroInformacionAdicional.vue'));

Vue.component('registro-title', () => import('./components/registro/registroTitle.vue'));
Vue.component('header-animated', () => import('./components/header.vue'));
Vue.component('tree-subject', () => import('./components/Tree/tree.vue'));
Vue.component('registro-administrator-index', () => import('./components/Registro/Administrator/index.vue'));
// Vue.component('header-animated', require('./components/header.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#library',
    store
});
