import { BASE_URL } from './constant.js';


new Vue({

    el: '#app-users',
    data: {
        // currentUrl: window.location.protocol + "//" +window.location.hostname + '/v2gradingsystem',
        currentUrl: BASE_URL,
        // currentUrl: window.location.origin,
        users: null,
        ajaxResponse: null,
        ajaxResponseStatus: null,
        userIdToDelete: null,
        allUsers: false,
        teacherUsers: false,
        adminUsers: false,
        userToUpdate: []
    },
    methods: {
        createUser: function(){
            this.ajaxResponseStatus = null;
            this.ajaxResponse = null;
            $("#modal-create-user").modal("show");
        },
        submitUser: function (event) {
            var formdata = $("#createUserForm").serialize();
            // this.postRequest( "/ajax-add-user", formdata );
            // this.getRequest( "/ajax-get-users" );

            axios.post( this.currentUrl + "/ajax-add-user", formdata ).then(
                response => {
                     this.ajaxResponse = response.data
                     console.log( response.data );
                     this.ajaxResponseStatus = response.data.status 
                     $("#responsedata").show();
                     
                    if( this.ajaxResponse.code == 201 ){
                        // this.getAllRequest();
                        setTimeout( function(){
                            location.reload();
                        }, 2000 );
                    } else {
                        setTimeout( function(){
                            $("#responsedata").hide();
                            event.target.reset();
                        }, 2000 );
                    }
                }
            );

            // $(".responsedata").show();
            // setTimeout( function(){
            //     $(".responsedata").hide();
            //     $("#modal-create-user").modal("hide");
            //     this.ajaxResponse = null;
            //     event.target.reset();
            // }, 2000 );
            // location.reload();
            
        },
        deleteUser: function( user_id ){
            this.userIdToDelete = user_id;
            $( "#confirmationModal" ).modal("show");
        },
        updateUser: function( user_id ){
            // this.getSingleRequestToUpdate( "/ajax-get-user-single/" + user_id );
            $(".responsedata").hide();
            this.getSingleRequestToUpdate( "/ajax-get-user-single/" + user_id ).then( data => {
                this.userToUpdate = data.user_data[0];
                $("#modal-update-user").modal("show");
            } );

        },
        saveUserUpdate: function( event ){
            
            var formdata = $("#updateUserForm").serialize();
            // console.log( formdata );
            // this.postRequest( "/ajax-update-user", formdata );
            // this.getRequest( "/ajax-get-users" );

            axios.post( this.currentUrl + "/ajax-update-user", formdata ).then(
                response => {
                     this.ajaxResponse = response.data
                     console.log( response.data );
                    //  this.ajaxResponseStatus = response.data.status 
                    $(".responsedata").show();
                     
                    if( this.ajaxResponse.code == 201 ){
                        // this.getAllRequest();
                        setTimeout( function(){
                            location.reload();
                        }, 2000 );
                    } else {
                        setTimeout( function(){
                            $(".responsedata").hide();
                            // event.target.reset();
                        }, 2000 );
                    }
                }
            );


            // setTimeout( function(){
            //     $(".responsedata").hide();
            //     $("#modal-update-user").modal("hide");
            //     event.target.reset();
            // }, 2000 );
            // location.reload();
            

            event.stopImmediatePropagation();
            return false;
        },
        getAllUsers: function(){
            this.getRequest( "/ajax-get-users" );

        },
        getUsersBy: function( user_type ){
            this.getRequest( "/ajax-get-users-by/"+user_type );
        },

        confirmationBtn: function(e){
            var formData = { "user_id": this.userIdToDelete };
            // this.postRequest( "/ajax-delete-user", formData );
            $( "#confirmationModal" ).modal("hide");
            $( "#notificationModal" ).modal("show");
            // this.getRequest( "/ajax-get-users" );
            // location.reload();
            // e.stopImmediatePropagation();
            // return false;


            axios.post( this.currentUrl + "/ajax-delete-user", formData ).then(
                response => {
                     this.ajaxResponse = response.data
                     console.log( response.data );
                    //  this.ajaxResponseStatus = response.data.status 
                    // $(".responsedata").show();
                     
                    if( this.ajaxResponse.code == 200 ){
                        // this.getAllRequest();
                        setTimeout( function(){
                            location.reload();
                        }, 2000 );
                    } else {
                        setTimeout( function(){
                            // $(".responsedata").hide();
                            // event.target.reset();
                            location.reload();
                        }, 2000 );
                    }
                }
            );



        },
        getRequest: function( request_uri ){
            axios.get(this.currentUrl + request_uri).then( 
                // response => (this.users = response.data)
                response => { 
                    this.users = response.data
                    setTimeout(function() { $("#users-tbl").DataTable(); }, 1000);
                }

            );
        },
        getSingleRequestToUpdate: function( request_uri ){
            return axios.get(this.currentUrl + request_uri).then( 
                response => {return response.data}
            );

        },
        postRequest: function( post_uri, formdata ){
            this.ajaxResponseStatus = null;
            this.ajaxResponse = null;
            axios.post( this.currentUrl + post_uri, formdata ).then(
                response => ( this.ajaxResponse = response.data, this.ajaxResponseStatus = response.data.status )
            );
        }
    },

    created() {
        this.getRequest( "/ajax-get-users" );
    },

    computed() {
        this.getRequest( "/ajax-get-users" );
    }
});