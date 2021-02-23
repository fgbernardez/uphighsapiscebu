import { BASE_URL } from './constant.js';


new Vue({

    el: "#admin_request_app",
    data: {
        home_url: BASE_URL,
        // home_url: window.location.origin,
        allRequest: null,
        requestToUpdate: null,
        responseData: null,
        requestToDelete: null,
        requestToUpdateStatus: null,
        reasondetails: null
    },
    methods:{

        updateRequest: function( request_id, req_status ){
            this.requestToUpdateStatus = req_status;
            this.requestToUpdate = request_id;
            $("#modal-update-request").modal("show");
        },

        submitupdateRequest: function(){
            var formData = $("#updateRequestForm").serialize();
            axios.post( this.home_url + "/axios-update-request", formData ).then(
                response => {
                    // console.log( response.data );
                    this.responseData = response.data 
                    $(".responsedata_div").show();
                    if( this.responseData.code == 200 ){
                        // this.getAllRequest();
                        setTimeout( function(){
                            $(".responsedata_div").hide();
                            $("#modal-update-request").modal("hide");
                        }, 2000 );
                        location.reload();
                    } else {
                        setTimeout( function(){
                            $(".responsedata_div").hide();
                            // event.target.reset();
                        }, 2000 );
                    }
                }
            );
        },
        deleteRequest: function( request_id ){
            this.requestToDelete = request_id;

            $("#confirmationModal").modal("show");
        },
        confirmationBtn: function(){

            axios.post( this.home_url + "/axios-delete-request", { "request_id": this.requestToDelete } ).then(
                response => {
                    // this.getAllRequest();
                    $("#confirmationModal").modal("hide");
                    location.reload();
                }

            );

        },
        viewreason: function( reason ){
            this.reasondetails = reason;
            $("#viewreasonModal").modal("show");
        },
        getAllRequest: function(){
            axios.get( this.home_url + '/axios-admin-get-all-request' ).then(
                response => {
                    // console.log( response.data );
                    this.allRequest = response.data;
                }
            );
        }

    },
    created(){
        
        axios.get( this.home_url + '/axios-admin-get-all-request' ).then(
            response => {
                // console.log( response.data );
                this.allRequest = response.data;
            }
        );
    }

});