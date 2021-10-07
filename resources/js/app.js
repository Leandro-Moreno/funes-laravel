/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import { BootstrapVueIcons } from 'bootstrap-vue'
import 'bootstrap-vue/dist/bootstrap-vue-icons.min.css'

window.Vue = require('vue');
// window.Vue = require('bootstrap-vue');
Vue.use(require('bootstrap-vue'));
Vue.use(BootstrapVueIcons);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('registro-crear', require('./components/RegistroCrear.vue').default);
Vue.component('registro-index', require('./components/registro/RegistroIndex.vue').default);
Vue.component('cargar-archivo', require('./components/cargarArchivo.vue').default);
Vue.component('registro-detalles', require('./components/registroDetalles.vue').default);
Vue.component('registro-autores', require('./components/registro/registroAutores.vue').default);
Vue.component('registro-autores-institucionales', require('./components/registro/registroAutoresInstitucional.vue').default);
Vue.component('registro-info-adicional', require('./components/registro/registroInformacionAdicional.vue').default);
Vue.component('pdf-viewer', require('./components/pdfViewer.vue').default);

// Vue.use(BootstrapVue);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
