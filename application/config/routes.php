<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller']                                = 'TeacherController';
$route['createadminuser']                                   = 'MainController/createadminuser';
$route['login']                                             = 'MainController/login';
$route['logout']                                            = 'MainController/logout';
$route['process-login']                                     = 'MainController/proccessLogin';


//ADMIN
$route['admin']                                             = 'AdminController';
$route['admin/manage-users']                                = 'AdminController/users';
$route['admin/manage-users/(:any)']                         = 'AdminController/users/$1';
$route['admin/schoolyear']                                  = 'AdminController/schoolyear';
$route['admin/SY/(:num)']                                   = 'AdminController/SY/$1';
$route['admin/SY/(:num)/(:any)']                            = 'AdminController/SY_Grade/$1/$2';
$route['admin/SY/(:num)/(:any)/(:num)']                     = 'AdminController/SY_ViewStudent/$1/$2/$3';
$route['admin/manage-students']                             = 'AdminController/manageStudent';
$route['admin/manage-students/(:any)']                      = 'AdminController/manageStudent/$1';
$route['admin/profile']                                     = 'AdminController/profile';
$route['admin/request']                                     = 'AdminController/requestList';
$route['admin/request/(:any)']                              = 'AdminController/requestList/$1';
$route['admin/history']                                     = 'AdminController/history';
$route['admin/history/(:any)']                              = 'AdminController/history/$1';
$route['admin/view-students-grade/(:num)/(:any)']           = 'AdminController/viewStudentGrades/$1/$2';
$route['admin/summary-of-grades/(:num)/(:any)/(:num)']      = 'AdminController/gradeSummary/$1/$2/$3';
$route['admin/view-ranking/(:num)/(:num)']                  = 'AdminController/viewRanking/$1/$2';
$route['admin/view-teachers/(:num)']                  		= 'AdminController/viewTeachers/$1';





//TEACHER PANEL
$route['schoolyear']                                        = 'TeacherController/schoolyear';
$route['profile']                                           = 'TeacherController/profile';
$route['schoolyear/(:num)']                                 = 'TeacherController/assignedSubjects/$1';
$route['assigned-subject/(:num)']                           = 'TeacherController/subjectAssigned/$1';
// $route['subject/(:num)/(:num)']                             = 'TeacherController/subjectAssigned/$1/$2';
$route['subject/(:num)/(:num)']                             = 'TeacherController/subjectAssigned/$1/$2';
$route['manage-student/(:num)/(:num)/(:num)']               = 'TeacherController/manageStudent/$1/$2/$3';
$route['request']                                           = 'TeacherController/requestList';
$route['request/(:any)']                                    = 'TeacherController/requestList/$1';


//REQUEST EDIT GRADE
$route['axios-get-teacher-request']                         = 'RequestController/teacherRequestList';
$route['axios-get-single-request']                          = 'RequestController/getSingleRequest';
$route['axios-update-request']                              = 'RequestController/updateRequest';
$route['axios-delete-request']                              = 'RequestController/deleteRequest';
$route["axios-admin-get-all-request"]                       = 'RequestController/admingetallrequest';




// AJAX REQUEST

// ADMIN MANAGE USERS
$route["ajax-get-users"]                                    = 'AjaxRequestController/getUsers';
$route["ajax-get-users-by/(:any)"]                          = 'AjaxRequestController/getUsersBy/$1';
$route["ajax-add-user"]                                     = 'AjaxRequestController/addUser';
$route["ajax-delete-user"]                                  = 'AjaxRequestController/deleteUser';
$route["ajax-get-user-single/(:any)"]                       = 'AjaxRequestController/getSingleUser/$1';
$route["ajax-update-user"]                                  = 'AjaxRequestController/updateUser';




// SCHOOL YEAR
$route["axios-create-sy"]                                   = 'AxiosSchoolYearController/createSY';
$route["get-school-years"]                                  = 'AxiosSchoolYearController/getSchoolYears';
$route["axios-delete-sy"]                                   = 'AxiosSchoolYearController/deleteSY';
$route["axios-get-single-sy"]                               = 'AxiosSchoolYearController/getSingleSY';
$route["axios-update-sy"]                                   = 'AxiosSchoolYearController/updateSY';
$route["axsio-get-date-deadline"]                           = 'AxiosSchoolYearController/getDateDeadline';




// STUDENT
$route["axios-get-students"]                                = 'StudentController/getStudents';
$route["axios-add-student"]                                 = 'StudentController/addStudent';
$route["axios-get-student"]                                 = 'StudentController/getSingleStudent';
$route["axios-delete-student"]                              = 'StudentController/deleteStudent';
$route["axios-update-student"]                              = 'StudentController/updateStudent';


//GRADE
$route["axios-get-single-student-grade"]                    = 'GradeController/getStudentSingleGrade';
$route["axios-get-single-student-behavior"]                 = 'GradeController/getStudentSingleBehavior';
$route["axios-get-single-student-grading-behavior"]         = 'GradeController/getStudentSingleGradingBehavior';
$route["axios-get-student-behavior"]                        = 'GradeController/getStudentBehavior';
$route["axios-add-grade"]                                   = 'GradeController/updateGrade';
$route["axios-add-behavior"]                                = 'GradeController/updateBehavior';

//AVERAGE
$route["axios-add-average"]                                 = 'GradeController/addAverage';
$route["axios-get-student-grade-average"]                   = 'GradeController/getStudentGradeAverage';


//ATTENDANCE
$route["axios-get-months-class"]                            = 'AttendanceController/getMonthsClass';
$route["axios-get-school-days"]                             = 'AttendanceController/schoolDays';
$route["axios-get-student-present-days"]                    = 'AttendanceController/getStudentPresentDays';
$route["axios-get-student-times-tardy"]                     = 'AttendanceController/getStudentTimesTardy';
$route["axios-add-school-days"]                             = 'AttendanceController/addSchoolDays';
$route["axios-add-present-days"]                            = 'AttendanceController/addPresentDays';
$route["axios-add-times-tardy"]                             = 'AttendanceController/addTimesTardy';




//TEACHER
$route["get-teachers"]                                      = 'StudentController/updateStudent';


//ADD SUBJECT AND STUDENT TO SCHOOL YEAR
$route["axios-add-subject"]                                 = 'SubjectController/addSubject';
$route["axios-get-subjects"]                                = 'SubjectController/getSubjects';
$route["axios-delete-subject"]                              = 'SubjectController/deleteSubject';
$route["axios-get-single-subject"]                          = 'SubjectController/getSingleSubject';
$route["axios-update-subject"]                              = 'SubjectController/updateSubject';

$route["axios-add-student-to-sy"]                           = 'AxiosSchoolYearController/addStudent';
$route["axios-get-students-school-year"]                    = 'AxiosSchoolYearController/getStudentsSchoolYear';
$route["axios-get-students-to-add"]                         = 'AxiosSchoolYearController/getStudentsToAdd';
$route["axios-remove-student-in-grade-level"]               = 'AxiosSchoolYearController/removeStudentingradelevel';


$route["ajax-get-teachers-to-assign"]                       = 'AxiosSchoolYearController/getTeachersToAssign';





$route['404_override'] = 'ErrorPageController/Page404';
$route['translate_uri_dashes'] = FALSE;
