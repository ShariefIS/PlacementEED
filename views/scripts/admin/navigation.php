<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color:lightseagreen;
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
     font-family: sans-serif;
}

li a:hover {
    background-color: orange;
}
</style>
<div>
    <ul>
        <li> <a style=" text-decoration: none;" href="javascript:loadPage('index.php?admin/users');"> Users </a> </li>
    <li> <a style=" text-decoration: none;" href="javascript:loadPage('index.php?admin/departments');"> Company Name</a></li>
    <li> <a style=" text-decoration: none;" href="javascript:loadPage('index.php?admin/examsresult');"> Examinations Results </a></li>
    <li> <a style=" text-decoration: none;" href="javascript:loadPage('index.php?admin/exams');"> Examinations </a></li>
    <li> <a style=" text-decoration: none;" href="views/scripts/admin/enable.php"> Enable users </a></li>
    <li style="float: right;text-decoration: none"><a href="index.php?authenticate/logout"> Logout </a></li>
    </ul>
</div>
