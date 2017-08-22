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

    <table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
        <tr class="tr-head">
            <th width="270" ><b> Exam Name </b></th>
            
            <th width="30" > <b> Company </b></th>
            <th widt="150" >Action</th>
        </tr>
        <?php
        if (is_array($data)) {
            foreach ($data as $row) {
               
                $link = "javascript:loadPage('index.php?admin/questionlist&exam_id=" . $row['exam_id'] . "')";
                ?>
                <tr>
                    <td > <?php echo $row['exam_name']; ?> </td>
              
                    <td > <?php echo $row['department_name'];?></td>
                    <td width="100" align="center" >
                        <a href="javascript:loadPage('index.php?staff/examsresult&exam_id=<?php echo $row['exam_id'] ?>');"> View Result</a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</div>