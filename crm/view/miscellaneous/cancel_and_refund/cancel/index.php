<?php
include "../../../../model/model.php";
?>

<div class="app_panel_content Filter-panel">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
			<select name="visa_id" id="visa_id" style="width:100%" title="Select Booking" onchange="visa_entries_reflect()">
		        <option value="">Select Booking</option>
		        <?php 
		        $sq_visa = mysqlQuery("select * from miscellaneous_master order by misc_id desc");
		        while($row_visa = mysqli_fetch_assoc($sq_visa)){

					$date = $row_visa['created_at'];
					$yr = explode("-", $date);
					$year =$yr[0];
		          	$sq_customer = mysqli_fetch_assoc(mysqlQuery("select * from customer_master where customer_id='$row_visa[customer_id]'"));
					if($sq_customer['type'] == 'Corporate'||$sq_customer['type']=='B2B'){
						$cust_name = $sq_customer['company_name'];
					}else{
						$cust_name = $sq_customer['first_name'].' '.$sq_customer['last_name'];
					}
		          ?>
		          <option value="<?= $row_visa['misc_id'] ?>"><?= get_misc_booking_id($row_visa['misc_id'],$year).' : '.$cust_name ?></option>
		          <?php
		        }
		        ?>
		    </select>
		</div>
	</div>
</div>


<div id="div_content" class="main_block"></div>


<script>
$('#visa_id').select2();
function visa_entries_reflect()
{
	var misc_id = $('#visa_id').val();
	if(misc_id!= ''){
		$.post('cancel/content_reflect.php', { misc_id : misc_id }, function(data){
			$('#div_content').html(data);
		});
	}
	else{
		$('#div_content').html('');
	}
}
</script>
<script src="<?= BASE_URL ?>js/app/footer_scripts.js"></script>