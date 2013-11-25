<html>

<head>
<link type="text/css" href="./style.css" rel="stylesheet" />


</head>
<?php 
include ('header.phtml');
?>

<body>

<p class="intro"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p> <br>

<p class= "content" >
<form method="post" action="./profile.php" class="form"><br>
    <label>NAME </label>    <input type="text" name="name" placeholder="Nicolas"> <br><br>
    <label>FIRST NAME</label>    <input type="text" name="firstName" placeholder="Dupont"> <br><br>
    <label>EMAIL</label>    <input type="text" name="mail" placeholder="dupont.nicolas@ece.fr"> <br><br>
    <label>PASSWORD</label>    <input type="password" name="mail"> <br><br>
	<label>SEX</label>	<SELECT name="sex">
		<OPTION VALUE="male">Male</OPTION>
		<OPTION VALUE="female">Female</OPTION>
	</SELECT> <br><br>
	    <input type="submit" class="classe_button" value="Sign in">

</form> <br>
</p>


<p id="table">
<TABLE BORDER WIDTH=80%>
    <CAPTION> Liste des patients </CAPTION> <br>

    <TR>
        <TH> Name </TH>
        <TH> First Name </TH>
        <TH> E-Mail </TH>
        <TH> Sex </TH>
        <TH> Picture </TH>
    </TR>
	
	<?php  
	
	$membre[0]['firstname']="Jean";
	$membre[0]['familyname']="Racine";
	$membre[0]['mailadress']="jean.racine@ece.fr";
	$membre[0]['gender']="Male";
	$membre[0]['imageurl']="king.jpg";
	$membre[1]['firstname']="Bernadette";
	$membre[1]['familyname']="Martin";
	$membre[1]['mailadress']="bernadette.martin@ece.fr";
	$membre[1]['gender']="Female";
	$membre[1]['imageurl']="reine.jpg";
	$membre[2]['firstname']="Gaston";
	$membre[2]['familyname']="Lagaffe";
	$membre[2]['mailadress']="gaston.lagaffe@ece.fr";
	$membre[2]['gender']="Male";
	$membre[2]['imageurl']="leopard.jpg";
	?>
	
	<?php 
	$memberNb=0;
	foreach ($membre as $memb)
	{
	?>
	
	
	
    <TR>
        <TD VALIGN="left"> <a href="listmember.php"><?php echo $memb['firstname'] ?></a></TD>
        <TD VALIGN="left"> <?php echo $memb['familyname'] ?> </TD>
        <TD VALIGN="left"> <?php echo $memb['mailadress'] ?> </TD>
        <TD VALIGN="left"> <?php echo $memb['gender'] ?> </TD>
        <TH> <img src=<?php  $memb['imageurl'] ?> /> </TH>
    </TR>
	
	<?php
	$memberNb++;
	}
	

	?>
	
	
	
    
	

</TABLE> <br>
</p>

<?php 

require_once('Member.php');
	
	$firstmember=new Member('Dupont','Jean','slknvsoib','pass','male');
	
	
	
	var_dump($firstmember);
	
	?>


<p>
<?php 
echo date("F j, Y, g:i a"); 
?>


</p>
</body>
</html>
