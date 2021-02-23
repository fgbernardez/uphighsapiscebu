import { BASE_URL } from './constant.js';


new Vue({

    el: '#teacher-manage-student-app',
    data: {
        home_url: BASE_URL,
        // home_url: window.location.origin,
        studentGrade: null,
        behaviorGrade: null,
        behaviorGrading: null,
        student_id: null,
        sy_id: null,
        subject_id: null,
        responseData: null,
        responseUpdateGradeData: null
    },

    methods: {



        updateRequestedEditGradeModal: function( sy_id, subject_id, student_id )
        {
            axios.post( this.home_url + '/axios-get-single-student-grade', { "sy_id": sy_id, "subject_id": subject_id, "student_id": student_id } ).then(
                response => {
                    this.studentGrade = response.data.data;
                    $("#modal-requested-update-grade").modal("show");
                    // console.log(response.data  );
                }
            )
        },

        gradeModal: function( sy_id, subject_id, student_id )
        {
            axios.post( this.home_url + '/axios-get-single-student-grade', { "sy_id": sy_id, "subject_id": subject_id, "student_id": student_id } ).then(

                response => {
                    this.studentGrade = response.data.data;
                    $("#modal-grade").modal("show");
                    // console.log(response.data  );
                }
            )
        },

        behaviorModal: function( sy_id, subject_id, student_id, grading )
        {

            axios.post( this.home_url + '/axios-get-single-student-grading-behavior', { "sy_id": sy_id, "subject_id": subject_id, "student_id": student_id, "grading": grading } ).then(
                response => {
                    this.behaviorGrading = response.data.data;
                    $("#modal-behavior").modal("show");
                    // console.log(response.data  );
                }
            )
        },
        
        submitRequestedEditGradeForm: function( event ){
            var formData = $("#requestededitgradeForm").serialize();
            axios.post( this.home_url + '/axios-add-grade', formData ).then(
                response => {
                    this.responseUpdateGradeData = response.data
                    $(".responsedata_div").show();
                    if( this.responseUpdateGradeData.code == 200 ){
                        this.getGrade();
                        setTimeout( function(){
                            $("#modal-requested-update-grade").modal("hide");
                            $(".responsedata_div").hide();
                        }, 1000 );
                    } else {
                        setTimeout( function(){
                            $(".responsedata_div").hide();
                        }, 1000 );
                    }
                }
            );
        },
        submitGradeForm: function( event ){
            var formData = $("#gradeForm").serialize();
            axios.post( this.home_url + '/axios-add-grade', formData ).then(
                response => {
                    this.responseUpdateGradeData = response.data
                    $(".responsedata_div").show();
                    if( this.responseUpdateGradeData.code == 200 ){
                        this.getGrade();
                        setTimeout( function(){
                            $("#modal-grade").modal("hide");
                            $(".responsedata_div").hide();
                        }, 1000 );
                    } else {
                        setTimeout( function(){
                            $(".responsedata_div").hide();
                        }, 1000 );
                    }
                }
            );
        },
        submitBehaviorForm: function( event ){
            var formData = $("#behaviorForm").serialize();
            axios.post( this.home_url + '/axios-add-behavior', formData ).then(
                response => {
                    this.responseData = response.data
                    $(".responsedata_div").show();
                    if( response.data.code == 200 ){
                        this.getBehavior();
                        setTimeout( function(){
                            $("#modal-behavior").modal("hide");
                            $(".responsedata_div").hide();
                        }, 1000 );
                    } else {
                        setTimeout( function(){
                            $(".responsedata_div").hide();
                        }, 1000 );
                    }
                }
            );
        },
        getGrade: function(){
            axios.post( this.home_url + '/axios-get-single-student-grade', { "sy_id": this.sy_id, "subject_id": this.subject_id, "student_id": this.student_id } ).then(
                response => {
                    this.studentGrade = response.data.data;
                }
            );
        },
        getBehavior: function(){
            axios.post( this.home_url + '/axios-get-single-student-behavior', { "sy_id": this.sy_id, "subject_id": this.subject_id, "student_id": this.student_id } ).then(
                response => {
                    this.behaviorGrade = response.data;
                }
            );
        }
    },
    created(){
        var path_url = window.location.pathname.split('/');
        this.student_id = path_url[path_url.length-1];
        this.subject_id = path_url[path_url.length-2];
        this.sy_id = path_url[path_url.length-3];
        axios.post( this.home_url + '/axios-get-single-student-grade', { "sy_id": this.sy_id, "subject_id": this.subject_id, "student_id": this.student_id } ).then(
            response => {
                this.studentGrade = response.data.data;
            }
        );

        axios.post( this.home_url + '/axios-get-single-student-behavior', { "sy_id": this.sy_id, "subject_id": this.subject_id, "student_id": this.student_id } ).then(
            response => {
                this.behaviorGrade = response.data;
                // console.log( response.data );
            }
        );
    }
});