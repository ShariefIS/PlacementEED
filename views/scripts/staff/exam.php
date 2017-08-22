<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>
	$(document).ready(function () {
    //Disable cut copy paste
    $('body').bind('cut copy paste', function (e) {
        e.preventDefault();
    });

    //Disable mouse right click
    $("body").on("contextmenu",function(e){
        return false;
    });
});
</script>
	<script language="javascript">
	var total_pages, time_limit, current_time, hrs, mins, begin ;
	var next_page = 0;
	total_pages = <?php echo $data['count'][0]['count(exams.exam_id)'] - 1 ;?>;
	time_limit = <?php echo $data['count'][0]['exam_time_limit']; ?>;
	seconds = 59;
	var x=0;
	begin = 0;
	var time_consumed = 0;
	//alert(time_limit);
	$(document).ready(function(){
		//check result

		var myVar=setInterval(function(){
			if (time_limit > 0 || seconds > 0) {
				if (begin == 0){
					begin = 1;
					hrs = (time_limit - (time_limit % 3600)) / 3600;
					mins = (time_limit % 3600) / 60;
				}
				time_limit --;
				seconds--;
				if (seconds == 0){
					hrs = (time_limit - (time_limit % 3600)) / 3600;
					mins = (time_limit % 3600) / 60;
				}
				if (seconds == 0 && time_limit > 0){
					seconds = 59;
				}
				time_consumed++;
				$('#time').html('Time remaining : ' + (parseInt(hrs) > 0 ? parseInt(hrs) : '00') + ' : ' + (parseInt(mins) > 0 ? parseInt(mins) : '00') + ' : ' + (seconds > 0 ? seconds : '00'));
			}else{
				
				alert("Your time is up, all answers will be submitted!");
				x = 0;
				$("input[type='radio']:checked").each(function() {
					x = $("input[type=radio]:checked").attr('id');
				});

				var  type = $('#question_type').val();
				window.clearInterval(myVar);
				if (x == 1){
					next_page++;
					
					$.get('index.php?staff/submitresult',{ 'exam_id' : $('#exam_id').val(),'start' : next_page,'question_id':$('#question_id').val(), 'answer_id' : $("input[type=radio]:checked").attr('id'),'answer' : '', 'time_consumed' : time_consumed },function(data){
					$('#thankyou').load('index.php?staff/thankyou&exam_id='+$('#exam_id').val());
					});
					x = 0;
				}else{
					if (type == 1){
						if ( $('#essay_id').val() != '' ) {
							next_page++;
							$.get('index.php?staff/submitresult',{ 'exam_id' : $('#exam_id').val(),'start' : next_page,'question_id':$('#question_id').val(), 'answer' : $('#essay_id').val(), 'time_consumed': time_consumed },function(data){
								$('#thankyou').load('index.php?staff/thankyou&exam_id='+$('#exam_id').val());
								//$('#exam').action="index.php?staff/thankyou";
								//$('#exam').submit();
							});
							x = 0;
						}else{
							//alert('Essay answer should not be empty');
						}
					}else{
						if (total_pages != 0){
							$.get('index.php?staff/submitresult',{ 'exam_id' : $('#exam_id').val(),'start' : next_page,'question_id':$('#question_id').val(), 'answer_id' : x ,'answer' : $('#essay_id').val(), 'time_consumed': time_consumed },function(data){
								$('#exam').action="index.php?";
								$('#exam').submit();
							});
						}else{
							$.get('index.php?staff/submitresult2',{ 'exam_id' : $('#exam_id').val(),'question_id':$('#question_id2').val(), 'time_consumed' : time_consumed },function(data){
								$('#thankyou').load('index.php?staff/thankyou&exam_id='+$('#exam_id').val());
								//$('#exam').action="index.php?staff/thankyou";
								//$('#exam').submit();
							});
						}

					}
				}
			}
		},1000);

		$('#submit_result').click(function(){
			$(this).attr('disabled',true);
			$("input[type='radio']:checked").each(function() {
				x = 1;
			});
			var  type = $('#question_type').val();
			//type = 1 'essay'
			if (x == 1){
				next_page++;
				$.get('index.php?staff/submitresult',{ 'exam_id' : $('#exam_id').val(),'start' : next_page,'question_id':$('#question_id').val(), 'answer_id' : $("input[type=radio]:checked").attr('id'),'answer' : '', 'time_consumed' : time_consumed },function(data){
					$('#thankyou').load('index.php?staff/thankyou&exam_id='+$('#exam_id').val());
				});
				x = 0;
			}else{
				if (type == 1){
					if ( $('#essay_id').val().length >= 1 ) {
						next_page++;
						$.get('index.php?staff/submitresult',{ 'exam_id' : $('#exam_id').val(),'start' : next_page,'question_id':$('#question_id').val(), 'answer' : $('#essay_id').val(), 'time_consumed' : time_consumed },function(data){
							$('#thankyou').load('index.php?staff/thankyou&exam_id='+$('#exam_id').val());
						});
						x = 0;
					}else{
						alert('Essay answer should not be empty');
					}
				}else{
					if (total_pages != 0){
						alert('Please select an answer');
						//return false;
					}else{
						$.get('index.php?staff/submitresult2',{ 'exam_id' : $('#exam_id').val(),'question_id':$('#question_id2').val(), 'answer': '', 'time_consumed' : time_consumed },function(data){
							$('#thankyou').load('index.php?staff/thankyou&exam_id='+$('#exam_id').val());
							//$('#exam').action="index.php?staff/thankyou";
							//$('#exam').submit();
						});
					}

				}

			}
			$(this).attr('disabled',false);
		});
		$('#next').click(function(){
			$(this).attr('disabled',true);
			$("input[type='radio']:checked").each(function() {
				
				x = 1;
			});
			//alert($('#question_type').val());
			var  type = $('#question_type').val();
			if (x == 1){
				next_page++;
				$.get('index.php?staff/getexamnext',{ 'exam_id' : $('#exam_id').val(),'start' : next_page,'question_id':$('#question_id').val(), 'answer_id' : $("input[type=radio]:checked").attr('id'), 'answer' : '' },function(data){
					$('#xx').html(data);
					if (next_page >= total_pages){
						$('#next').hide();
						$('#submit_result').show();
					}
				});
				x = 0;
                                
			}else{
				if (type == 1){
					if ( $('#essay_id').val().length >= 1 ) {
						next_page++;
						$.get('index.php?staff/getexamnext',{ 'exam_id' : $('#exam_id').val(),'start' : next_page,'question_id':$('#question_id').val(), 'answer' : $('#essay_id').val() },function(data){
							$('#xx').html(data);
							if (next_page >= total_pages){
								$('#next').hide();
								$('#submit_result').show();
							}
						});
						x = 0;
					}else{
						alert('Essay answer should not be empty');

					}
				}else{
					alert('Please select an answer');


				}
			}
			$(this).attr('disabled',false);
		});

		$('#essay_id').val($.trim($('#essay_id').val()));
	});

	</script>
    <style>

