<style>
	.table-new {border:1px solid #00688B;text-align: center; margin-left:50px; margin-bottom:15px;}
	.table-new tbody{border: 1px solid #00688B;}
	.line {border-right: 1px solid #00688B;padding-right: 2px;margin-right: 5px;border-top: 1px solid #00688B;font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;}
	.line1{border-top: 1px solid #00688B;font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;}
	.line2{border-right: 1px solid #00688B;font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important; font-weight:bold;}


	.error-msg{
		overflow:hidden;
		width:900px; 
	}
	.error-msg h5{
		overflow:hidden;
		color:#F00;
		text-transform:uppercase;
		background: white;
	}
.mcstyle{
	font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;
}
 </style>
<table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
	<tr class="tr-head">
		<th widt="100" align="center" >  Examinees Name </th>
		<th width="300" align="center" >Exam Name </th>
		<th width="100" align="center" >Remarks </th>
		<th align="center">  View </th>
	</tr>

	<?php
		if(is_array($data['exam'])){
			foreach($data['exam'] as $row){
	?>
	<tr>
		<td align="center" class="line"> <?php echo $row['user_fname'] . ', ' . $row['user_lname'];?></td>
		<td align="center" class="line"> <?php echo $row['exam_name']; ?></td>
	<?php
	?>
		<td align="center" class="line"> 
			<?php 
				if ( (($data[$row['user_id']][0]['score'] / $row['passing_score']) * 100 ) >= $row['passing_grade'] ) {
					echo "<span style='color: green;'><b>Passed</b></span>";
				}else{
					echo "<span style='color: red;'><b>Failed</b></span>";
				}
			?> 
		</td>
		

	</tr>
	<?php
			}
		}
	?>

</table>