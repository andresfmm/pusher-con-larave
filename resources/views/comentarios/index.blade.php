<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/app.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div class="container">
<h4 style="font-family: bold">my titulo</h4>
  <div class="crop">
  	 <img src="img/uno.png">
  </div>

  <form>
	  	<h4 style="color: blue;">comment</h4>
		<input type="textarea" name="" id="text">
		<input type="button" value="Comment" class="btn btn-primary" onclick="enviar();"> 
	</form>

	<div id="mostrar"></div>
	
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/" class="img-circle" style="display: block; margin: auto;" />
    </div>
    <div class="col-md-4">
      <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/" class="img-circle" style="display: block; margin: auto;"/>
    </div>
    <div class="col-md-4">
      <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/" class="img-circle" style="display: block; margin: auto;"/>
    </div>
  </div>
</div>


	
</body>
<script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>

<script src="https://js.pusher.com/4.0/pusher.min.js"></script>
<script src="js/app.js"></script>
</html>

<script>


function enviar(){
	var text = document.getElementById('text').value
	var url='noti';
	$.ajax({
		headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type:'POST',
        url:url,
        data:{text:text},

        success:function(data){
        	$("#mostrar").append(data['text']);
          
        	
        }

	});
}

 // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    Pusher.log = function(msg) {
            console.log(msg);
        };

    var pusher = new Pusher('7e58bb9a8529cf3b2136', {
      encrypted: true
    });

    var channel = pusher.subscribe('test-channel');
    channel.bind('TestEvent', function(data) {
      alert(data.message);
    });
  

</script>