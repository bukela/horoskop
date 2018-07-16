
require('./bootstrap');

window.Vue = require('vue');

let Add = require('./components/Add.vue');
let Regular = require('./components/Regular.vue');
let Chinese = require('./components/Chinese.vue');
let Mayan = require('./components/Mayan.vue');
let List = require('./components/List.vue');
// let Edit = require('./components/Edit.vue');

const app = new Vue({
    el: '#app',
    components:{Add,Regular,Chinese,Mayan,List},
    data() {
        return {
            addActive: '',
            regularActive: '',
            chineseActive: '',
            mayanActive: '',
            listActive: '',
            editActive: '',
            selectedItem: {},
            
        }
    },
    methods: {
        openAdd() {
            this.addActive = 'is-active';
        },
        openList() {
            this.listActive = 'is-active';
        },
        close() {
            this.addActive = '';
        },
        openregular() {
            this.regularActive = 'is-active';
        },
        closeregular() {
            this.regularActive = '';
        },
        openchinese() {
            this.chineseActive = 'is-active';
        },
        closechinese() {
            this.chineseActive = '';
        },
        openmayan() {
            this.mayanActive = 'is-active';
        },
        closemayan() {
            this.mayanActive = '';
        },
        openlist() {
            this.listActive = 'is-active';
        },
        closelist() {
            this.listActive = '';
        },
        openedit(item) {
            this.selectedItem = item;
            this.editActive = 'is-active';
        },
        closeedit() {
            this.editActive = '';
        },
    }
});
//import Vue from 'vue'
// import Buefy from 'buefy'
// Vue.use(Buefy);


