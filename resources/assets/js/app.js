require('./bootstrap');
import Vue from 'vue';
import router from './Services/Router/Router';
import Dashboard from './components/Dashboard';
import SingleRezume from './components/Site/SingleRezume';
import RezumeList from './components/Site/RezumeList';
import BusinessList from './components/Site/BusinessList';
import SingleBusiness from './components/Site/SingleBusiness';
import Home from './components/Site/Home';
import Support from './components/Site/Support';
window.$ = require('jquery');
window.JQuery = require('jquery');
import JQuery from 'jquery';
window.$ = JQuery;
Vue.component('dashboard-component',Dashboard);
Vue.component('single-rezume',SingleRezume);
Vue.component('rezume-list',RezumeList);
Vue.component('business-list',BusinessList);
Vue.component('single-business',SingleBusiness);
Vue.component('home',Home);
Vue.component('support',Support);
const app = new Vue({
    el: '#wrapper',
    router,
});
export default app;
