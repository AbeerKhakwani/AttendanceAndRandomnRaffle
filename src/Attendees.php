<?php
class Attendees
{
	private $FirstName;
	private $LastName;
	private $id;
	private $amount;
	private $Type;
	private $email;

	function __construct($new_FirstName, $new_LastName, $new_amount, $new_Type,$new_email, $new_id = null)
	{
		$this->id       = $new_id;
		$this->LastName = $new_LastName;
		$this->FirstName= $new_FirstName;
		$this->amount   = $new_amount;
		$this->Type     = $new_Type;
    $this->email    = $new_email;
	}
	function getFirstName()
	{
		return $this->FirstName;
	}
	function setFirstName($new_FirstName)
	{
		$this->FirstName = $new_FirstName;
	}
	function getEmail()
	{
		return $this->email;
	}
	function setEmail($new_email)
	{
		$this->email = $new_email;
	}
	function getId()
	{
		return $this->id;
	}
	function setId($new_id)
	{
		$this->id = (int) $new_id;
	}
	function getLastName()
	{
		return $this->LastName;
	}
	function setLastName($new_LastName)
	{
		$this->LastName = $new_LastName;
	}
	function getamount()
	{
		return $this->amount;
	}
	function setamount($new_amount)
	{
		$this->amount = $new_amount;
	}
	function getType()
	{
		return $this->Type;
	}
	function setType($new_Type)
	{
		$this->Type = $new_Type;
	}
	function save()
	{
		$statemnt = $GLOBALS['DB']->query("INSERT INTO attendees(fname,lname,amount,type,email) VALUES
		('{$this->getFirstName()}', '{$this->getLastName()}',{$this->getamount()},{$this->getType()},'{$this->getEmail()}') RETURNING id;");
		$result = $statemnt->fetch(PDO::FETCH_ASSOC);
		$this->setId($result['id']);
	}
	static function getAll()
	{
		$returned_attendeess = $GLOBALS['DB']->query("SELECT * FROM attendees ;");
		$attendeess          = array();
		foreach ($returned_attendeess as $attendees) {
			$FirstName = $attendees['fname'];
			$LastName = $attendees['lname'];
			$Type     = $attendees['type'];
			$amount    = $attendees['amount'];
			$email    = $attendees['email'];
			$id       = $attendees['id'];
			$new_attendees = new attendees($FirstName, $LastName, $amount, $Type, $email,$id);
			array_push($attendeess, $new_attendees);
		}
		return $attendeess;
	}
	static function deleteAll()
	{
		$GLOBALS['DB']->exec("DELETE FROM attendeess *;");
	}
	static function find($search_id)
	{
		$returned_attendees = null;
		$all_attendeess     = attendees::getAll();
		foreach ($all_attendeess as $attendees) {
			$attendees_id = $attendees->getId();
			if ($attendees_id == $search_id) {
				$returned_attendees = $attendees;
			}
		}
		return $returned_attendees;
	}
	function updateFirstName($attendees_name)
	{
		$GLOBALS['DB']->exec("UPDATE attendeess SET FirstName={$attendees_name} WHERE id={$this->getId()};");
		$this->setFirstName($attendees_name);
	}
	function updateLastName($new_LastName)
	{
		$GLOBALS['DB']->exec("UPDATE attendeess SET LastName={$new_LastName} WHERE id={$this->getId()};");
		$this->setLastName($new_LastName);
	}
	function delete()
	{
		$GLOBALS['DB']->exec("DELETE FROM attendeess * WHERE id={$this->getId()};");
	}




}

?>
