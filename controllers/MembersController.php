<?php

require_once dirname(__FILE__) . '/../lightmvc/ActionController.php';
require_once('/model/Member.php');
require_once('/model/Members.php');

class MembersController extends ActionController
{
    /**
     * Simple index page which links to the main available actions
     */
    public function indexAction()
    {
        // Do nothing
    }
    	public function logoutAction(){
			if(isset($_SESSION['isConnected']))
		{
			unset($_SESSION['isConnected']);
			session_destroy();
		}
		

	}
	
	public function editAction()
	{
	
	
	
	}

    public function signupAction()
    {
	$mymember=new Member($_POST['pseudo'],$_POST['email'],$_POST['password'],$_POST['sex']);
	//$mymember->constructor($_POST['name'],$_POST['firstName'],$_POST['email'],$_POST['password'],$_POST['sex']);
		$mymember->save();
		
    }
    
    public function signinAction()
    {
	
       if(!isset($_SESSION['isConnected']))$this->redirect('/');
		$mymember=new Members($_POST['pseudo'],$_POST['password']);
		
		
		
		
		
		$result=$mymember->signIn();




		if($result==true) {
		
		$_SESSION['isConnected']=true;
		$_SESSION['pseudo']="".$_POST['pseudo'];
						$memberList=$mymember->getAll(0);
			foreach($memberList as $memb)
			{
				if($memb['pseudo']== $_POST['pseudo']){ 

					$_SESSION['isAdmin']=$memb['isAdmin'];
					$_SESSION['idMember']=$memb['idMember'];
				}
			}
			
		
		
		
		}
		else {
		if(isset($_SESSION['isConnected'])){
		
			unset($_SESSION['isConnected']);
			session_destroy();
		
		}
		
		
		
		}
    }
    
    public function listAction()
    {
        // use members : list
		if(isset($_SESSION['isConnected'])&&($_SESSION['isConnected']==true)&&($_SESSION['isAdmin']==true))
		{
		}
		else $this->redirect('/');
    }
    
    public function deleteAction()
    {  
       // use members: delete 
	   if(isset($_SESSION['isConnected'])&&($_SESSION['isConnected']==true)&&($_SESSION['isAdmin']==true))
		{
		}
		else $this->redirect('/members/signin');
	   
    }


}
/*$membersController=new MembersController(); //Parametres à ajouter
$membersController->signupAction();
*/
