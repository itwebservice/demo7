<?php 
class ticket_upload_master{

public function ticket_upload_save()
{
	$train_ticket_id = $_POST['train_ticket_id'];
	$train_ticket_url = $_POST['train_ticket_url'];

	$created_at = date('Y-m-d H:i');

	$sq_max = mysqli_fetch_assoc(mysqlQuery("select max(entry_id) as max from train_ticket_master_upload_entries"));
	$entry_id = $sq_max['max'] + 1;

	$sq_ticket = mysqlQuery("insert into train_ticket_master_upload_entries (entry_id, train_ticket_id, train_ticket_url, created_at) values ('$entry_id', '$train_ticket_id', '$train_ticket_url', '$created_at')");
	if($sq_ticket){
		echo "Ticket Uploaded successfully!";
		exit;
	}
	else{
		echo "error--Ticket not uploaded!";
		exit;
	}
}

}
?>