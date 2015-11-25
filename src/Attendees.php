<?php
class Attendees
{
	private $FirstName;
	private $LastName;
	private $id;
	private $amount;
	private $Type;
	private $email;
	private $here;

	function __construct($new_FirstName, $new_LastName, $new_amount, $new_Type,$new_email,$new_here = 0,$new_id = null)
	{
		$this->id       = $new_id;
		$this->LastName = $new_LastName;
		$this->FirstName= $new_FirstName;
		$this->amount   = $new_amount;
		$this->here     = $new_here;
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
	function getHere()
	{
		return $this->here;
	}
	function setHere($new_here)
	{
		$this->here = $here;
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
			$here    = $attendees['here'];
			$id       = $attendees['id'];
			$new_attendees = new attendees($FirstName, $LastName, $amount, $Type, $email,$here,$id);
			array_push($attendeess, $new_attendees);
		}
		return $attendeess;
	}
	static function deleteAll()
	{
		$GLOBALS['DB']->exec("DELETE FROM attendees *;");
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
		$GLOBALS['DB']->exec("UPDATE attendees SET FirstName={$attendees_name} WHERE id={$this->getId()};");
		$this->setFirstName($attendees_name);
	}
	function updateLastName($new_LastName)
	{
		$GLOBALS['DB']->exec("UPDATE attendees SET LastName={$new_LastName} WHERE id={$this->getId()};");
		$this->setLastName($new_LastName);
	}
	function updatePerson($new_here)
	{
		$GLOBALS['DB']->exec("UPDATE attendees SET Here={$new_here} WHERE id={$this->getId()};");
		$this->setLastName($new_here);
	}
	function updatePersonWin()
	{
		$GLOBALS['DB']->exec("UPDATE attendees SET rafflewon = 1 WHERE id={$this->getId()};");
	}
	function delete()
	{
		$GLOBALS['DB']->exec("DELETE FROM attendees * WHERE id={$this->getId()};");
	}

	static function getTotal(){
 	 $returned_users = $GLOBALS['DB']->query("SELECT SUM(amount), count(*) FROM attendees;");
	 $total =  array();
	 foreach ($returned_users as  $value) {
    $total['total']= $value[0];
		$total['attendees']=$value[1];
	 }
   return $total;
  }

	static function getAllNonObject()
	{
		$returned_attendeess = $GLOBALS['DB']->query("SELECT * FROM attendees ;");
		$attendeess          = array();
		foreach ($returned_attendeess as $attendees) {
			$FirstName = $attendees['fname'];
			$LastName = $attendees['lname'];
			$Type     = $attendees['type'];
			$amount    = $attendees['amount'];
			$email    = $attendees['email'];
			$here    = $attendees['here'];
			$id       = $attendees['id'];
			$new_attendees = array('FirstName' =>$FirstName ,'LastName'=> $LastName,'Type'=>$Type,'amount '=>$amount,'email' =>$email,'here'=>$here,'id'=>$id); ;
			array_push($attendeess, $new_attendees);
		}
		return $attendeess;
	}
	static function getAllHere()
	{
		$returned_attendeess = $GLOBALS['DB']->query("SELECT fname ,id,lname FROM attendees Where here = 1 and rafflewon =0;");
		$attendeess          = array();
		foreach($returned_attendeess as $attendees) {
			$FirstName = $attendees['fname'];
			$id = $attendees['id'];
			$LastName = $attendees['lname'];
			$new_attendees = array('FirstName' => $FirstName,'id'=>$id,'LastName'=> $LastName); ;
			array_push($attendeess, $new_attendees);
		}
		return $attendeess;
	}
}

?>
