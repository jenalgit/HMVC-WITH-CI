<?php
	//var_dump($user_profile);

	echo "User Profile";
	//echo "<pre>";

	//print_r($additional_data);
		

	$hidden = array(
						'firstName' 			=> $additional_data['firstName'],
						'lastName' 			    => $additional_data['lastName'],
						'displayName'           => $additional_data['displayName'],
						'phone'                 => $additional_data['phone'],
						'gender'                => $additional_data['gender'],
						'identifier'            => $additional_data['identifier'],
						'profileURL'            => $additional_data['profileURL'],
						'photoURL'              => $additional_data['photoURL'],
						'webSiteURL' 			=> $additional_data['webSiteURL'],
					    'description' 			=> $additional_data['description'], 
					    'language' 				=> $additional_data['language'],
					    'age' 					=> $additional_data['age'],
					    'birthDay' 				=> $additional_data['birthDay'],
					    'birthMonth'			=> $additional_data['birthMonth'], 
					    'birthYear' 			=> $additional_data['birthYear'], 
					    'address' 				=> $additional_data['address'],
					    'country' 				=> $additional_data['country'], 
					    'region' 				=> $additional_data['region'], 
					    'city'					=> $additional_data['city'],
					    'zip' 					=> $additional_data['zip'],
					    'provider' 				=> $additional_data['provider'],
				);

if($additional_data['email']!=''){
	$hidden['email']=$additional_data['email'];
}
echo form_open('hauth/users_profile_section/'.$additional_data['provider'], '', $hidden);
?>
<table>

<?php if($additional_data['photoURL']!=''){?><tr><td>Profile Image : </td><td><img src="<?php echo $additional_data['photoURL'];?>" width="100" height="100"></td><tr><?php }?>
<?php if($additional_data['email']!=''){?>
<tr><td>Email ID : </td><td><?php echo $additional_data['email'];?></td><tr>
	<?php }else{?>
<tr><td>Email ID : </td><td><input type="text" name="email" value="<?php echo set_value('email'); ?>"><?php echo form_error('email'); ?>

</td><tr>

<?php }?>

<?php if($additional_data['firstName']!=''){?><tr><td>First name : </td><td><?php echo $additional_data['firstName'];?></td><tr><?php }?>
<?php if($additional_data['lastName']!=''){?><tr><td>Last name : </td><td><?php echo $additional_data['lastName'];?></td><tr><?php }?>
<?php if($additional_data['phone']!=''){?><tr><td>Phone Number : </td><td><?php echo $additional_data['phone'];?></td><tr><?php }?>
<?php if($additional_data['gender']!=''){?><tr><td>Genger : </td><td><?php echo $additional_data['gender'];?></td><tr><?php }?>
<?php if($additional_data['webSiteURL']!=''){?><tr><td>web Site URL : </td><td><?php echo $additional_data['webSiteURL'];?></td><tr><?php }?>
<?php if($additional_data['description']!=''){?><tr><td>description : </td><td><?php echo $additional_data['description'];?></td><tr><?php }?>
<?php if($additional_data['language']!=''){?><tr><td>language : </td><td><?php echo $additional_data['language'];?></td><tr><?php }?>
<?php if($additional_data['age']!=''){?><tr><td>Age : </td><td><?php echo $additional_data['age'];?></td><tr><?php }?>
<?php if($additional_data['address']!=''){?><tr><td>Address : </td><td><?php echo $additional_data['address'];?></td><tr><?php }?>
<?php if($additional_data['country']!=''){?><tr><td>Country : </td><td><?php echo $additional_data['country'];?></td><tr><?php }?>
<?php if($additional_data['region']!=''){?><tr><td>region : </td><td><?php echo $additional_data['region'];?></td><tr><?php }?>
<?php if($additional_data['city']!=''){?><tr><td>city : </td><td><?php echo $additional_data['city'];?></td><tr><?php }?>
<?php if($additional_data['zip']!=''){?><tr><td>zip : </td><td><?php echo $additional_data['zip'];?></td><tr><?php }?>
<?php if($additional_data['provider']!=''){?><tr><td>provider : </td><td><?php echo $additional_data['provider'];?></td><tr><?php }?>
<input type="hidden" name="action" value="process" />
	<tr><td><input type="submit" value="NEXT >>" ></td><tr>


</table>
<?php echo form_close('');?>

<?php 

foreach($providers as $provider => $data) {
				if ($data['connected']) {
					echo "<li>".anchor('hauth/logout/'.$provider,'Logout of '.$provider, array('class' => 'connected'))."</li>";
				} else {
					//echo "<li>".anchor('hauth/login/'.$provider,'Login in '.$provider, array('class' => 'login'))."</li>";
				}

			}


/*if(is_array($user_contacts) && !empty($user_contacts)){
echo "<pre>";
print_r($user_contacts);
}*/
?>
