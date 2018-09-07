<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Maxosys: Simple-PHP-NODE-JS-MONGODB-CRUD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>
<body>

<div class="container">
  <h2>List Of Customer </h2>
  <ul id="customerres" class="list-group" >
  Loading....
  </ul>
</div>
  <script type="text/javascript">
    

    
$.ajax({
  url: "http://localhost:12345/server?tag=view_list",  
  dataType: "json",
  crossDomain: true,
  success: function(data) {
    
     //var ret = JSON.parse(data.data);
    var mainData = data.data;
    console.log(mainData);

    var liarr = [];

    var sno = 1;
    $.each(mainData,function(key,val){

      var _id = mainData[key]["_id"];
      var email_address = mainData[key]["email_address"];
      var example_textarea = mainData[key]["example_textarea"];
      var example_select = mainData[key]["example_select"];

      var file_input = mainData[key]["file_input"];
      
      if(file_input == "" || file_input == "File input" || file_input == null)
      {
        file_input = "1.png";
      }

      var record = "S.No: "+sno+" | <b>_id</b> = "+_id+" | <b>Email</b> = "+email_address+" | <b>Select Value</b> = "+example_select+" | <img src='upload/"+file_input+"' width='200' /> <span style='float:right;cursor:pointer' title='Do your self ;-) '> Remove </span> ";

      liarr.push(record);
      sno++;
    });

    var htm = liarr.join(" <li class='list-group-item'> ");

     $('#customerres').html(htm);
  },
  error: function(jqXHR, status, error) {
            console.log(jqXHR);
            console.log(status);
            console.log(error);
            console.log('Error: ' + JSON.stringify(error));
  }

});



  </script>
</body>
</html>
