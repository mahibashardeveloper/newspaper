import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-icons/font/bootstrap-icons.min.css';
import 'owl-carousel/owl-carousel/owl.carousel.css';
import 'owl-carousel/owl-carousel/owl.theme.css'
import 'jquery/dist/jquery.min';
import 'owl-carousel/owl-carousel/owl.carousel.min';
import bootstrap from 'bootstrap/dist/js/bootstrap.bundle.min';
window.bootstrap = bootstrap
import Toaster from '@meforma/vue-toaster';
import axios from "axios";
import App from "./App.vue";
import {createApp} from "vue";
import router from "./router/router";
createApp(App).use(router,  axios).use(Toaster).mount('#app')
