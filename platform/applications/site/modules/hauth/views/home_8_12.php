
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login to Join The Community</title>


</head>
<body>

<div id="container">
	<h1></h1>

        <div style="center">
		
		<h2>Login to Join The Community</h2>
                


		<?php
			// Output the enabled services and change link/button if the user is authenticated.
			$this->load->helper('url');

			//echo "<pre>";

			//print_r($user_profile_data);

			foreach($providers as $provider => $data) {
				if ($data['connected']) {
					echo "<li>".anchor('hauth/logout/'.$provider,'Logout of '.$provider, array('class' => 'connected'))."</li>";
				} else {
					//echo "<li>".anchor('hauth/login/'.$provider,'Login in '.$provider, array('class' => 'login'))."</li>";
				}
			}
                        
		?>
	
                <a href="<?php echo base_url(); ?>hauth/login/Twitter"><img alt="" src="http://stage.curatigo.com/assets/curatigo/images/twitter.png"></a>
                <br style="clear: both;"/>
                <a href="<?php echo base_url(); ?>hauth/login/Facebook"><img alt="" src="http://stage.curatigo.com/assets/curatigo/images/facebook.png"></a>
                  
                <br style="clear: both;"/>

	</div>
	<p class="footer">
	
	</p>
</div>
</body>
</html>


