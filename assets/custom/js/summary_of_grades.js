import { BASE_URL } from './constant.js';



new Vue({
    el: "#summary-of-grades",
    data:{
        home_url: BASE_URL,
    },
    methods: {
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
    },
    created(){
    }

});
