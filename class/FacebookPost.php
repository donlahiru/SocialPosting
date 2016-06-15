<?php
class FacebookPost
{
	private $conf_array;
	
	public function __construct($conf_array) {
        $this->conf_array = $conf_array;
    }
	
	public function send($message)
	{

		$fb = new Facebook\Facebook([
			'app_id' => $this->conf_array['appId'],
			'app_secret' => $this->conf_array['secret'],
			'default_graph_version' => 'v2.6'
		]);

		
		$linkData = [
		'message' => $message
		];


		try 
		{
			// Returns a `Facebook\FacebookResponse` object
			$response 		= $fb->post('/me/feed', $linkData, $this->conf_array['accessToken']);
			$graphNode 		= $response->getGraphNode();
		} 
		catch(Facebook\Exceptions\FacebookResponseException $e) 
		{
			$data['type'] 	= 'fail';
			$data['msg']	= 'Graph returned an error: ' . $e->getMessage();
		} 
		catch(Facebook\Exceptions\FacebookSDKException $e)
		{
			$data['type'] 	= 'fail';
			$data['msg']	= 'Facebook SDK returned an error: ' . $e->getMessage();
		}
		
		return $data;
	}
}
?>