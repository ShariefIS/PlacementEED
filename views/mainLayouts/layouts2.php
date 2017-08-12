<html>
<head>
	<meta http-equiv="content-language" content="en"/>
	<meta http-equiv="content-style-type" content="text/css"/>
	<meta http-equiv="content-script-type" content="text/javascript"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link rel="stylesheet" type="text/css" href="public/css/layout-z.css">
	<link rel="stylesheet" type="text/css" href="public/css/jquery.ui.datepicker.css">
	
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/jquery-ui.min.js"></script>
    <link href="public/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<title> Placement EED </title>
	<script language="javascript">
	function loadPage( url ){
		//alert(url);
		$('.body_data').load( url );
	}
	function deleteData( url, loadBack ){
		if (confirm("Do you want to delete this??")){
			$.post(url,function(){
				$('.body_data').load( loadBack );
			})	;
		}
	}
	$(document).ready(function(){
		//$("#exam_from2").datepicker();
		loadPage('index.php?staff/index');
	});		
	</script>
	
</head>
<body>
<div id="fb-root"></div>

<form action="index.php?authenticate/verify" method="post">
<div class="wrapper" style="">
	
	<div class="bodycontainer" style="">
		<div class="left_menu" style="width: 990px; height: auto;">
			<?php 
				echo $data['nav'];
			?>
		</div>
		<div class="contentcontainer" style="">

			<div class="right_menu" style="width: 990px; height: auto;overflow:hidden; float: left;">
				<div class="body_data" style="width: auto; height: auto; overflow: hidden; margin-top: 5px;">
						
				</div>
			</div>
		</div>
	</div>
</div>	
</form>

</body>
</html>