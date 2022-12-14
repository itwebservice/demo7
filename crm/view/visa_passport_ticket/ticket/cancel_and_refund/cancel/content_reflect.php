<?php
include "../../../../../model/model.php";

$ticket_id = $_POST['ticket_id'];
$sq_ticket_info = mysqli_fetch_assoc(mysqlQuery("select * from ticket_master where ticket_id='$ticket_id'"));
$sq_payment_info = mysqli_fetch_assoc(mysqlQuery("select sum(payment_amount) as sum from ticket_payment_master where ticket_id='$ticket_id' AND clearance_status!='Pending' AND clearance_status!='Cancelled'"));
$service_tax_amount = 0;
if($sq_ticket_info['service_tax_subtotal'] !== 0.00 && ($sq_ticket_info['service_tax_subtotal']) !== ''){
	$service_tax_subtotal1 = explode(',',$sq_ticket_info['service_tax_subtotal']);
	for($i=0;$i<sizeof($service_tax_subtotal1);$i++){
		$service_tax = explode(':',$service_tax_subtotal1[$i]);
		$service_tax_amount = $service_tax_amount + $service_tax[2];
	}
}
$markupservice_tax_amount = 0;
if($sq_ticket_info['service_tax_markup'] !== 0.00 && $sq_ticket_info['service_tax_markup'] !== ""){
	$service_tax_markup1 = explode(',',$sq_ticket_info['service_tax_markup']);
	for($i=0;$i<sizeof($service_tax_markup1);$i++){
		$service_tax = explode(':',$service_tax_markup1[$i]);
		$markupservice_tax_amount = $markupservice_tax_amount+ $service_tax[2];
	}
}
?>

