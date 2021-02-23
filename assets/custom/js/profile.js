import { BASE_URL } from './constant.js';



new Vue({

    el: "#profile-app",
    data: {
        home_url: BASE_URL,
        // home_url: window.location.origin,
        responseData: null,
        name: "awdadad"
    },

    methods: {
        updateProfileInfo: function( event ){


            var formdata = $("#updateprofile").serialize();

            console.log( formdata );

        }
    }

});