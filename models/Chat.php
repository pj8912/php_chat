<?php
class Chat{

	private $table = "messages";

	private $conn;

	public function __construct($db){
		$this->conn = $db;
	}

	public $message, $oid, $myid ,$oname;
	
	
	public function uploadMessage(){
		$sql = "INSERT INTO {$this->table}(message, sender_id , received_id, receiver_name) VALUES(:message, :sender_id , :received_id, :receiver_name)";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':message',$this->message);
		$stmt->bindParam(':sender_id', $this->myid);
		$stmt->bindParam(':receiver_id', $this->oid);
		$stmt->bindParam(':receiver_name', $this->oname);
		$stmt->execute();
		
	}

	public function fetchMessages(){

		$sql = "SELECT * FROM {$this->table} WHERE sender_id = :sender_id, receiver_id = :receiver_id OR sender_id = :receiver_id, receiver_id = :sender_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':sender_id', $this->myid);
		$stmt->bindParam(':receiver_id', $this->oid);
		$stmt->execute();
	}

	
}
