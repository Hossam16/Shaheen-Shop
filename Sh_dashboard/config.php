<?php
include('Products.php');
include('Order.php');
include('Orderdata.php');
include('User.php');
include('Nsub.php');
include('Complaint.php');
class config
{
	
	protected	$db_username = 'root';
	protected	$db_password = 'z.8<%o?SVROIopQ.';
	protected	$db_name = 'shaheen_shaheen';
	protected	$db_host = 'localhost';
	protected	$link;

 function datacon(){
 	return $this->link= new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_name);
 }


 public function GetLink()
	{
		return $this->link;
	}
}




?>