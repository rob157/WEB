
<?php 



class Member{

//properties
public $_name;
public $_firstname;
public $_email;
public $_password;
public $_gender;

//methods
//require_once('index.php');
public function getFrontProfile($bool){
	if($bool==True) return $membre;
	else {
	
	shuffle($membre);
	
	
	return $membre;
	
	}
	}
/*public function save(){


}*/

public function Member($name,$firstname,$email,$password,$gender){
$_name=$name;
$_firstname=$firstname;
$_email=$email;
$_password=$password;
$_gender=$gender;

}

public function delete(){}

public  function isAdmin(){}

}

?>
