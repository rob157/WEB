<?php
require_once ('config.php');
class Members
{
    /*
    * if $mode = true or no arg given, return the last three profiles created
    * if $mode = false, return three random profile
    * A profile is defined by an array with two keys : image, pseudo
    */
	
	public $username="";
	public $password="";
	
	public function __construct($myusername="nul",$mypassword="nul") {
        
		$this->username=$myusername;
		$this->password=$mypassword;
		
		
    }
	
    public function getFrontProfiles($mode = true)
    {
        // SELECT
		$idMember=0;
		$numberFrontProfile=3;
		
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		//$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '', $pdo_options);
		$bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
		$size=current($bdd->query('SELECT COUNT(*) FROM member')->fetch());
				
		$size=intval($size);
		
				
		$idMember=$size-$numberFrontProfile;
		
		$req=$bdd->prepare('SELECT * FROM member WHERE (idMember>:idMember)');

		$req->execute(array(
		'idMember' => $idMember
		));
		return $req;
    }
	
	public function constructor($myusername,$mypassword){
	
	$this->username=$myusername;
	$this->password=$mypassword;
	
	
	
	}
    
    /*
    * If username and password is in database, return TRUE. Otherwise, return false
    */ 
    public function signIn(){
        // SELECT
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		//$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '', $pdo_options);
		$bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
    	
		$req=$bdd->prepare('SELECT idMember FROM member WHERE pseudo=:pseudo AND password=:password');
		$req->execute(array(
		'pseudo'=> $this->username,
		'password' => $this->password
		));
		$result=$req->fetch();
		
		if(!$result){
		
		echo 'bad identification';
		return false;
		}
		else{
		
		return true;
		}
		

    }
    
    /*
    * Return an array of all members stored in database. If $number is different from 0, 
    limit the size of the array
    */
    public function getAll($number = 0)
    {
        // SELECT
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		//$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '', $pdo_options);
		$bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
		$arrayMembers=$bdd->query('SELECT * FROM member');
		
			
		return $arrayMembers;
  
		
    }
    
    /*
    Delete the given member, if $idMember is not empty
    */
    public function delete($idMember)
    {
        // DELETE
						$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		//$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '', $pdo_options);
		$bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
    	
		$req=$bdd->prepare('DELETE FROM member WHERE  idMember =:idMember');
		$req->execute(array(
		'idMember' => $idMember
		));
		echo 'SUCCESS DELETE MEMBER'. $idMember ;

		
    }
	
		public static function getRss($idMember)
	{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
		$req=$bdd->prepare('SELECT content, date, service FROM updates WHERE idMember =:idMember ORDER BY date LIMIT 0 , 10 ');
		$req->execute(array(
		'idMember' => $idMember
		));
return $req;
	}

}
?>