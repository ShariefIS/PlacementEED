<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script language="javascript">

$(document).ready(function(){

	$('#cancel').click(function(){
		//$('#users').load('index.php?');
		$('#user_add').action="index.php?"
		$('#user_add').submit();
	})
	$('#save').click(function(){
		var error ="Please fill up the requirement below \r\n----------------------------------------\r\n";
		var msg = error;
		if( $('#fname').val() == '' ){
			msg += '*First name \r\n';
		}
		if( $('#lname').val() == '' ){
			msg += '*Last name \r\n';
		}
		if( $('#user_name').val() == '' ){
			msg += '*user name \r\n';
		}
		if( $('#password').val() == '' ){
			msg += '*Password \r\n';
		}
                if( $('#dept').val() == '' ){
			msg += '*Department \r\n';
		}
		
		
		if (msg == error){
			
			$.post('index.php?admin/signupadd',$("#user_add").serialize(),function(data){
				
				if ( parseInt(data) != 0 ) {
                                    alert('Username is Already Exist');
					
				}else{
					alert('Your Registration is Success');
					$('#user_add').submit();
				}
			});	
			
		}else{
			alert(msg);	
		}
		
		
	});
});
</script>
<style>
.mcstyle{
	font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;
}
</style>
<div id="users" class="users" style="width: 990px; height: 675px;">
	<div class="user_add_data" style="margin: 0 auto;">
	<form name="user_add" id="user_add" method="post" action="index.php?">
		<table width="100%">
		<tr>
			<td class="mcstyle" width="12%"> First name : </td>
			<td width="12%"> <input type="text" id="fname" name="fname" class="user_input" > </td>
			<td> </td>
		</tr>	
		<tr>
			<td class="mcstyle"> Last name : </td>
			<td> <input type="text" id="lname" name="lname" class="user_input" > </td>
			<td> </td>
		</tr>	
		<tr>
			<td class="mcstyle"> username : </td>
			<td> <input type="text" id="user_name" name="user_name" class="user_input" > </td>
			<td> </td>
		</tr>	
		<tr>
			<td class="mcstyle"> password : </td>
			<td> <input type="password" id="password" name="password" class="user_input" > </td>
			<td> </td>
		</tr>	
		<tr>
			<td class="mcstyle"> Department Name: </td>
			<td> 
			<select id="dept" name="dept">
				<option value=""> </option>
                                <option value="Information Technology">Information Technology </option>
                                <option value="Electronics And Communication">Electronics And Communication </option>
                                <option value="Electronics And Electrical">Electronics And Electrical </option>
                                <option value="Computer Science">Computer Science </option>
                                <option value="Mechanical">Mechanical </option>
                                <option value="Production">Production </option>
				<option value="Electronics And Instrumentation">Electronics And Instrumentation </option>
			</select>
			</td>
			
		</tr>
		<tr>
			<td> </td>
			<td> <input type="button" id="save" class="e_button" value="Save"><input type="button" id="cancel" class="e_button" value="Cancel"></td>
			<td> </td>
		</tr>
		</table>
	</form>
	</div>
</div>
</html>