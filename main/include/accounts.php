<?php
require_once(LIB_PATH . DS . 'database.php');
class User
{
	protected static  $tblname = "admin";

	function dbfields()
	{
		global $mydb;
		return $mydb->getfieldsononetable(self::$tblname);
	}
	function listofuser()
	{
		global $mydb;
		$mydb->setQuery("SELECT * FROM " . self::$tblname);
		//return $cur;
	}
	function find_user($id = "", $user_name = "")
	{
		global $mydb;
		$mydb->setQuery("SELECT * FROM " . self::$tblname . " 
			WHERE AdminID = {$id} OR Username = '{$user_name}'");
		$cur = $mydb->executeQuery();
		$row_count = $mydb->num_rows($cur);
		return $row_count;
	}
	static function userAuthentication($email, $h_pass)
	{
		global $mydb;
		$mydb->setQuery("SELECT * FROM `admin` WHERE `Username` = '" . $email . "' and `password` = '" . $h_pass . "'");
		$cur = $mydb->executeQuery();
		if ($cur == false) {
			//	die(mysqli_error());
		}
		$row_count = $mydb->num_rows($cur); //get the number of count
		if ($row_count == 1) {
			$user_found = $mydb->loadSingleResult();
			$_SESSION['AdminID']   	= $user_found->AdminID;
			$_SESSION['Firstname']      	= $user_found->Firstname;
			$_SESSION['Middlename']      	= $user_found->Middlename;
			$_SESSION['Lastname']      	= $user_found->Lastname;

			$_SESSION['Birthdate']      	= $user_found->Birthdate;
			$_SESSION['Gender']      	= $user_found->Gender;

			$_SESSION['Address']      	= $user_found->Address;
			$_SESSION['Contact']      	= $user_found->Contact;

			$_SESSION['CivilStatus']      	= $user_found->CivilStatus;
			$_SESSION['Citizenship']      	= $user_found->Citizenship;

			$_SESSION['Username'] 		= $user_found->Username;
			$_SESSION['password'] 		= $user_found->password;
			$_SESSION['AdminType'] 		= $user_found->AdminType;


			//get age
			$bday = new DateTime($_SESSION['Birthdate']);
			$today = new Datetime(date('m/d/y'));
			$diff = $today->diff($bday);
			$age = $diff->y;
			$_SESSION['Age'] 		= $age;
			return true;
		} else {
			return false;
		}
	}
	function single_user($id = "")
	{
		global $mydb;
		$mydb->setQuery("SELECT * FROM " . self::$tblname . " 
				Where AdminID= '{$id}' LIMIT 1");
		$cur = $mydb->loadSingleResult();
		return $cur;
	}
	/*---Instantiation of Object dynamically---*/
	static function instantiate($record)
	{
		$object = new self;

		foreach ($record as $attribute => $value) {
			if ($object->has_attribute($attribute)) {
				$object->$attribute = $value;
			}
		}
		return $object;
	}


	/*--Cleaning the raw data before submitting to Database--*/
	private function has_attribute($attribute)
	{
		// We don't care about the value, we just want to know if the key exists
		// Will return true or false
		return array_key_exists($attribute, $this->attributes());
	}

	protected function attributes()
	{
		// return an array of attribute names and their values
		global $mydb;
		$attributes = array();
		foreach ($this->dbfields() as $field) {
			if (property_exists($this, $field)) {
				$attributes[$field] = $this->$field;
			}
		}
		return $attributes;
	}

	protected function sanitized_attributes()
	{
		global $mydb;
		$clean_attributes = array();
		// sanitize the values before submitting
		// Note: does not alter the actual value of each attribute
		foreach ($this->attributes() as $key => $value) {
			$clean_attributes[$key] = $mydb->escape_value($value);
		}
		return $clean_attributes;
	}


	/*--Create,Update and Delete methods--*/
	public function save()
	{
		// A new record won't have an id yet.
		return isset($this->id) ? $this->update() : $this->create();
	}

	public function create()
	{
		global $mydb;
		// Don't forget your SQL syntax and good habits:
		// - INSERT INTO table (key, key) VALUES ('value', 'value')
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
		$sql = "INSERT INTO " . self::$tblname . " (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
		echo $mydb->setQuery($sql);

		if ($mydb->executeQuery()) {
			$this->id = $mydb->insert_id();
			return true;
		} else {
			return false;
		}
	}

	public function update($id = 0)
	{
		global $mydb;
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach ($attributes as $key => $value) {
			$attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE " . self::$tblname . " SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE AdminID=" . $id;
		$mydb->setQuery($sql);
		if (!$mydb->executeQuery()) return false;
	}

	public function delete($id = 0)
	{
		global $mydb;
		$sql = "DELETE FROM " . self::$tblname;
		$sql .= " WHERE AdminID=" . $id;
		$sql .= " LIMIT 1 ";
		$mydb->setQuery($sql);

		if (!$mydb->executeQuery()) return false;
	}
}
