<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

$config =
	array(
		// set on "base_url" the relative url that point to HybridAuth Endpoint
		'base_url' => '/hauth/endpoint',

		"providers" => array (
			

			// openid providers
			
			"Facebook" => array (
				"enabled" => true,
				//"keys"    => array ( "id" => "510856789093619", "secret" => "cffae084572c9522bb06f7333d32ffb0" ), 
               "keys"    => array ( "id" => "510573705788594", "secret" => "842ca49f09927d800d7c9b25cca20508" ),
			),

			"Twitter" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "wvld9w7Ombk2ny6rfbE97yzXr", "secret" => "4IFUVEnCDgVLOTZdkRcOSg4jystxkOUFos4JaBM9mHo4xIxhuw" )
			),

			/*
                        
                        "Google" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "1087201581616-uovmucbcm4qtb3fgd76tvksgjs00lpnb.apps.googleusercontent.com", "secret" => "HJuvAyhu0vxYI3ydeK1-cvla" ),
			),"LinkedIn" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "75l3ea4tohbrb4", "secret" => "4upMoHXi0j8h4MMe" )
			),

			"Instagram" => array(
                "enabled" => true,
                "keys" => array("id" => "28c4d4062d63464382498ef1983f168f","secret" => "66db9ee5924b4f02be0c56b07d97bb94")
                
            ),
            
			"OpenID" => array (
				"enabled" => true
			),

			"Yahoo" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" ),
			),

			"AOL"  => array (
				"enabled" => true
			),
		
			// windows live
			"Live" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" )
			),

			"MySpace" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "", "secret" => "" )
			),

			

			"Foursquare" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" )
			),
			
   			
			*/
		),

		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => (ENVIRONMENT == 'development'),

		"debug_file" => WRITABLEPATH.'logs/site/hybridauth.log',
	);


/* End of file hybridauthlib.php */
/* Location: ./application/config/hybridauthlib.php */
