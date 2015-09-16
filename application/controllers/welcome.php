<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		
		$this->load->view('apiTest');
	}
	public function players()
	{
		$response = file_get_contents("https://api.fantasydata.net/nfl/v2/JSON/fantasyPlayers?Subscription-Key=0981e57f07ea419ba2f1a4bf3d1dcb0c");
		$data['json'] = json_decode($response, true);
		// var_dump($data);
		// die();
		// echo $response;
	}

	public function login()
	{
    $postdata=json_decode($_POST['formdata'],true);
    $email = $postdata['email'];
    $pass = $postdata['pass'];
    $array = ['email' => $email, 'password' => $pass, 'error' => "Oops, didn't work..."];
    echo json_encode($array);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */