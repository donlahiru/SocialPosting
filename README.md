# Social Media Post 


first to run this program you have to set social media configeration in config.ini file
```
;facebook credentials
[Facebook:FacebookPost]
appId = "xxxxx"
secret = "xxxxx"
accessToken = "xxxxx"

;twitter credentials
[Twitter:TwitterPost]
oauth_access_token = "xxxxx"
oauth_access_token_secret = "xxxxx"
consumer_key = "xxxxx"
consumer_secret = "xxxxx"
url_postStatusUpdate = "https://api.twitter.com/1.1/statuses/update.json"

```
enter relavent configeration in marked as 'xxxxx'

If you want to add new social media to post status there are simple step to do with out changing the code

first you have to add credentials to config.ini like mention in above
as a exmaple google+

```
[google+:GooglePost]
.....
...
...
```
google+ is the name that appear in the program that user to check to post for that social media.
when you add config like above in config.ini file it will automatically appear in the program nothing to change the code.

GooglePost is the class name.
you have to add class file in class folder and add send method like below

```
class GooglePost
{
  private $conf_array;
	
	public function __construct($conf_array) {
        $this->conf_array = $conf_array;
  }
  
  public function send($message)
  {
  ....
  ....
  }
  
}
```