.mcstyle{
		font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.9em; color: #31718e !important;
}
</style>
</head>
<body>
    <div id="fb-root"></div>

	<form name="exam" id="exam" action="index.php?staff/thankyou">
	<div style="margin-top: 20px; width: 990px; margin: 0 auto; " id="thankyou" class="mcstyle">
		<div id="time" style="font-size: 18px;font-weight: bold; background-color: lightsteelblue" class="mcstyle" >

		</div>
		<div id="xx" style="width: 100%; margin-top: 5px;" class="mcstyle">
			<?php
                       
			if (is_array($data['exam'])){
                        
			?>
				<div>
					<?php
						echo 'Q'." ".$data['exam'][0]['question_name'] ;
                                                ?>
                                    <br/>
                                   <?php
                                   if($data['exam'][0]['img']!=NULL){
                                   echo '<img src="data:image/jpeg;base64,'.base64_encode( $data['exam'][0]['img'] ).'" width="200" height="200"/>';

                                }     ?>
				</div>
				<div>
					<?php

					if ($data['exam'][0]['question_type'] == 0){
					?>

						   <ol type="A">
							<?php
								foreach($data[$data['exam'][0]['question_id']] as $row){
								?>
									<li>
										<input name="grpname" id="<?php echo $row['answer_id'];?>" value="<?php echo $row['answer_name'];?>" type='radio'/><?php echo $row['answer_name'];?>
									</li>
								<?php
								}
								?>
							</ol>
				<?php
					}else{
				?>
						<div>
							<textarea id="essay_id"  cols="60" rows="6"></textarea>
						</div>
				<?php

					}
				//}
				?>
				</div>

			<?php
			}else{
				header("Location:" . BASE_URL);
			}
			?>
			<input type="hidden" id="question_id" value="<?php echo $data['exam'][0]['question_id'];?>">
		</div>
		<div>
			<input type="button" id="next" value="Next Question"/>
			<input type="button" id="submit_result" value="Submit Result" style="display:none;"/>
		<div>
			<input type="hidden" id="exam_id" value="<?php echo $data['exam_id'];?>">
			<input type="hidden" id="question_type" value="<?php echo $data['exam'][0]['question_type'] ;?>">
	</div>
	</form>

</body>

</html>
