import { BASE_URL } from './constant.js';


new Vue({

    el: "#student-app",
    data:{
        
        // home_url: window.location.protocol + "//" +window.location.hostname + '/v2gradingsystem',
        home_url: BASE_URL,
        // home_url: window.location.origin,
        name: "awdadwad",
        formData: null,
        responseData: null,
        students: null,
        studentToDelete: null,
        deleteResponse: null,
        studentToUpdate: null,
        updateResponse: null

    },
    methods:{

        submitAddStudent: function( event ){
            this.formData = $("#addStudentForm").serialize();
            this.postAxios( "/axios-add-student", this.formData ).then( data => {
                this.responseData = data;
                $("#response_msg").show();
                if( data.code == 200 ){
                    // this.getSudents();
                    setTimeout( function(){
                        $("#response_msg").hide();
                        // $("#modal-add-student").modal("hide");
                        event.target.reset();
                    }, 2000 );
                    location.reload();
                }else{
                    event.target.reset();
                    setTimeout( function(){
                        $("#response_msg").hide();
                    }, 3000 );
                }
            } );

        },
        deleteStudent: function( student_id ){

            var std_id = { "student_id": student_id };
            $("#confirmationDeleteStudentModal").modal("show");
            axios.post( this.home_url + "/axios-get-student", std_id ).then(
                response => { 
                    this.studentToDelete = response.data;
                }
            );
        },
        confirmationBtnDeleteStudent: function(){
            
            this.postAxios( "/axios-delete-student", { "student_id": this.studentToDelete.student_id } ).then(
                response => {
                    this.deleteResponse = response;
                    // $("#confirmationDeleteStudentModal").modal("hide");
                    // this.getSudents();
                    // $("#deleteResponseModal").modal( "show" );
                    // setTimeout( function(){
                    //     $("#confirmationDeleteStudentModal").modal("hide");
                    //     this.getSudents();
                    //     $("#deleteResponseModal").modal( "show" );
                    //     event.target.reset();
                    // }, 5000 );
                    location.reload();
                    
                }
            );

        },
        updateStudent: function( student_id )
        {
            // studentToUpdate
            var std_id = { "student_id": student_id };
            
            axios.post( this.home_url + "/axios-get-student", std_id ).then(
                response => { 
                    this.studentToUpdate = response.data;
                }
            );
            $("#modal-update-student").modal( "show" );

        },

        submitUpdateStudent: function( event ){

            this.formData = $("#updateStudentForm").serialize();
            this.postAxios( "/axios-update-student", this.formData ).then(
                response => {
                    this.updateResponse = response;
                    $("#upt_response_msg").show();
                    if( response.code == 200 ){
                        // this.getSudents();
                        setTimeout( function(){
                            $("#upt_response_msg").hide();
                            $("#modal-update-student").modal("hide");
                            event.target.reset();
                        }, 2000 );
                        location.reload();
                        
                    } else {
                        setTimeout( function(){
                            $("#upt_response_msg").hide();
                        }, 2000 );
                    }
                }
            );

        },
        postAxios: function( post_uri, formdata ){
            this.axiosResponseStatus = null;
            this.axiosResponse = null;
            return axios.post( this.home_url + post_uri, formdata ).then(
                response => { return response.data }
            );
        },

        getSudents: function(){
            axios.get(this.home_url + "/axios-get-students").then( 
                response => { 
                    this.students = response.data
                    setTimeout(function() { $("#students-tbl").DataTable(); }, 1000);
                }
                
            );
        }
    },
    created() {
        axios.get(this.home_url + "/axios-get-students").then( 
            response => { 
                this.students = response.data
                setTimeout(function() { $("#students-tbl").DataTable(); }, 1000);
            }
            
        );
    }


});
