<html lang="en">
<head>
    <title>Jquery Chosen - Select Box with Search Option</title>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
</head>
<body>

<div style="width:520px;margin:0px auto;margin-top:30px;">
  <h2>Select Box with Search Option Jquery</h2>
  <select class="chosen" style="width:500px;">
  <option>PHP</option>
  <option>PHP Array</option>
  <option>PHP Object</option>
  <option>PHP Wiki</option>
  <option>PHP Variable</option>
  <option>Java</option>
  <option>C</option>
  <option>C++</option>
  </select>
</div>

<script type="text/javascript">
      $(".chosen").chosen();
</script>

</body>
</html>