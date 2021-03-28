import "./bootstrap";

import Vue from 'vue';

const app = new Vue({
    el: '#app',
    data: {
        comments: []
    },
    created() {
        //chiamata axios per l'api
        axios.get('http://127.0.0.1:8000/api/apicomment')
        .then(response => {
  
        console.log(response.data);
        this.comments = response.data;
         })
        .catch(error => {
        
            console.log(error);
        });
    }
});