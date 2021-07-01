<?php
class config
{
	private $db_username1;
	private $db_password1;
	private $db_name1;
	private $db_host1;
	public function reternConn()
	{
		$this->db_username1 = 'root';
		$this->db_password1 = 'z.8<%o?SVROIopQ.';
		$this->db_name1 = 'shaheen_shaheen';
		$this->db_host1 = 'localhost';
		$connnnnnn = new mysqli($this->db_host1,$this->db_username1, $this->db_password1, $this->db_name1);
		return $connnnnnn;
	}
	function datacon()
	{
		$db_username = 'root';
		$db_password = 'z.8<%o?SVROIopQ.';
		$db_name = 'shaheen_shaheen';
		$db_host = 'localhost';

		return $conn = new mysqli($db_host, $db_username, $db_password, $db_name);
	}

	public function CheckConn()
	{
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}
}
