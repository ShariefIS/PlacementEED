<html>
    <head>
        <meta http-equiv="content-language" content="en"/>
        <meta http-equiv="content-style-type" content="text/css"/>
        <meta http-equiv="content-script-type" content="text/javascript"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <link rel="stylesheet" type="text/css" href="public/css/layout-z.css">
        <link rel="stylesheet" type="text/css" href="public/css/jquery.ui.datepicker.css">

        <script src="public/js/jquery.min.js"></script>
        <script src="public/js/jquery-ui.min.js"></script>
        <link href="public/css/jquery-ui.css" rel="stylesheet" type="text/css"/>



        <title>PlaceMeantForU</title>
        <link rel="shortcut icon" type="image/icon" href="image/P.jpg"/>
        <script language="javascript">
            $(document).ready(function () {
                //$("#exam_from2").datepicker();
<?php
if (isset($_SESSION['user_id'])) {
    ?>
                    loadPage('index.php?admin/exams');
    <?php
}
?>

            });
            function loadPage(url) {
                //alert(url);
                $('.body_data').load(url);
            }

            function deleteData(url, loadBack) {
                if (confirm("Do you want to delete this??")) {
                    $.post(url, function () {
                        $('.body_data').load(loadBack);
                    });
                }
            }

        </script>

    </head>
    <body>
        <div id="fb-root"></div>
        <style>

            footer {
                padding: 1em;
                color: white;
                background-color: black;
                clear: left;
                text-align: center;
            }

            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #333;
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
            }

            li a:hover:not(.active) {
                background-color: darksalmon;
            }

            .active {
                background-color: #4CAF50;
            }
        </style>
    </head>

    <ul>
        <li><a href="#">PlaceMeant<span style=" color: gold;">ForU</span></a></li>
        <li style="float:right"><a href="index.html">Home</a></li>
        <li style="float:right"><a href="index.php?admin/signupnew">SIGN-UP</a></li>

    </ul> 
    <form action="index.php?authenticate/verify" method="post">
        <div class="wrapper" >


            <div class="bodycontainer" style="align-content: center">
                <div class="left_menu" style="width: 990px;margin-top: 10px;">
                    <?php
                    echo $data['nav'];
                    ?>   
                </div>  
                <div class="contentcontainer" style="">
                    <div class="right_menu" style="width: 990px; height: auto;overflow:hidden; float: left;">
                        <div class="body_data" style="width: auto; height: auto; overflow: hidden; margin-top: 5px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>	

    </form>
    <footer><p> Copyright &copy; All Rights Reserved</p> </footer>

</body>
</html>