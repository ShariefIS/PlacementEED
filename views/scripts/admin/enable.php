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
<form action="enable.php" method="POST">
<a href="../../../index.php" >Back</a>

    <table width="90%" class="table-new" border="0" cellspacing="0" cellpadding="5">
        <tr class="tr-head">
            <td width="150" align="center" class="line2"> First name </td>
            <td width="100" align="center" class="line2"> Last name </td>
            <td width="100" align="center" class="line2"> Username </td>
            <td width="100" align="center" class="line2"> Roll Number </td>
            <td width="100" align="center" class="line2"> Department </td>
            <td width="100" align="center" class="line2"> Date Registered </td>
            <td width="100" align="center" class=""> Action</td>
        </tr>

        <?php
        
         $con= mysqli_connect("localhost", "imranpfy123", "Pfy321@#", "placementDB");
        if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
        }
        $sql="SELECT * FROM `users` where user_enabled=0 "; 
        $result= mysqli_query($con, $sql);
        
        while ($row = mysqli_fetch_assoc($result)):
              
                  
                if ($row['user_enabled'] == 1) {
                    if ($row['exam_checker'] == 1) {
                        $color = '#ffe1e1';
                    } else {
                        $color = '';
                    }
                } else {
                    $color = '#E5E5E5';
                }
                ?><tr style="text-align:center">
                <input type="submit" onclick=" <?php $uid=$row['user_id'];
   $sql1= "UPDATE `users` SET user_enabled=1 where user_id=$uid";
   $result2= mysqli_query($con, $sql1); ?> " value="Enable" name="enable" />
  		 </tr>
                <tr style="background: <?php echo $color; ?>">
                    <td align="center" class="line"> <?php echo $row['user_fname']; ?> </td>
                    <td align="center" class="line"> <?php echo $row['user_lname']; ?> </td>
                    <td align="center" class="line"> <?php echo $row['user_name']; ?> </td>
                    <td align="center" class="line"> <?php echo $row['rno']; ?> </td>
                    <td align="center" class="line"> <?php echo $row['dept']; ?> </td>
                    <td align="center" class="line"> <?php echo date('m-d-Y', strtotime($row['user_createdon'])); //$row['user_createdon'];                     ?> </td>
                    
                    <td align="center" class="line1">  
                        <a href="javascript:deleteData('index.php?admin/userdelete&user_id=<?php echo $row['user_id']; ?>','index.php?admin/users');"> Delete </a>
                    </td>
                </tr>
                <?php
               endwhile;
               ?>
    </table>
      </form>
      <?php
       if (isset($_POST['enable']))
{
   $uid=$row['user_id'];
   $sql1= "UPDATE `users` SET user_enabled=1 where user_id=$uid";
   $result2= mysqli_query($con, $sql1);
}
?>
                        
</div>