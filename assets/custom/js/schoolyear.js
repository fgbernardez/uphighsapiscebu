import { BASE_URL } from './constant.js';



new Vue({

    el: "#app-schoolyear",
    data: {
        // currentUrl: window.location.protocol + "//" +window.location.hostname + '/v2gradingsystem',
        currentUrl: BASE_URL,
        // currentUrl: window.location.origin,
        schoolyears: [],
        axiosResponse: null,
        axiosResponseStatus: "",
        syToDelete: null,
        syDeleteResponse: null,
        syToUpdate: null
        
    },
    methods:{
        submitCreateSY: function( event ){
            var formData = $("#createSYForm").serialize();
            this.postAxios( "/axios-create-sy", formData ).then( data => {
                this.axiosResponse = data;
                // console.log( this.axiosResponse );
                this.getSchoolYears();
                if( data.code == 200 ){
                    setTimeout( function(){
                        $("#response_msg").hide();
                        $("#modal-create-sy").modal("hide");
                        event.target.reset();
                    }, 2000 );
                    location.reload();
                }else{
                    event.target.reset();
                    setTimeout( function(){
                        $("#response_msg").hide();
                    }, 3000 );
                }
            });

        },
        deleteSY: function( sy_id ){
            this.syToDelete = { "sy_id": sy_id };
            $("#confirmationDeleteSYModal").modal("show");

            // $("#confirmationBtnDeleteSY").click( function(){
            // });
        },

        confirmationBtnDeleteSY: function(){
            $("#confirmationDeleteSYModal").modal("hide");
            this.postAxios( "/axios-delete-sy", this.syToDelete ).then(
                data => {
                    this.syDeleteResponse = data; 
                    if( data.code == 200 ){
                        $("#synotificationModal").modal("show");
                    } else {
                        $("#synotificationModal").modal("show");
                    }
                    // console.log( data );
                    this.getSchoolYears();
                    
            });
        },

        updateSY: function( sy_id ){
            var formData = { "sy_id": sy_id };
            this.postAxios( "/axios-get-single-sy", formData ).then(
                data => {
                    this.syToUpdate = data.data[0]; 
                    console.log( this.syToUpdate );
                    $("#modal-update-sy").modal("show");
            });
        },

        submitUpdateSY: function( event )
        {
            var formData = $("#updateSYForm").serialize();
            this.postAxios( "/axios-update-sy", formData ).then(
                data => {
                    this.axiosResponse = data;
                    if( data.code == 200 ){
                        this.getSchoolYears();
                        
                        setTimeout( function(){
                            $("#response_msg").hide();
                            $("#modal-update-sy").modal("hide");
                            event.target.reset();
                        }, 2000 );
                    }else{
                        // event.target.reset();
                        setTimeout( function(){
                            $("#response_msg").hide();
                        }, 3000 );
                    }
            });
            
        },
        postAxios: function( post_uri, formdata ){
            this.axiosResponseStatus = null;
            this.axiosResponse = null;
            return axios.post( this.currentUrl + post_uri, formdata ).then(
                response => { return response.data }
            );
        },
        getSchoolYears: function()
        {
            axios.get(this.currentUrl + "/get-school-years").then( 
                response => ( this.schoolyears = response.data  )
            );
        }
    },
    created() {
        axios.get(this.currentUrl + "/get-school-years").then( 
            response => ( this.schoolyears = response.data  )
        );
    }

});