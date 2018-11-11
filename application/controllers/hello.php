<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hello extends CI_Controller {

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
	
	public function __construct(){
		parent::__construct();
		$this->load->library('email');
		
	}
	
	public function send(){
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
    $this->form_validation->set_rules('yourName', 'Your Name', 'trim|required|xss_clean');
    $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
    if($this->form_validation->run() == FALSE){
      $this->index();
    }else{
        $name = $this->input->post('yourName');
        $email = $this->input->post('email');
        $message = $this->input->post('message');
        $admin_email = array('macky@anarchy.in.the.ph', 'lpagiwayan@gmail.com');

        $this->email->from($email);
        $this->email->to($admin_email);
        $this->email->subject('Contact Us | MagentoCebu Inc');
        $this->email->message("
                       <!DOCTYPE html>
                            <html>
                            <head>
                            <title>MagentoCebu Inc</title>
                            </head>
                            <body>
                            <div style='width:500px; >
                              
                              <div style='margin-left:40px; margin-top:80px;'>
                                <div style='margin-top:60px;'>
                                <p style='font-size:13px; font-weight:bold'>
                                  <br>
                                  Name: $name
																	<br>
																	<br>
																	Email: $email
																	<br>
																	<br>
																	Message: $message
                                </p>
                                <br />
                                <p style='font-size:13px; font-weight:bold'>
                                  MagentoCebu Inc Team
                                </p>
                              </div>
                              </div>
                            </div>
                            </body>
                            </html>
                        ");
          $this->email->send();
          $this->session->set_flashdata('succ_send', 1);
          redirect('hello'); 	
    }
		
	}
	 
	public function index(){
		$this->load->view('hello_view');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
