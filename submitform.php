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
  <h2>Complete Form <span style="float: right;"> <a href="displayrecord.php"> View Added List </a> </span></h2>
  <form class="form-horizontal" method="post" enctype="multipart/form-data" action="http://localhost:12345/server?tag=submit">
    <input type="hidden" name="tag" value="submit">
        <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email_address" required="" class="form-control" id="email_address" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" required="" id="password" placeholder="Password">
        </div>
        <div class="form-group">
        <label for="exampleSelect1">Select Value</label>
        <select class="form-control" id="example_select" name="example_select">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        </div> 
        <div class="form-group">
        <label for="exampleTextarea">Description</label>
        <textarea class="form-control" id="example_textarea" name="example_textarea" required="" rows="3"></textarea>
        </div>
        <div class="form-group">
        <label for="exampleInputFile">File input</label>    
        <input type="file" class="form-control-file" name="file_input" id="file_input" aria-describedby="fileHelp" />    
        <small id="fileHelp" class="form-text text-muted">
        This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.
        </small>
        </div> 
  <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
