import { BASE_URL } from './constant.js';


$( function () {
    // const homeurl = "/v2gradingsystem";
    const homeurl = BASE_URL;
    // const homeurl = window.location.origin;

    $("#loginForm").submit( function( e ){
        var email = $("input[name='email']").val();
        var pass = $("input[name='password']").val();
        $.ajax({
            url: 'process-login',
            type: 'POST',
            data: {email: email, password: pass},
            success: function(data)
            {
               var response = JSON.parse(data);
                if( response.code == 204 ){
                    $(".result_msg").html('<div class="callout callout-danger"><p>Invalid username and password!</p></div>');
                } else if( response.code == 203 ){ 
                    $(".result_msg").html('<div class="callout callout-danger"><p>This user is no longer active</p></div>');
                }else {
                    $(".result_msg").html('<div class="callout callout-success"><p>Successfully login!</p></div>');
                    setTimeout( function(){
                        window.location = homeurl ;
                    }, 3000 );
                }
            }, error: function(data){
                $(".result_msg").html('<div class="callout callout-danger"><p>Error occured!</p></div>');
            }
        });
        e.preventDefault();
    } );
});



function printStudentGrade( divID ){

    var home_url = BASE_URL;
    // alert( home_url );

    var divElements = document.getElementById(divID).innerHTML;
    //Get the HTML of whole page
    var oldPage = document.body.innerHTML;

    //Reset the page's HTML with div's HTML only
    document.body.innerHTML = 
      "<html><head><title></title><link href='"+ home_url +"assets/custom/css/style.css' rel='stylesheet' type='text/css' /></head><body>" + 
      divElements + "</body>";

    //Print Page
    window.print();

    //Restore orignal HTML
    document.body.innerHTML = oldPage;
}


$(document).ready(function() {
    $('.enter-new-name').click(function() {
        $('.enter-new-div').show();
        $('#enter-new').attr('name', 'subject_name').attr('required', 'required');
        $('.select-div').hide();
        $('#select-list').removeAttr("name").removeAttr('required');

    });
    $('.select-from-list').click(function() {
        $('#select-list').attr('name', 'subject_name').attr('required', 'required');
        $('.select-div').show();
        $('#enter-new').removeAttr("name").removeAttr('required');
        $('.enter-new-div').hide();
    });
});

