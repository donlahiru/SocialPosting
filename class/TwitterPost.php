<?php
require_once MAIN_ROOT.'/vendor/j7mbo/twitter-api-php/TwitterAPIExchange.php';

class TwitterPost
{
	private $conf_array;
	
	public function __construct($conf_array) {
        $this->conf_array = $conf_array;
    }
	
	public function send($message)
	{
		$settings = array('oauth_access_token' => $this->conf_array['oauth_access_token'],
		'oauth_access_token_secret' => $this->conf_array['oauth_access_token_secret'],
		'consumer_key' => $this->conf_array['consumer_key'],
		'consumer_secret' => $this->conf_array['consumer_secret']
		);
		
		$url 		= $this->conf_array['url_postStatusUpdate'];
		try
		{
			$twitter 	= new TwitterAPIExchange($settings);
		
			$requestMethod 	= 'POST';
			$postfields 	= array('status' => $message); 
		
			$twitter->buildOauth($url, $requestMethod)
			->setPostfields($postfields)
			->performRequest();
		}
		catch(Exception $e)
		{
			$data['type'] 	= 'fail';
			$data['msg']	= 'Twitter returned an error: ' . $e->getMessage();
		}
		
		return $data;
	}
}
?>