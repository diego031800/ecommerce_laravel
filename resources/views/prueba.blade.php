<!DOCTYPE html>
<html>
<head>
	<title>Select</title>

    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>
<body>
	<h1>Holaaa</h1>
	<select class="js-example-basic-single" name="state">
  		<option value="AL">Alabama</option>
    	...
  		<option value="WY">Wyoming</option>
	</select>

<script type="text/javascript">
	$(document).ready(function() {
    	$('.js-example-basic-single').select2();
	});
</script>


</body>
</html>