require('./bootstrap');




require('alpinejs');
import Vue from 'vue';


Vue.component('follow-button', require('./components/FollowButton.vue').default);

new Vue({
    el: '#app',
    data: {
        open: false
    }
})