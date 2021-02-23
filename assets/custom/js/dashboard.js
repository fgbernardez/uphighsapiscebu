import { BASE_URL } from './constant.js';

new Vue({

    el: "#dashboard-app",
    data: {
        home_url: BASE_URL,
        // home_url: window.location.origin,
        deadlineDate: null,
        distance: null,
        name: "awdawd",
        grading: null,
        dateNow: null
    },

    created(){
    
        axios.get( this.home_url + '/axsio-get-date-deadline' ).then(
            response => {

                
                // console.log( this.deadlineDate )
                if( response.data.length === 0 ){ 
                    $("#default_counter").show();
                } else {
                    this.deadlineDate = response.data[0];
                    if( this.deadlineDate.grading == 1 ){
                        this.grading = "first grading";
                    } else if( this.deadlineDate.grading == 2 ){
                        this.grading = "second grading";
                    } else if( this.deadlineDate.grading == 3 ){
                        this.grading = "third grading";
                    } else if( this.deadlineDate.grading == 4 ){
                        this.grading = "fourth grading";
                    }
                    var countDownDate = new Date( this.deadlineDate.date_deadline +" "+ this.deadlineDate.time_deadline  ).getTime();
                    var x = setInterval(function() {
                    var now = new Date().getTime();
                    this.distance = countDownDate - now;
                    var days_exp = Math.floor(this.distance / (1000 * 60 * 60 * 24));
                    var hours_exp = Math.floor((this.distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes_exp = Math.floor((this.distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds_exp = Math.floor((this.distance % (1000 * 60)) / 1000);
                    document.getElementById("days_exp").innerHTML = days_exp;
                    document.getElementById("hours_exp").innerHTML = hours_exp;
                    document.getElementById("minutes_exp").innerHTML = minutes_exp;
                    document.getElementById("seconds_exp").innerHTML = seconds_exp;
                    // If the count down is finished, write some text
                    if (this.distance < 0) {
                        clearInterval(x);
                        $("#default_counter").show();
                        $("#countdowntimer").hide();
                        
                    } else {
                        $("#countdowntimer").show();
                        $("#default_counter").hide();
                    }
                    }, 1000);
                }
            }
        )
    }
});