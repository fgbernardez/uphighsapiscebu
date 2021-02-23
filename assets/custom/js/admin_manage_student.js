import { BASE_URL } from './constant.js';


new Vue({

    el: '#admin-manage-student',
    data: {
        home_url: BASE_URL,
        // home_url: window.location.origin,
        student_id: null,
        grade_level: null,
        sy_id: null,
        grade_average: null,
		responseData: null,
        monthsClass: null,
        school_days: null,
        present_days: null,
        times_tardy: null,
        behavior_first_grading: null,
        behavior_second_grading: null,
        behavior_third_grading: null,
		behavior_fourth_grading: null,

    },
    methods: {
        averageModal: function(){
            $("#modal-average").modal("show");
        },
        submitAverageForm: function(){
            var formData = $("#averageForm").serialize();
            axios.post( this.home_url + '/axios-add-average', formData ).then(
                response => {
                    this.responseData = response.data;

                    $(".responsedata_div").show();
                    if( this.responseData.code == 200 ){
                        this.getStudentGradeAverage();
                        setTimeout( function(){
                            $(".responsedata_div").hide();
                            $("#modal-average").modal("hide");
                        }, 2000 );
                    } else {
                        setTimeout( function(){
                            $(".responsedata_div").hide();
                            event.target.reset();
                        }, 2000 );
                    }
                    
                }
            );
        },
        getStudentGradeAverage: function(){
            axios.post( this.home_url + '/axios-get-student-grade-average', { "sy_id": this.sy_id, "student_id": this.student_id } ).then(
                response => {
                    this.grade_average = response.data.data;
                    // console.log( response.data );
                }
            );
        },
        schoolDaysModal: function()
        {
            $("#modal-school-days").modal("show");
            
        },
        submitSchoolDaysForm: function(){
			var formData = $("#schoolDaysForm").serialize();
            axios.post( this.home_url + '/axios-add-school-days', formData ).then(
                response => {
                    this.responseData = response.data;
                    $(".responsedata_div").show();
                    if( this.responseData.code == 200 ){
                        this.getSchoolDays();
                        setTimeout( function(){
                            $(".responsedata_div").hide();
                            $("#modal-school-days").modal("hide");
                        }, 2000 );
                    } else {
                        setTimeout( function(){
                            $(".responsedata_div").hide();
                            event.target.reset();
                        }, 2000 );
                    }
                    
                }
            );
        },
        getSchoolDays: function(){
            axios.post( this.home_url + '/axios-get-school-days', {"sy_id": this.sy_id, "grade_level": this.grade_level, "student_id": 0, "attendance_type": 1} ).then(
                response => {
					this.school_days = response.data.data;
                }
            );
        },

        presentDaysModal: function()
        {
            $("#modal-present-days").modal("show");
            
        },
        submitPresentDaysForm: function(){
			var formData = $("#presentDaysForm").serialize();
            axios.post( this.home_url + '/axios-add-present-days', formData ).then(
                response => {
                    this.responseData = response.data;
                    $(".responsedata_div").show();
                    if( this.responseData.code == 200 ){
                        this.getPresentDays();
                        setTimeout( function(){
                            $(".responsedata_div").hide();
                            $("#modal-present-days").modal("hide");
                        }, 2000 );
                    } else {
                        setTimeout( function(){
                            $(".responsedata_div").hide();
                            event.target.reset();
                        }, 2000 );
                    }
                    
                }
            );
        },
        getPresentDays: function(){
            axios.post( this.home_url + '/axios-get-student-present-days', {"sy_id": this.sy_id, "grade_level": this.grade_level, "student_id": this.student_id, "attendance_type": 2} ).then(
                response => {
                    this.present_days = response.data.data;
                    // console.log( response.data );
                }
            );
		},
		
        timesTardyModal: function()
        {
            $("#modal-times-tardy").modal("show");
            
        },
        submitTimesTardyForm: function(){
            var formData = $("#timesTardyForm").serialize();
            axios.post( this.home_url + '/axios-add-times-tardy', formData ).then(
                response => {
                    this.responseData = response.data;
                    $(".responsedata_div").show();
                    if( this.responseData.code == 200 ){
                        this.getTimesTardy();
                        setTimeout( function(){
                            $(".responsedata_div").hide();
                            $("#modal-times-tardy").modal("hide");
                        }, 2000 );
                    } else {
                        setTimeout( function(){
                            $(".responsedata_div").hide();
                            event.target.reset();
                        }, 2000 );
                    }
                    
                }
            );
        },
        getTimesTardy: function(){
            axios.post( this.home_url + '/axios-get-student-times-tardy', {"sy_id": this.sy_id, "grade_level": this.grade_level, "student_id": this.student_id, "attendance_type": 3} ).then(
                response => {
                    this.times_tardy = response.data.data;
                    // console.log( response.data );
                }
            );
		},

		addTotalDays: function(formname){
			var unindexed_array = $("#"+formname).serializeArray();
			var indexed_array = {};
		
			$.map(unindexed_array, function(n, i){
				indexed_array[n['name']] = n['value'];
			});
		
			// delete some index;
			delete indexed_array.attendance_type;
			delete indexed_array.grade_level;
			delete indexed_array.student_id;
			delete indexed_array.sy_id;

			var sum = 0;
			for( var el in indexed_array ) {
				if( indexed_array.hasOwnProperty( el ) ) {
				sum += parseFloat( indexed_array[el] );
				}
			}
			$("#"+formname+"TotalDays").val(sum);
		},


    },
    created(){
        var path_url = window.location.pathname.split('/');
        this.student_id = path_url[path_url.length-1];
        this.grade_level = path_url[path_url.length-2];
		this.sy_id = path_url[path_url.length-3];
		
		// GET MONTH'S CLASS
		axios.post( this.home_url + '/axios-get-months-class', { "sy_id": this.sy_id, "grade_level": this.grade_level} ).then(
			response => {
				this.monthsClass = response.data;
			}
		);

        axios.post( this.home_url + '/axios-get-student-grade-average', { "sy_id": this.sy_id, "student_id": this.student_id } ).then(
            response => {
                this.grade_average = response.data.data;
            }
        );

        axios.post( this.home_url + '/axios-get-school-days', {"sy_id": this.sy_id, "grade_level": this.grade_level, "student_id": 0, "attendance_type": 1} ).then(
		// axios.post( this.home_url + '/axios-get-school-days', { "sy_id": this.sy_id } ).then(
            response => {
				this.school_days = response.data.data;
            }
        );

        axios.post( this.home_url + '/axios-get-student-present-days', {"sy_id": this.sy_id, "grade_level": this.grade_level, "student_id": this.student_id, "attendance_type": 2} ).then(
            response => {
                this.present_days = response.data.data;
                // console.log( response.data );
            }
        );
        axios.post( this.home_url + '/axios-get-student-times-tardy', {"sy_id": this.sy_id, "grade_level": this.grade_level, "student_id": this.student_id, "attendance_type": 3} ).then(
            response => {
                this.times_tardy = response.data.data;
                // console.log( this.times_tardy );
            }
        );

        axios.post( this.home_url + '/axios-get-student-behavior', { "sy_id": this.sy_id, "student_id": this.student_id } ).then(
            response => {
                // this.times_tardy = response.data.data;

                this.behavior_first_grading = response.data[0];
                this.behavior_second_grading = response.data[1];
                this.behavior_third_grading = response.data[2];
                this.behavior_fourth_grading = response.data[3];
                // this.behavior_first_grading
                // console.log( response.data );
            }
        );
        
    }


});