<input type="hidden" id="total_sale" name="total_sale" value="<?= $sq_ticket_info['ticket_total_cost']?>">	        
<input type="hidden" id="total_paid" name="total_paid" value="<?= $sq_payment_info['sum']?>">	  
<div class="row mg_tp_20">
	<div class="col-md-4 col-sm-6 col-xs-12 mg_bt_10_xs">
        <div class="widget_parent-bg-img bg-img-red">
            <div class="widget_parent">
                <div class="stat_content main_block">
                    <span class="main_block content_span" data-original-title="" title="">
                        <span class="stat_content-tilte pull-left" data-original-title="" title="">Adult Fare</span>
                        <span class="stat_content-amount pull-right" data-original-title="" title=""><?= $sq_ticket_info['adult_fair'] ?></span>
                    </span>     
                    <span class="main_block content_span" data-original-title="" title="">                    
                        <span class="stat_content-tilte pull-left" data-original-title="" title="">Children Fare</span>
                        <span class="stat_content-amount pull-right" data-original-title="" title=""><?= $sq_ticket_info['children_fair'] ?></span>
                    </span>                   
                    <span class="main_block content_span" data-original-title="" title="">
                        <span class="stat_content-tilte pull-left" data-original-title="" title="">Infant Fare</span>
                        <span class="stat_content-amount pull-right" data-original-title="" title=""><?= $sq_ticket_info['infant_fair'] ?></span>
                    </span>            
                    <span class="main_block content_span" data-original-title="" title="">
                        <span class="stat_content-tilte pull-left" data-original-title="" title="">Basic Cost</span>
                        <span class="stat_content-amount pull-right" data-original-title="" title=""><?= $sq_ticket_info['basic_cost'] ?></span>
                    </span>                   
                </div> 
            </div>
        </div>
        
    </div>
	<div class="col-md-4 col-sm-6 col-xs-12 mg_bt_10_xs">
        <div class="widget_parent-bg-img bg-img-purp">
            <div class="widget_parent">
                <div class="stat_content main_block">
                    <span class="main_block content_span" data-original-title="" title="">
                        <span class="stat_content-tilte pull-left" data-original-title="" title="">Discount Cost</span>
                        <span class="stat_content-amount pull-right" data-original-title="" title=""><?= $sq_ticket_info['basic_cost_discount'] ?></span>
                    </span>         
                    <span class="main_block content_span" data-original-title="" title="">                    
                        <span class="stat_content-tilte pull-left" data-original-title="" title="">YQ Tax</span>
                        <span class="stat_content-amount pull-right" data-original-title="" title=""><?= $sq_ticket_info['yq_tax'] ?></span>
                    </span>                   
                    <span class="main_block content_span" data-original-title="" title="">
                        <span class="stat_content-tilte pull-left" data-original-title="" title="">Other Taxes</span>
                        <span class="stat_content-amount pull-right" data-original-title="" title=""><?= $sq_ticket_info['other_taxes'] ?></span>
                    </span>  
                    <span class="main_block content_span" data-original-title="" title="">
                        <span class="stat_content-tilte pull-left" data-original-title="" title="">TDS</span>
                        <span class="stat_content-amount pull-right" data-original-title="" title=""><?= $sq_ticket_info['tds'] ?></span>
                    </span>                     
                    </span>
                </div> 
            </div>
        </div>
        
    </div>
	<div class="col-md-4 col-sm-6 col-xs-12 mg_bt_10_xs">
        <div class="widget_parent-bg-img bg-img-green">
            <div class="widget_parent">
                <div class="stat_content main_block" style="min-height: 170px;">
                    <span class="main_block content_span" data-original-title="" title="">
                        <span class="stat_content-tilte pull-left" data-original-title="" title="">Service Charge</span>
                        <span class="stat_content-amount pull-right" data-original-title="" title=""><?= $sq_ticket_info['service_charge'] ?></span>
                    </span>         
                    <span class="main_block content_span" data-original-title="" title="">                    
                        <span class="stat_content-tilte pull-left" data-original-title="" title="">Tax Amount</span>
                        <span class="stat_content-amount pull-right" data-original-title="" title=""><?= number_format($service_tax_amount, 2) ?></span>
                    </span>          
                    <span class="main_block content_span" data-original-title="" title="">
                        <span class="stat_content-tilte pull-left" data-original-title="" title="">Markup Cost</span>
                        <span class="stat_content-amount pull-right" data-original-title="" title=""><?= $sq_ticket_info['markup'] ?></span>
                    </span>         
                    <span class="main_block content_span" data-original-title="" title="">
                        <span class="stat_content-tilte pull-left" data-original-title="" title="">Markup Tax</span>
                        <span class="stat_content-amount pull-right" data-original-title="" title=""><?= number_format($markupservice_tax_amount, 2) ?></span>
                    </span>
                    <span class="main_block content_span" data-original-title="" title="">
                        <span class="stat_content-tilte pull-left" data-original-title="" title="">Roundoff</span>
                        <span class="stat_content-amount pull-right" data-original-title="" title=""><?= number_format($sq_ticket_info['roundoff'], 2) ?></span>
                    </span>                   
                    <span class="main_block content_span" data-original-title="" title="">
                        <span class="stat_content-tilte pull-left" data-original-title="" title="">Total Cost</span>
                        <span class="stat_content-amount pull-right" data-original-title="" title=""><?= $sq_ticket_info['ticket_total_cost'] ?></span>
                    </span>  
                    <span class="main_block content_span" data-original-title="" title="">
                        <span class="stat_content-tilte pull-left" data-original-title="" title="">Paid Amount</span>
                        <span class="stat_content-amount pull-right" data-original-title="" title=""><?= ($sq_payment_info['sum'] == "") ?  "0.00" : $sq_payment_info['sum'] ?></span>
                    </span>                 
                </div> 
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-10  col-xs-12 mg_tp_10">
		<input type="checkbox" id="check_all" name="check_all" onClick="select_all_check(this.id,'traveler_names')">&nbsp;&nbsp;&nbsp;<span style="text-transform: initial;">Check All</span>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 no-pad"> <div class="table-responsive">
		<table class="table table-bordered table-hover mg_bt_0">
			<thead>
				<tr class="table-heading-row">
					<th>S_No.</th>
					<th>passenger_Name</th>
					<th>Cancel</th>
				</tr>
			</thead>
			<tbody>
			<?php
            $count = 0;
            $disabled_count= 0;
			$sq_ticket_entries = mysqlQuery("select * from ticket_master_entries where ticket_id='$ticket_id'");
			while($row_entry = mysqli_fetch_assoc($sq_ticket_entries)){

				if($row_entry['status']=="Cancel"){
					$bg = "danger"; 
					$checked = "checked disabled";
					++$disabled_count;
				}
				else{
					$bg = ""; 
					$checked = "";
				}
				?>
				<tr class="<?= $bg ?>">
					<td><?= ++$count ?></td>
					<td><?= $row_entry['first_name'].' '.$row_entry['last_name'] ?></td>
					<td>
						<input type="checkbox" id="chk_entry_id_<?= $count ?>" class="traveler_names" name="chk_entry_id" <?= $checked ?> value="<?= $row_entry['entry_id'] ?>">
					</td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
         <input type="hidden" id="pass_count" name="pass_count" value="<?= $count ?>">
         <input type="hidden" id="disabled_count" name="disabled_count" value="<?= $disabled_count ?>">
		<?php
		if($count != $disabled_count){ ?>
            <div class="panel panel-default panel-body mg_tp_20 text-center">
                <button class="btn btn-danger btn-sm ico_left" id="cancel_booking" onclick="cancel_booking()"><i class="fa fa-times"></i>&nbsp;&nbsp;Cancel Booking</button>
            </div>
            <div class="mg_tp_10 text-center">
                <div class="note"><span style="color: red;line-height: 35px;" data-original-title="" title=""><?= $cancel_feild_note ?></span></div>
            </div>
        <?php } ?>
		</div> </div> 

</div>
<?php 
$sq_cancel_count = mysqli_num_rows(mysqlQuery("select * from ticket_master_entries where ticket_id='$ticket_id' and status='Cancel'"));
if($sq_cancel_count>0){
    $sq_ticket_info = mysqli_fetch_assoc(mysqlQuery("select * from ticket_master where ticket_id='$ticket_id'"));
	if($sq_ticket_info['cancel_amount'] == "0.00"){
		$refund_amount = $sq_payment_info['sum'];
	}else{
		$refund_amount = $sq_ticket_info['total_refund_amount'];
	}
?>
<form id="frm_refund">

	<div class="row text-center mg_tp_30 mg_bt_30">
		<div class="col-md-3 col-md-offset-3 col-sm-6 col-xs-12 mg_bt_10_xs">
			<input type="text" name="cancel_amount" id="cancel_amount" class="text-right" placeholder="*Cancellation Charges" title="Cancellation Charges" onchange="validate_balance(this.id);calculate_total_refund()" value="<?= $sq_ticket_info['cancel_amount'] ?>">
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12 mg_bt_10_xs">
			<input type="text" name="total_refund_amount" id="total_refund_amount" class="amount_feild_highlight text-right" placeholder="Total Refund" title="Total Refund" readonly value="<?= $refund_amount ?>">
		</div>
	</div>
	<?php if($sq_ticket_info['cancel_flag'] == 0){ ?>
	<div class="row mg_tp_20">
        <div class="col-md-12 text-center">
            <button id="btn_refund_save" class="btn btn-success"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save</button>
        </div>
	</div>
	<?php } ?>
</form>
<?php } ?>

<script>
function cancel_booking(){

	var entry_id_arr = new Array();
	$('input[name="chk_entry_id"]:checked').each(function(){
		entry_id_arr.push($(this).val());
	});

  //Validaion to select complete tour cancellation 
  var pass_count = $('#pass_count').val();
  var disabled_count = $('#disabled_count').val();
  var len = $('input[name="chk_entry_id"]:checked').length;
  if(len!=pass_count){
    error_msg_alert('Please select all passenger for cancellation.');
  }
  else if(pass_count == disabled_count){
			error_msg_alert('All the Passengers have been already cancelled');
	}
  else
  {
  	$('#vi_confirm_box').vi_confirm_box({
                message: 'Are you sure?',
        callback: function(data1){
            if(data1=="yes"){

                var base_url = $('#base_url').val();
                $('#cancel_booking').button('loading');

                $.ajax({
                  type: 'post',
                  url: base_url+'controller/visa_passport_ticket/ticket/cancel/cancel_booking.php',
                  data:{ entry_id_arr : entry_id_arr },
                  success: function(result){
                    msg_alert(result);
                    $('#cancel_booking').button('reset');
                    content_reflect();
                  }
                });
            }
          }

    	});
  }
}


function calculate_total_refund()
{
	var total_refund_amount = 0;
	var cancel_amount = $('#cancel_amount').val();
	var total_sale = $('#total_sale').val();
	var total_paid = $('#total_paid').val();

	if(cancel_amount==""){ cancel_amount = 0; }
	if(total_paid==""){ total_paid = 0; }

	if(parseFloat(cancel_amount) > parseFloat(total_sale)) { error_msg_alert("Cancel amount can not be greater than Sale amount"); }
	var total_refund_amount = parseFloat(total_paid) - parseFloat(cancel_amount);
	
	if(parseFloat(total_refund_amount) < 0){ 
		total_refund_amount = 0;
	}
	$('#total_refund_amount').val(total_refund_amount.toFixed(2));
}

$(function(){
  $('#frm_refund').validate({
      rules:{
              ticket_id : { required: true },
			  cancel_amount : { required : true, number : true },
      },
      submitHandler:function(form){

              var ticket_id = $('#ticket_id').val();
              var cancel_amount = $('#cancel_amount').val();
              var total_refund_amount = $('#total_refund_amount').val();
			  var total_sale = $('#total_sale').val();
			  var total_paid = $('#total_paid').val();

			  if(parseFloat(cancel_amount) > parseFloat(total_sale)) { error_msg_alert("Cancel amount can not be greater than Sale amount"); return false; }

              var base_url = $('#base_url').val();

              $('#vi_confirm_box').vi_confirm_box({
                message: 'Are you sure?',
                callback: function(data1){

                    if(data1=="yes"){

                        $('#btn_refund_save').button('loading');

                        $.ajax({
                          type:'post',
                          url: base_url+'controller/visa_passport_ticket/ticket/cancel/refund_estimate_update.php',
                          data:{ ticket_id : ticket_id,cancel_amount : cancel_amount, total_refund_amount : total_refund_amount},
                          success:function(result){
                            msg_alert(result);
                            content_reflect();
                            $('#btn_refund_save').button('reset');
                          },
                          error:function(result){
                            console.log(result.responseText);
                          }
                        });

                }

              }

            });

      }

  });

});
</script>
<script src="<?php echo BASE_URL ?>js/app/footer_scripts.js"></script>