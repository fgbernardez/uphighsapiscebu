import { BASE_URL } from './constant.js';



new Vue({


    el: "#school-year-grade-level",
    data:{
        home_url: BASE_URL,
        // home_url: window.location.origin,
        teachers: null,
        subjects: null,
        formData: null,
        sy_id: null,
        grade_level: null,
        responseData: null,
        subjectToDelete: null,
        subjectToUpdate: null,
        students: null,
        getStudentsSchoolYear: null,
        addresponseData: null,
        studentToRemove_id: null,
        studentToRemove_name: null,
        re_sy_id: null
        
    },
    methods: {

        removeStudent: function ( student_id, student_name, re_sy_id ){
            this.studentToRemove_id = student_id;
            this.studentToRemove_name = student_name;
            this.re_sy_id = re_sy_id;
            $("#confirmationRemoveStudent").modal("show");
        },

        confirmationBtnRemoveStudent: function(){

            axios.post( this.home_url + '/axios-remove-student-in-grade-level', { "student_id": this.studentToRemove_id, "sy_id": this.re_sy_id  } ).then(
                response =>{
                    if( response.data.code == 200 ){
                        // this.getSubjects();
                        axios.post( this.home_url + '/axios-get-students-school-year', { "sy_id": this.sy_id, "grade_level": this.grade_level }).then(
                            response => {
                                // console.log( response.data.data )
                                this.getStudentsSchoolYear = response.data.data;
                            }
                        );
                        
                        setTimeout( function(){
                            $("#confirmationRemoveStudent").modal("hide");
                        }, 1000 );
                    }
                }
            );

		},
		
		getSubjectFailedGradesModal: function (stdName, quarter, failedGrades ) {

			var hdrHtml = '<table class="table table-bordered"> <tbody> <tr> <th>Student Name:</th> <th>Quarter:</th> </tr> <tr> <td>'+stdName+'</td> <td>'+quarter+'</td> </tr> </tbody> </table>';
			var failed_grades = failedGrades.failed_grades;
			var subjectsNoGrade = failedGrades.subjectsNoGrade;
			var failedGradesTbl = "";
			var subjectsNoGradeTbl = "";
			if (subjectsNoGrade != null && subjectsNoGrade != ''){
				subjectsNoGradeTbl += '<table class="table table-bordered"><tbody><tr><th style="text-align: center;">SUBJECTS NO GRADE</th></tr>'; 
				for (var i = 0; i < subjectsNoGrade.length; i++) {
					subjectsNoGradeTbl += '<tr><td>'+subjectsNoGrade[i]["subject_name"]+'</td></tr>';
				}
				subjectsNoGradeTbl += '</tbody></table>';
			}

			if (failed_grades != null && failed_grades != ''){
				failedGradesTbl += '<h5 style="    font-weight: bold; text-align: center;">FAILED GRADES</h5>';
				failedGradesTbl += '<table class="table table-bordered"><tbody><tr><th style="width: 50%;">SUBJECT</th><th style="width: 50%;">GRADE</th></tr>'; 
				for (var i = 0; i < failed_grades.length; i++) {
					failedGradesTbl += '<tr><td>'+failed_grades[i]["subject_name"]+'</td><td>'+failed_grades[i]["quarter_grade"]+'</td></tr>';
				}
				failedGradesTbl += '</tbody></table>';
			}
			document.getElementById("hdrData").innerHTML = hdrHtml;
			document.getElementById("subjectsNoGradeTable").innerHTML = subjectsNoGradeTbl;
			document.getElementById("failedGradesTable").innerHTML = failedGradesTbl;
			$("#view-failed-grades-and-subjects-no-grade").modal("show");
		},

        // SUBJECT SECTION
        addSubject: function(){
            $("#modal-add-subject").modal("show");

        },
        submitAddSubject: function( event ){

            this.formData = $("#addSubjectForm").serialize();
            // alert( this.formData );
            axios.post( this.home_url + '/axios-add-subject', this.formData ).then(
                response =>{
                    // console.log( response.data );
                    this.addresponseData = response.data;
                    $("form#addSubjectForm .responsedata_div").show();
                    if( this.addresponseData.code == 200 ){
                        this.getSubjects();
                        setTimeout( function(){
                            $("form#addSubjectForm .responsedata_div").hide();
                            $("#modal-add-subject").modal("hide");
                            event.target.reset();
                        }, 2000 );
                    } else {
                        setTimeout( function(){
                            $(".responsedata_div").hide();
                            event.target.reset();
                        }, 2000 );
                    }
                }
            )
        },

        getSubjects: function(){
            axios.post( this.home_url + '/axios-get-subjects', { "sy_id": this.sy_id, "grade_level": this.grade_level } ).then(
                response => {
                    this.subjects = response.data.data;
                    // console.log( this.subjects );
                }
            );
        },
        deleteSubject: function( subject_id ){
            this.subjectToDelete = subject_id;
            $("#confirmationDeleteSubject").modal("show");
        },
        confirmationBtnDeleteSubject: function(){
            axios.post( this.home_url + '/axios-delete-subject', { "subject_id": this.subjectToDelete } ).then(
                response =>{
                    if( response.data.code == 200 ){
                        this.getSubjects();
                        setTimeout( function(){
                            $("#confirmationDeleteSubject").modal("hide");
                        }, 1000 );
                    }
                }
            );

        },
        updateSubject: function( subject_id ){

            axios.post( this.home_url + '/axios-get-single-subject', { "subject_id": subject_id } ).then(
                response =>{
                    // console.log(response.data.data[0]);
                    this.subjectToUpdate = response.data.data[0];
                    $("#modal-update-subject").modal("show");
                }
            );

        },
        submitUpdateSubject: function( ){

            this.formData = $("#updateSubjectForm").serialize();
            axios.post( this.home_url + '/axios-update-subject', this.formData ).then(
                response =>{
                    // console.log(response.data);
                    this.responseData = response.data;
                    $(".responsedata_div").show();
                    if( this.responseData.code == 200 ){
                        this.getSubjects();
                        setTimeout( function(){
                            $(".responsedata_div").hide();
                            $("#modal-update-subject").modal("hide");
                        }, 2000 );
                    }
                }
            );
        },
        submitAddStudent: function(){
            var student_id =  $("#student_id_to_add").val();
            var sy_id =  $("form#addStudentForm input[name='sy_id']").val();
            var grade_level =  $("form#addStudentForm input[name='grade_level']").val();
            this.formData = {
                "student_id": student_id,
                "sy_id": sy_id,
                "grade_level": grade_level
            };
            // alert( this.formData );
            axios.post( this.home_url + '/axios-add-student-to-sy', this.formData ).then(
                response =>{
                    var dataResponse = response.data;
                    if( dataResponse.code == 200 ){
                        this.getStudentsToAddAndStudentsSchoolYear();
                        setTimeout( function(){
                            $("#modal-add-student").modal("hide");
                        }, 1000 );
                    }
                    // console.log( response.data );
                }
            )
        },

        getStudentsToAddAndStudentsSchoolYear()
        {
            axios.post(this.home_url + "/axios-get-students-to-add", { "sy_id": this.sy_id, "grade_level": this.grade_level }).then( 
                response => { 
                    this.students = response.data;
                    // console.log( this.students );
                }
            );
            axios.post( this.home_url + '/axios-get-students-school-year', { "sy_id": this.sy_id, "grade_level": this.grade_level }).then(
                response => {
                    // console.log( response.data.data )
                    this.getStudentsSchoolYear = response.data.data;
                }
            );
        }


    },
    created(){
        axios.get( this.home_url + '/ajax-get-teachers-to-assign' ).then(
            response => {
                this.teachers = response.data;
            }
        );

        var path_url = window.location.pathname.split('/');
        this.grade_level = path_url[path_url.length-1];
        this.sy_id = path_url[path_url.length-2];

        axios.post( this.home_url + '/axios-get-subjects', { "sy_id": this.sy_id, "grade_level": this.grade_level } ).then(
            response => {
                this.subjects = response.data.data;
                // console.log( this.subjects );
            }
        );
        axios.post(this.home_url + "/axios-get-students-to-add", { "sy_id": this.sy_id, "grade_level": this.grade_level }).then( 
            response => { 
                this.students = response.data;
                // console.log( this.students );
            }
        );

        axios.post( this.home_url + '/axios-get-students-school-year', { "sy_id": this.sy_id, "grade_level": this.grade_level }).then(
            response => {
                // console.log( response.data.data )
                this.getStudentsSchoolYear = response.data.data;
            }
        );
    }

});
