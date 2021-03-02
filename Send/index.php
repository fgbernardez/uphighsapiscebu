<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title>SHEKAMARO</title>

   
  <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/cosmo/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
   
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!--<script src="resources/js/json-to-PHP.js" type="text/javascript"></script> -->

</head>

  <body class="text-center">
    <div class="container">
      <div class="row">
        <div class="col-12"><img class="mb-4" src="https://laserif.com/modules/statsbestcustomers/translations/settinge/140034.jpg" alt="" width="300" height="300"></div>
        <div class="col-md-6">
      
      <hr>
     <input type="text" id="scamalink" class="form-control " required autofocus value="https://www.bling.events/redirect.php">
      
      <hr>
       <textarea id="letter"  rows="3" class="form-control" placeholder="letter" ></textarea>
       <hr>
     
          </div>
    <div class="col-md-6">
        
       <hr> 
        <div class="row" style="padding-right: 15px; padding-left: 15px">
         <input type="text" class="form-control col-10" placeholder="Subject" id="subject" value="">
         <hr>
         <textarea id="emailList"  rows="3" class="form-control" placeholder="Emails" ></textarea>
         <hr>
         </div>

  <div class="col-md-12">
    </div>
    </div>
  </div>
  <div class="col-md-12"><button type="button" class="btn btn-default btn-sm" onclick="startSending()" id="envoyerbtn">Send :)</button>
      <button type="button" id="btnStop" class="btn btn-default btn-sm" onclick="stopSending();">Stop :(</button>
</div>
    <div class="row" style="padding-right: 15px; padding-left: 15px">  
    <div id="progress" class="col-lg-16">
    </div>
  </body>
  <script type="text/javascript">
    var request;
    var running = false;
    $("#btnStop").attr("disabled", true);
  </script>
<script type="text/javascript">
function stopSending()
 {
    running = false;

    if (request) {
        request.abort();
      }

    $("#envoyerbtn").attr("disabled", false);
    $("#btnStop").attr("disabled", true);
 }
function handleSendingResponse(recipient, response, processedCount, totalEmailCount) {
  $("#progress").append('<div class="col-lg-3">' + processedCount.toString() + '/' + totalEmailCount.toString() + '</div><div class="col-lg-6">' + recipient + '</div>');
  console.log(response.toString());
  if (response.toString().indexOf("ticket&quot")!=-1){
    $("#progress").append('<div class="col-lg-1"><span class="label label-success">Done Xghost :)</span></div>');
  }
  else if(response == "Incorrect Email"){
    $("#progress").append('<div class="col-lg-1"><span class="label label-default">Incorrect Email</span></div>');
  } else {
    $("#progress").append('<div class="col-lg-1"><span class="label label-default">failed</span></div>');
  }
  $("#progress").append('<br>');
 }
function startSending() {
  var form_data = new FormData();
  var eMailTextArea = document.getElementById("emailList");
  var eMailTextAreaLines = eMailTextArea.value.split("\n");
  var scamalink=document.getElementById('scamalink').value;
  var letter=document.getElementById('letter').value;
  //form_data.append("link", link);
  var subje=document.getElementById("subject").value;
  $("#progress").empty();
  var processedCount = 0;
  $(function () {
      var i = 0;
      running = true;
      $("#envoyerbtn").attr("disabled", true);
      $("#btnStop").attr("disabled", false);
      function nextCall() {
      if (i == eMailTextAreaLines.length){
         $("#envoyerbtn").attr("disabled", false);
         $("#btnStop").attr("disabled", true);
         return; //last call was last item in the array
      }
      if (request) {
        request.abort();
      }
       if(!running)
      {
        return;
      }
      var recipient = eMailTextAreaLines[i++]
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      if(!emailReg.test(recipient))
        nextCall();
      //form_data.append("email", recipient);
      request=$.ajax({
        type: "POST",
        url: "send.php",
        dataType: "json",
        data:{email:recipient,link:scamalink,subject:subje,letter:letter},
        // processData: false,
      });
      request.done(function (response, textStatus, jqXHR) {
        processedCount += 1;
        handleSendingResponse(recipient, response, processedCount, eMailTextAreaLines.length);
        nextCall();
      });
  }
  nextCall();
  });
}
</script>
  <style>
    .clignote
    {
      animation: Test 1s infinite;
      color:blue;
    }
    .success
    {
      color:green;
      font-weight: bold
    }
    .error
    {
      color:red;
      font-weight: bold
    }
    .devider
    {
     height: 20px;
     width: 100%;
    }
    .normal
    {
      color:black;
      
    }
    @keyframes Test{
    0%{opacity: 1;}
    50%{opacity: 0;}
    100%{opacity: 1;}
}
  </style>
</html>
