<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <style>
      input{
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
      }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container" >
    <form style="width:200px;margin:10% auto;"  action="../index.php?p=AuthPanel" method="POST">
  <div class="form-group">
    <input autocomplete="off" name="login" type="text" class="form-control" id="exampleInputEmail1" required >
  </div>
  <div class="form-group">
    <input autocomplete="off" name="password" type="password" class="form-control" id="exampleInputPassword1" required >
  </div>
  <button type="submit" class="btn btn-default">button</button>
</form>
    </div>
<script src="../assets/js/bootstrap.min.js"></script> 
</body>
</html>