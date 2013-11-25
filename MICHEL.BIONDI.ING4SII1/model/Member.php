<?php
require_once ('config.php');
class Member
{
    // put properties here
    private $name="";
    private $firstName="";
    private $email="";
    private $password="";
    private $sex="";
    private $pseudo="";
    private $image="";
	private $website="";
    /*
    If the pseudo is not null, get the data from database and fill the properties
    If the pseudo is null, do nothing
    */
    public function __construct($mypseudo,$myemail,$mypassword,$mysex,$image='',$flickr='') {
        // SELECT
		
		$this->pseudo=$mypseudo;
	    $this->email=$myemail;
		$this->password=$mypassword;
		$this->sex=$mysex;
		
		
			
			
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		//$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '', $pdo_options);
		$bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
		
		if ($this->pseudo!=''){
		
		$this->save();
		
		}
		
		$this->redirect('/');
		
	
		
		
		
		
    }
    
	public function constructor($myname,$myfirstName,$myemail,$mypassword,$mysex)
	{
		
		
	}
    /*
    Save the member into the database. If the id property is null, create a new member
    If not, just update it
    */
    public function save()
    {
        
		var_dump($this);
		
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);		
		//$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '', $pdo_options);
    		
		$insertion=$bdd->prepare('INSERT INTO member(pseudo,email,password,sex,image,website,dateRegistered)
		VALUES (:mypseudo,:myemail, :mypassword,:mysex,:image,:flickr,CURDATE())');

		$insertion->execute(array(
		'mypseudo'=> $this->pseudo,
		'myemail' => $this->email,
		'mypassword' => $this->password,
		'mysex' => $this->sex,
		'image' => $this->image,
		'flickr' => $this->website,
		));
		echo 'Inserted';
		
		exit;
    }
    
    /* is the current member admin ? */
    public function isAdmin()
    {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			//$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '', $pdo_options);
			//$bdd = new PDO('mysql:host=sql-users.ece.fr;dbname=biondi;port=3305', 'biondi-rw', 'AYrBPmdr', $pdo_options);
			//$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '', $pdo_options);
			$bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
			$answer = $bdd->query('SELECT isAdmin FROM Members WHERE pseudo="$this->pseudo"');
    }
    
    
}
