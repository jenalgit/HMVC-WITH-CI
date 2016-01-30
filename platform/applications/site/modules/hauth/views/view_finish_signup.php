<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Finish Signup</title>
<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/common/css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/common/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/common.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/user-after-login.css" />
<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,200,500,600,700,900,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Karla:400,700' rel='stylesheet' type='text/css'>
</head>

<body>

<?php
	/*echo "<pre>";
	print_r($additional_data);*/
		

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

<section class="user-form-completion">
  <div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-lg-offset-3">
         <div class="user-form-fields common-new">
          <h4>Complete Sign Up</h4>
          <p>Please complete the following fields:</p> 
          
         <!--  <p>We'll send you a confirmation email with a link to activate your account and complete sign up</p> -->
          
          
           <input placeholder="Firstname" type="text" name="firstName" class="form-control" <?php if($additional_data['firstName']!=''){?>readonly<?php }?>  value="<?php echo set_value('firstName',$additional_data['firstName']); ?>">

            <?php echo form_error('firstName'); ?>

           <input placeholder="Lastname" type="text" name="lastName" class="form-control" <?php if($additional_data['lastName']!=''){?>readonly<?php }?>  value="<?php echo set_value('lastName',$additional_data['lastName']); ?>">
          
           <?php echo form_error('lastName'); ?>

      
           <input type="text" name="email" placeholder="Email Address*" class="form-control" <?php if($additional_data['email']!=''){?>readonly<?php }?>  value="<?php echo set_value('email',$additional_data['email']); ?>">
           <?php echo form_error('email'); ?>
           

           <input value="Submit" class="button btn-color send-button" type="submit">
                   <input type="hidden" name="action" value="process" />      
          </div>
          
        </div>
    
    </div>
  
  </div>


</section>

<?php echo form_close('');?>




</body>
</html>
