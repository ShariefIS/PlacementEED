<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script language="javascript">
$(document).ready(function(){
	$('#back').click(function(){
		//loadPage('index.php?staff/index');
		$('#view').action="index.php?staff/index";
		$('#view').submit();
	});
});
</script>
<style>
	table {
    border-collapse: collapse;
    margin-bottom: 3em;
    width: 100%;
    background: #fff;
}
td, th {
    padding: 0.75em 1.5em;
    text-align: left;
}
	td.err {
		background-color: #e992b9;
		color: #fff;
		font-size: 0.75em;
		text-align: center;
		line-height: 1;
	}
th {
    background-color: #31bc86;
    font-weight: bold;
    color: #fff;
    white-space: nowrap;
}
tbody th {
	background-color: #2ea879;
}
tbody tr:nth-child(2n-1) {
    background-color: #f5f5f5;
    transition: all .125s ease-in-out;
}
tbody tr:hover {
    background-color: rgba(129,208,177,.3);
}

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
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #222222;
   
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
     font-family: Verdana,sans-serif;
}

li a:hover {
    background-color: #269abc;
}
 </style>
 <ul>
        <li><a style="text-decoration: none;color: wheat;
  font-size: 25px;
  font-weight: bold;
   " href="index.php" >PlaceMeant<span style="color: #269abc ">forYOU</span></a></li>
  <li><a href="#" >Home</a></li>
 </ul>
 </br>
<span style="margin-left:50px;" class="mcstyle">Exam name: <?php echo $data['exam_name'][0]['exam_name'];?></span>
<form name="view" id="view" action="index.php?staff/index">
<div style="margin-top: 8px;">

	<table width="90%" class="table-new" border="0" cellspacing="0" cellpadding="5">
	<tr class="tr-head">
		<th width="150" align="center" ><b> Questions  </b></th>
		<th width="100" ><b> My Answers </b></th>
                <th width="100">Explanation</th>
	</tr>
	<?php 
	$cnt = 0;
	$correct = 0;
	if (is_array($data['transaction_dtl'])){
		foreach($data['transaction_dtl'] as $row){
		$cnt++;
			if ($row['israted'] <> 0){
				$correct += $row['score'];
			}
			
		
	?>
	<tr>
		<td > <?php  echo $cnt . '. ' . $row['question_name'];
                if($row['img']!=NULL && $row['img']!="")
           {
               echo '<br>'.'<img src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'" width="200" height="200"/>';
           }
           ?> <?php  echo ($row['israted'] == 0 ?  "<span style='color:gray;'> (Not yet graded) </span>" : '');?> </td>
		<?php
		if ($row['israted'] == 0){

		?>
			<td > <span style="color: black"><?php echo $row['essay']; ?> </span></td>
		<?php
		}else{
		?>
		<td > <span style="<?php echo ($row['score']==0 ? 'color: red' : 'color:green');?>"><?php echo ($row['answer_name'] != '' ? $row['answer_name'] : $row['essay']); ?> </span></td>
		<?php 
		}	
		?>
                <td > <?php echo $row['expl'];
                if($row['img']!=NULL && $row['eimg']!="")
           {
               echo '<br>'.'<img src="data:image/jpeg;base64,'.base64_encode( $row['eimg'] ).'" width="200" height="200"/>';
           }?></td>
	</tr>
	<?php
		}
	}
	?>
	</table>
	<div style="float:right; padding-right: 10px; margin-right:60px;" class="mcstyle">
    <table class="mcstyle" style="font-size: 13px;">
    <tr>
        <td align="right"> <b> Score: </b></td>
        <td> <b> <?php echo $correct . ' out of ' . $data['exam_name'][0]['passing_score']; ?></b> </td>
    </tr>
    <tr>
        <td align="right"> <b>Grade: </b> </td>
         <td> 
         	<b>
     		<?php  $grade = ($correct/$data['exam_name'][0]['passing_score']) * 100 ;
     			echo $grade.'%';
        	 ?>  
        	</b> 
     	</td>
    </tr>
    <tr>
        <td align="right"> <b> Remark: </b></td>
        <td> 
        <?php
            if ( $grade >= $data['exam_name'][0]['passing_grade'] ) {
                echo "<span style='color: green;'><b>Passed</b></span>";
            }else{
                echo "<span style='color: red;'><b>Failed</b></span>";
                echo '<p>You havent reached the passing score , Prepare well !!<br>Advice you to check the concepts of the question where you went wrong.<br>As these are your weaknesses and try to change those weaknesses into strenghts by practicing those concepts. </p>';
            }
        ?>
        </td>
    </tr>
    </table>
	</br>
	
	</div>
</div>
</form>