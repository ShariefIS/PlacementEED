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
        
        <link href="style.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link id="switcher" href="css/themes/lite-blue-theme.css" rel="stylesheet">
        
        <title> Placement EED </title>
        <script language="javascript">
            $(document).ready(function(){
                //$("#exam_from2").datepicker();
<?php
if (isset($_SESSION['user_id'])) {
    ?>
                loadPage('index.php?admin/exams');
    <?php
}
?>
		
    });
    function loadPage( url ){
        //alert(url);
        $('.body_data').load( url );
    }

    function deleteData( url, loadBack ){
        if (confirm("Do you want to delete this??")){
            $.post(url,function(){
                $('.body_data').load( loadBack );
            })	;
        }
    }
		
        </script>
 
    </head>
    <body>
        <div id="fb-root"></div>
       
        <div class="container" id="header">
            
              <!-- TEXT BASED LOGO -->
              <a class="navbar-brand" href="index.php" >Placement <span>EED</span></a>              
                  
                     
            </div>
            
          </div>     
        
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
            <div class="col-lg-6 col-md-6 col-sm-6">
  
              <div class="footer_bootomRight">
                <p>Designed by MD. IMRAN</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End footer bottom area -->
    </footer>
  
    </body>
</html>