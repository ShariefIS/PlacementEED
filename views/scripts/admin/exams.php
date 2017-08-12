<script language="javascript">
$(document).ready(function(){
	
	$.get('index.php?admin/examslist',function(data){
		$('#exam_list').html(data);
	})

	$('#add').click(function(){
		$('#exam').load('index.php?admin/examsadd');
	});
});
</script>
<style>
a{
  text-decoration: none;
  font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.9em; color: blue!important;
}
  a:hover {
  text-decoration: underline;
}
</style>

<div id="exam" class="users" style="width: 100%; height: auto; margin-bottom:10px;">
	<div style="height: 30px;">
	<table style="margin: 0 auto; width: 90%;">
	<tr>
		<td><a href="javascript:loadPage('index.php?admin/examsadd');">Add new</a></td>
		<td width="330"> &nbsp;</td>

		
	</tr>
	</table>
	</div>
	<div id="exam_list" class="exam_list" style="margin: 0 auto; width: 100%;">

	</div>
</div>
