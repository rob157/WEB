<html>

<head>
<link type="text/css" href="./style.css" rel="stylesheet" />

<title>Members page</title>

</head>
<?php 
include ('header.html');
?>


<body>
<?php
$members[0]['name']="Jeanne Serge";
$members[0]['email']="jeanne.serge@ece.fr";
$members[0]['url']="./member.php";

$members[1]['name']="Fracky Vincent ";
$members[1]['email']="francky.vicent@ece.fr";
$members[1]['url']="./member.php";

$members[2]['name']="Louis Quatorze";
$members[2]['email']="louis.quatorze@ece.fr";
$members[2]['url']="./member.php";

$members[3]['name']="Robin Biondi";
$members[3]['email']="robin.biondi@ece.fr";
$members[3]['url']="./member.php";

?>

 
<div class="wall">
<h1>Members List:</h1>
<br>




<p id="table">

<TABLE BORDER WIDTH=40%>
    <CAPTION> Liste des membres </CAPTION> <br>

    <TR>
        <TH> Name </TH>
        <TH> E-Mail </TH>
        <TH> URL </TH>
    </TR>
	<?php 

foreach($members as $member)
{ 

?>
    <TR>
        <TD VALIGN="left"> <?php echo $member['name'] ?> </TD>
		

        <TD VALIGN="left"> 
		<a href= <?php echo $member['email'] ?> >
		<?php echo $member['email'] ?> <a/> </TD>
		
		<TD VALIGN="left"> 
		<a href= <?php echo $member['url'] ?> > 
		Profile Page <a/>
		</TD>
		

    </TR>
			<?php
}
?>


</TABLE> <br>
</p>
	
	</div>
	
</body>

</html>
