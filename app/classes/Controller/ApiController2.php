<?php namespace Controller;

class ApiController extends \Controller\API
{
    protected $User;

    public function __construct() {
    	
    	if ( ! array_key_exists('HTTP_ORIGIN', $_SERVER)) {
		    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
		}

        parent::__construct(PATH, $_SERVER['HTTP_ORIGIN']);

        // Abstracted out for example
        $APIKey = new Models\APIKey();
        $User = new Models\User();

        if (!array_key_exists('apiKey', $this->request)) {
            throw new Exception('No API Key provided');
        } else if (!$APIKey->verifyKey($this->request['apiKey'], $origin)) {
            throw new Exception('Invalid API Key');
        } else if (array_key_exists('token', $this->request) &&
             !$User->get('token', $this->request['token'])) {

            throw new Exception('Invalid User Token');
        }

        $this->User = $User;
    }

    public function handle()
    {
    	if ( ! array_key_exists('HTTP_ORIGIN', $_SERVER)) {
		    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
		}

		try {
		    $API = $this->dispatch();
		    echo $API->processAPI();
		} catch (Exception $e) {
		    echo json_encode(Array('error' => $e->getMessage()));
		}
    }

	protected function dispatch($request, $origin) 
	{
		dd($request);
		die();

        //parent::__construct($request);

        // Abstracted out for example
        $APIKey = new Models\APIKey();
        $User = new Models\User();

        if (!array_key_exists('apiKey', $this->request)) 
        {
            throw new Exception('No API Key provided');
        } 
        else if (!$APIKey->verifyKey($this->request['apiKey'], $origin)) 
        {
            throw new Exception('Invalid API Key');
        } 
        else if (array_key_exists('token', $this->request) &&
             !$User->get('token', $this->request['token'])) 
        {

            throw new Exception('Invalid User Token');
        }

        $this->User = $User;
    }

	/**
	* Example of an Endpoint
	*/
	protected function example() 
	{
		if ($this->method == 'GET') 
		{
			return "Your name is " . $this->User->name;
		} 
		else 
		{
			return "Only accepts GET requests";
		}
	}
}