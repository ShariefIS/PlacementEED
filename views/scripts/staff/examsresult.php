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
<div style="width: 90%; height: auto;">
   
    <div id="result" style="width: 100%; margin: 0 auto;">
        <table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
            <tr class="tr-head">
                <th widt="100" align="center" class="line2">  Examinees Name </th>
                <th width="300" align="center" class="line2">Exam Name </th>
                <th width="10" align="center" class="line2">Scores </th>
                <th width="50" align="center" class="line2">Exam </br>Remarks </th>
         
                <td align="center" class="">  View </td>
            </tr>

            <?php
            //print_r($data);
            if (is_array($data['exam'])) {
                foreach ($data['exam'] as $row) {
                    ?>
                    <tr>
                        <td align="center" > <?php echo $row['user_fname'] . ', ' . $row['user_lname']; ?></td>
                        <td align="center" > <?php echo $row['exam_name']; ?></td>
                        <td align="center" > <?php echo ( $data[$row['user_id']][$row['exam_id']][0]['score'] == $row['passing_score'] ) ? 'PERFECT' : $data[$row['user_id']][$row['exam_id']][0]['score'] . ' over '. $row['passing_score']; ?> </td>
                        <td align="center" >
                            <?php
                           // echo $data[$row['user_id']][$row['exam_id']][0]['score'];
                            
                            if ((($data[$row['user_id']][$row['exam_id']][0]['score'] / $row['passing_score']) * 100 ) >= $row['passing_grade']) {
                                echo "<span style='color: green;'><b>Passed</b></span>";
                            } else {
                                echo "<span style='color: red;'><b>Failed</b></span>";
                               
                            }
                            
                            ?> 
                        </td>
                     
                        <td align="center" > <a href="javascript:loadPage('index.php?admin/checkresult&exam_id=<?php echo $row['exam_id']; ?>' + '&user_id=<?php echo $row['user_id']; ?>');"> Check Results</a></td>

                    </tr>
                    <?php
                }
            }
            ?>

        </table>
    </div>
</div>