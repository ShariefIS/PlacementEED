<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PlaceMeantForU</title>
      <link rel="shortcut icon" type="image/icon" href="image/P.jpg"/>

   </head>
   <body style="background: antiquewhite  ">    
           <h2>LOG<span style="color: goldenrod;">IN</span></h2>
           <script language="javascript">
$(document).ready(function(){
	$('#signup').click(function(){
		//alert(2);
		//$('#newuser').action="index.php?admin/signupnew";
		//$('#newuser').submit();
			/*
			$('#newuser').action="index.php?";
			$('#newuser').submit();
			*/
	});
});
</script>
<style>input[type=text],input[type=password]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid red;
    size: 35px;
    }
    input[type=text],[type=password]:focus {
    background-color: lightblue;
}</style>
<form name="newuser" id="newuser">
  <div style="width: 100%; padding-top: 10px;align-content: center;">
		
		<table align="center">
		<tr>
                    <td ><label for="user_name"> Username :</label></td>
			<td> <input type="text" id="user_name" name="user_name" class="user_input"/></td>
		</tr>
		<tr>
                    <td ><label for="user_password">Password :</label></td>
			<td> <input type="password" id="user_password" name="user_password" class="user_input"></td>
		</tr>
		<tr>	
                        <td style="font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;"> <a href="index.php?admin/signupnew" style="color: #ff6600">SIGN-UP</a></td>
                        <td> <input type="submit" value="Login" style="background-color: #008CBA;border-radius: 25px"></td>
		</tr>
               
		</table>
	</div></br>
</form>
  </body>
</html>