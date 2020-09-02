require('./bootstrap');

window.Vue = require('vue');
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.config.devtools = false;

const app = new Vue({
    el: '#app',
});
