<?php

require_once dirname(__FILE__) . '/../lightmvc/ActionController.php';

class ProfileController extends ActionController
{
    /**
     * Simple index page which links to the main available actions
     */
    public function indexAction()
    {
        // Do nothing
		
		
		
    }
    
    
    /**
     *  Edit the profile of the logged member
     */
    public function editAction()
    {
        // member save
        // update save
		
		if(isset($_SESSION['isConnected'])&&($_SESSION['isConnected']==true))
		{
		
					$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		//$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '', $pdo_options
		$bdd = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $pdo_options);
		
		$req = $bdd->prepare('UPDATE member SET pseudo=:pseudo, description=:description, website=:website WHERE idMember=:id');
		$req->execute(array(
		
		'pseudo'=>$_POST['pseudo'],
		'description'=>$_POST['description'],
		'website'=>$_POST['website'],
		'id'=>$_SESSION['idMember']
		
		));

		
		}
		else $this->redirect('/members/signin');
    }
    
    /**
     * Add a like  
     */
    public function addAction()
    {
        // update: save
		if(isset($_SESSION['isConnected'])&&($_SESSION['isConnected']==true))
		{
		}
		else $this->redirect('/members/signin');
		
		
    }
    
        
    /**
     * show the profile
     */
    public function viewAction()
    {
        // use the Profil constructor
		if(isset($_SESSION['isConnected'])&&($_SESSION['isConnected']==true))
		{
			
		}
		else $this->redirect('/members/signin');
		
		
    }
    
    
}
