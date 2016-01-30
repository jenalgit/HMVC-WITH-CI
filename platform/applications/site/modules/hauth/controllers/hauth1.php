<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HAuth extends CI_Controller {

	public function __construct()
	{
		// Constructor to auto-load HybridAuthLib
		parent::__construct();

		//echo WRITABLEPATH.'logs/site/hybridauth.log';
		$this->load->library('HybridAuthLib');
	}

	public function index()
	{
		// Send to the view all permitted services as a user profile if authenticated
		$data['user_profile_data']='';
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['user_profile_data']=$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
		$this->load->view('hauth/home', $data);
	}

	public function invite()
	{
		
		$this->load->view('hauth/status');
	}


	public function login($provider)
	{
		log_message('debug', "controllers.HAuth.login($provider) called");

		try
		{
			log_message('debug', 'controllers.HAuth.login: loading HybridAuthLib');


			if ($this->hybridauthlib->providerEnabled($provider))
			{
				log_message('debug', "controllers.HAuth.login: service $provider enabled, trying to authenticate.");
				$service = $this->hybridauthlib->authenticate($provider);

				if ($service->isUserConnected())
				{
					//log_message('debug', 'controller.HAuth.login: user authenticated.');
					// Redirect back to the index to show the profile
					//redirect('hauth/', 'refresh');
					$data['providers'] = $this->hybridauthlib->getProviders();

					$user_profile = $service->getUserProfile();

					log_message('info', 'controllers.HAuth.login: user profile:'.PHP_EOL.print_r($user_profile, TRUE));					

				
					
					$additional_data = array(
						'firstName' 			=> $user_profile->firstName,
						'lastName' 			    => $user_profile->lastName,
						'displayName'           => $user_profile->displayName,
						'phone'                 => $user_profile->phone,
						'gender'                => $user_profile->gender,
						'identifier'            => $user_profile->identifier,
						'profileURL'            => $user_profile->profileURL,
						'photoURL'              => $user_profile->photoURL,
						'email'            		=> $user_profile->email,
						'webSiteURL' 			=> $user_profile->webSiteURL,
					    'description' 			=> $user_profile->description, 
					    'language' 				=> $user_profile->language,
					    'age' 					=> $user_profile->age,
					    'birthDay' 				=> $user_profile->birthDay,
					    'birthMonth'			=> $user_profile->birthMonth, 
					    'birthYear' 			=> $user_profile->birthYear, 
					    'address' 				=> $user_profile->address,
					    'country' 				=> $user_profile->country, 
					    'region' 				=> $user_profile->region, 
					    'city'					=> $user_profile->city,
					    'zip' 					=> $user_profile->zip,
					    'provider' 				=> $provider,
				);

				
						$data['additional_data'] = $additional_data;

					$this->load->view('hauth/done',$data);


				}
				else // Cannot authenticate user
					{
					show_error('Cannot authenticate user');
				}
			}
			else // This service is not enabled.
				{
				log_message('error', 'controllers.HAuth.login: This provider is not enabled ('.$provider.')');
				show_404($_SERVER['REQUEST_URI']);
			}
		}
		catch(Exception $e)
		{
			$error = 'Unexpected error';
			switch($e->getCode())
			{
			case 0 : $error = 'Unspecified error.'; break;
			case 1 : $error = 'HybridAuth configuration error.'; break;
			case 2 : $error = 'Provider not properly configured.'; break;
			case 3 : $error = 'Unknown or disabled provider.'; break;
			case 4 : $error = 'Missing provider application credentials.'; break;
			case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
				//redirect();
				if (isset($service))
				{
					log_message('debug', 'controllers.HAuth.login: logging out from service.');
					$service->logout();
				}
				show_error('User has cancelled the authentication or the provider refused the connection.');
				break;
			case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
				break;
			case 7 : $error = 'User not connected to the provider.';
				break;
			}

			if (isset($service))
			{
				$service->logout();
			}

			log_message('error', 'controllers.HAuth.login: '.$error);
			show_error('Error authenticating user.');
		}
	}


public function users_profile(){

		$data = array(
						'email' 			=> $this->input->post('email'),
						'firstName' 			=> $this->input->post('firstName'),
						'lastName' 			    => $this->input->post('lastName'),
						'displayName'           => $this->input->post('displayName'),
						'phone'                 => $this->input->post('phone'),
						'gender'                => $this->input->post('gender'),
						'identifier'            => $this->input->post('identifier'),
						'profileURL'            => $this->input->post('profileURL'),
						'photoURL'              => $this->input->post('photoURL'),
						'webSiteURL' 			=> $this->input->post('webSiteURL'),
					    'description' 			=> $this->input->post('description'), 
					    'language' 				=> $this->input->post('language'),
					    'age' 					=> $this->input->post('age'),
					    'birthDay' 				=> $this->input->post('birthDay'),
					    'birthMonth'			=> $this->input->post('birthMonth'), 
					    'birthYear' 			=> $this->input->post('birthYear'), 
					    'address' 				=> $this->input->post('address'),
					    'country' 				=> $this->input->post('country'), 
					    'region' 				=> $this->input->post('region'), 
					    'city'					=> $this->input->post('city'),
					    'zip' 					=> $this->input->post('zip'),
					    'provider' 				=> $this->input->post('provider'),
				);
print_r($data);

}

	public function logout($provider = "")
	{

		log_message('debug', "controllers.HAuth.logout($provider) called");

		try
		{
			if ($provider == "") {

				log_message('debug', "controllers.HAuth.logout() called, no provider specified. Logging out of all services.");
				$data['service'] = "all";
				$this->hybridauthlib->logoutAllProviders();
			} else {
				if ($this->hybridauthlib->providerEnabled($provider)) {
					log_message('debug', "controllers.HAuth.logout: service $provider enabled, trying to check if user is authenticated.");
					$service = $this->hybridauthlib->authenticate($provider);

					if ($service->isUserConnected()) {
						log_message('debug', 'controller.HAuth.logout: user is authenticated, logging out.');
						$service->logout();
						$data['service'] = $provider;
					} else { // Cannot authenticate user
						show_error('User not authenticated, success.');
						$data['service'] = $provider;
					}

				} else { // This service is not enabled.

					log_message('error', 'controllers.HAuth.login: This provider is not enabled ('.$provider.')');
					show_404($_SERVER['REQUEST_URI']);
				}
			}
			// Redirect back to the main page. We're done with logout
			redirect('hauth/', 'refresh');

		}
		catch(Exception $e)
		{
			$error = 'Unexpected error';
			switch($e->getCode())
			{
			case 0 : $error = 'Unspecified error.'; break;
			case 1 : $error = 'Hybriauth configuration error.'; break;
			case 2 : $error = 'Provider not properly configured.'; break;
			case 3 : $error = 'Unknown or disabled provider.'; break;
			case 4 : $error = 'Missing provider application credentials.'; break;
			case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
				//redirect();
				if (isset($service))
				{
					log_message('debug', 'controllers.HAuth.login: logging out from service.');
					$service->logout();
				}
				show_error('User has cancelled the authentication or the provider refused the connection.');
				break;
			case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
				break;
			case 7 : $error = 'User not connected to the provider.';
				break;
			}

			if (isset($service))
			{
				$service->logout();
			}

			log_message('error', 'controllers.HAuth.login: '.$error);
			show_error('Error authenticating user.');
		}
	}

	// Little json api and variable output testing function. Make it easy with JS to verify a session.  ;)
	public function status($provider = "")
	{
		try
		{
			if ($provider == "") {
				log_message('debug', "controllers.HAuth.status($provider) called, no provider specified. Providing details on all connected services.");
				$connected = $this->hybridauthlib->getConnectedProviders();

				if (count($connected) == 0) {
					$data['status'] = "User not authenticated.";
				} else {
					$connected = $this->hybridauthlib->getConnectedProviders();
					foreach($connected as $provider) {
						if ($this->hybridauthlib->providerEnabled($provider)) {
							log_message('debug', "controllers.HAuth.status: service $provider enabled, trying to check if user is authenticated.");
							$service = $this->hybridauthlib->authenticate($provider);
							if ($service->isUserConnected()) {
								log_message('debug', 'controller.HAuth.status: user is authenticated to $provider, providing profile.');
								$data['status'][$provider] = (array)$this->hybridauthlib->getAdapter($provider)->getUserProfile();
							} else { // Cannot authenticate user
								$data['status'][$provider] = "User not authenticated.";
							}
						} else { // This service is not enabled.
							log_message('error', 'controllers.HAuth.status: This provider is not enabled ('.$provider.')');
							$data['status'][$provider] = "provider not enabled.";
						}
					}
				}
			} else {
				if ($this->hybridauthlib->providerEnabled($provider)) {
					log_message('debug', "controllers.HAuth.status: service $provider enabled, trying to check if user is authenticated.");
					$service = $this->hybridauthlib->authenticate($provider);
					if ($service->isUserConnected()) {
						log_message('debug', 'controller.HAuth.status: user is authenticated to $provider, providing profile.');
						$data['status'][$provider] = (array)$this->hybridauthlib->getAdapter($provider)->getUserProfile();
					} else { // Cannot authenticate user
						$data['status'] = "User not authenticated.";
					}
				} else { // This service is not enabled.
					log_message('error', 'controllers.HAuth.status: This provider is not enabled ('.$provider.')');
					$data['status'] = "provider not enabled.";
				}
			}
			$this->load->view('hauth/status', $data);
		}
		catch(Exception $e)
		{
			$error = 'Unexpected error';
			switch($e->getCode())
			{
			case 0 : $error = 'Unspecified error.'; break;
			case 1 : $error = 'Hybriauth configuration error.'; break;
			case 2 : $error = 'Provider not properly configured.'; break;
			case 3 : $error = 'Unknown or disabled provider.'; break;
			case 4 : $error = 'Missing provider application credentials.'; break;
			case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
				//redirect();
				if (isset($service))
				{
					log_message('debug', 'controllers.HAuth.login: logging out from service.');
					$service->logout();
				}
				show_error('User has cancelled the authentication or the provider refused the connection.');
				break;
			case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
				break;
			case 7 : $error = 'User not connected to the provider.';
				break;
			}

			if (isset($service))
			{
				$service->logout();
			}

			log_message('error', 'controllers.HAuth.login: '.$error);
			show_error('Error authenticating user.');
		}
	}

	public function endpoint()
	{

		log_message('debug', 'controllers.HAuth.endpoint called.');
		log_message('info', 'controllers.HAuth.endpoint: $_REQUEST: '.print_r($_REQUEST, TRUE));

		if ($_SERVER['REQUEST_METHOD'] === 'GET')
		{
			log_message('debug', 'controllers.HAuth.endpoint: the request method is GET, copying REQUEST array into GET array.');
			$_GET = $_REQUEST;
		}

		log_message('debug', 'controllers.HAuth.endpoint: loading the original HybridAuth endpoint script.');
		require_once COMMONPATH.'/third_party/hybridauth/index.php';
		//require COMMONPATH.'third_party/hybridauth/Hybrid/Auth.php';


	}
}

/* End of file hauth.php */
/* Location: ./application/controllers/hauth.php */
