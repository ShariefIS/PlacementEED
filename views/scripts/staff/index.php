<html>
    <head>
         <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link href="style.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link id="switcher" href="css/themes/lite-blue-theme.css" rel="stylesheet">
        <title>>PLACE-MEANTforYOU</title>
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
 </style>
    </head>
    <body>
      <div style="width: 100%; height: auto;">
<table width="90%" class="table-new" border="0" cellspacing="0" cellpadding="5">
<tr>
	<th width="500" align="center" ><b> Exam Name </b></th>
	 <th width="30" > <b> Company Name </b></th>
	<th width="100" ><b> Passing Grade </b></th>
	<th >Action</th>
</tr>
<?php 
if (is_array($data['exam'])){
	foreach($data['exam'] as $row){
?>
<tr>
	<td align="center" >
		<?php echo $row['exam_name'];?>
	</td>
  <td > <?php echo $row['department_name'];?></td>
	<td >
		<?php echo $row['passing_grade'] . '%';?>
	</td>
	<td width="100" align="center" >
		<?php 
		if (is_array($data[$row['exam_id']])){
		?>
			
			<a target="_blank" href="index.php?staff/viewresults&exam_id=<?php echo $row['exam_id'];?>"> View Results </a>
		<?php
		}else{
		?>
			<a target="_blank" href="index.php?staff/exam&exam_id=<?php echo $row['exam_id'];?>"> Take Exam </a>
		<?php	
		}
		?>
	</td>
</tr>
<?php
	}
}
?>
</table>
</div>  
         <footer id="footer">
      <!-- Start footer bottom area -->
      <div class="footer_bottom">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="footer_bootomLeft">
                <p> Copyright &copy; All Rights Reserved</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End footer bottom area -->
    </footer>
    </body>
</html>
