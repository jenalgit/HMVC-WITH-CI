<?php
	//var_dump($user_profile);

	echo "User Profile";	

?>
<table>

<?php if($additional_data['photoURL']!=''){?><tr><td>Profile Image : </td><td><img src="<?php echo $additional_data['photoURL'];?>" width="100" height="100"></td><tr><?php }?>
<?php if($additional_data['email']!=''){?>
<tr><td>Email ID : </td><td><?php echo $additional_data['email'];?></td><tr>
	<?php }?>

<?php if($additional_data['firstName']!=''){?><tr><td>First name : </td><td><?php echo $additional_data['firstName'];?></td><tr><?php }?>
<?php if($additional_data['lastName']!=''){?><tr><td>Last name : </td><td><?php echo $additional_data['lastName'];?></td><tr><?php }?>
<?php if($additional_data['phone']!=''){?><tr><td>Phone Number : </td><td><?php echo $additional_data['phone'];?></td><tr><?php }?>
<?php if($additional_data['gender']!=''){?><tr><td>Genger : </td><td><?php echo $additional_data['gender'];?></td><tr><?php }?>
<?php if($additional_data['webSiteURL']!=''){?><tr><td>web Site URL : </td><td><?php echo $additional_data['webSiteURL'];?></td><tr><?php }?>
<?php if($additional_data['description']!=''){?><tr><td>description : </td><td><?php echo $additional_data['description'];?></td><tr><?php }?>
<?php if($additional_data['language']!=''){?><tr><td>language : </td><td><?php echo $additional_data['language'];?></td><tr><?php }?>
<?php if($additional_data['age']>0){?><tr><td>Age : </td><td><?php echo $additional_data['age'];?></td><tr><?php }?>
<?php if($additional_data['address']!=''){?><tr><td>Address : </td><td><?php echo $additional_data['address'];?></td><tr><?php }?>
<?php if($additional_data['country']!=''){?><tr><td>Country : </td><td><?php echo $additional_data['country'];?></td><tr><?php }?>
<?php if($additional_data['region']!=''){?><tr><td>region : </td><td><?php echo $additional_data['region'];?></td><tr><?php }?>
<?php if($additional_data['city']!=''){?><tr><td>city : </td><td><?php echo $additional_data['city'];?></td><tr><?php }?>
<?php if($additional_data['zip']!=''){?><tr><td>zip : </td><td><?php echo $additional_data['zip'];?></td><tr><?php }?>
<?php if($additional_data['provider']!=''){?><!--<tr><td>provider : </td><td><?php //echo $additional_data['provider'];?></td><tr>--><?php }?>


</table>

<?php
echo "<ul><li>".anchor('hauth/logout','Log out ', array('class' => 'connected'))."</li></ul>";


?>
