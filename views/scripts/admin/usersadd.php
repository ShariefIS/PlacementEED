<script language="javascript">

$(document).ready(function(){
	$('#cancel').click(function(){
		//$('#users').load('index.php?admin/users');
		loadPage('index.php?admin/users');
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
		if (msg == error){
			
			$.post('index.php?admin/saveusernew',$("#user_add").serialize(),function(data){
				//$('#users').load('index.php?admin/users');
				loadPage('index.php?admin/users');
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
<div id="users" class="users" style="width: 100%; height: 675px;">
	<div class="user_add_data">
	<form name="user_add" id="user_add" action="index.php?admin/saveusernew">
		<table width="30%%">
		<tr>
			<td class="mcstyle"> First name : </td>
			<td> <input type="text" id="fname" name="fname" class="user_input" > </td>
		</tr>	
		<tr>
			<td class="mcstyle"> Last name : </td>
			<td> <input type="text" id="lname" name="lname" class="user_input" > </td>
		</tr>	
		<tr>
			<td class="mcstyle"> username : </td>
			<td> <input type="text" id="user_name" name="user_name" class="user_input" > </td>
		</tr>	
		<tr>
			<td class="mcstyle"> password : </td>
			<td> <input type="password" id="password" name="password" class="user_input" > </td>
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
			<td class="mcstyle"> Exam Checker: </td>
			<td> <input type="checkbox" id="u_examchecker" name="u_examchecker"> </td>
		</tr>	
		<tr>
			<td class="mcstyle"> Enable: </td>
			<td> <input type="checkbox" id="u_enable" name="u_enable"> </td>
		</tr>	
		<tr>
			<td> <input type="button" id="save" class="e_button" value="Save"></td>
			<td> <input type="button" id="cancel" class="e_button" value="Cancel"></td>
		</tr>
		</table>
	</form>
	</div>
</div>