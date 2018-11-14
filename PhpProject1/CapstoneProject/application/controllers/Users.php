<?php
 require_once  APPPATH.'libraries/twilio-php-master/twilio-php-master/Twilio/autoload.php';
 use Twilio\Rest\Client;
            
 class Users extends CI_Controller{
     public function register(){
         $data['title']='Sign Up';
         
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_user_name_exists');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phonenumber', 'Phonenumber', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
        
        if ($this->form_validation->run()===FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/register',$data);
            $this->load->view('templates/footer');
            
        }else{//pass  the passwored to model object 
            //input class heler to fecch post items 
            $enc_password=md5($this->input->post('password'));
            $this->User_model->register($enc_password);
            //set message using session library 
            $this->session->set_flashdata('user_registered','You are now Registered and can login');               
//            //test Twilio API 
//            $sid = 'AC3eeed93c3d7c199989563850ac1b8340';
//            $token = 'f325ffe7cba72cbcd7f77b6bd1a60699';
//            $client = new Client($sid, $token);
//            // Use the client to do fun stuff like send text messages!
//            $client->messages->create(
//                    // the number you'd like to send the message to
//                    '+17802635818', array(
//                // A Twilio phone number you purchased at twilio.com/console
//                'from' => '+16476992182',
//                // the body of the text message you'd like to send
//                'body' => $this->input->post('username')."has been registered"
//                    )
//            );
            redirect('Camera/index');
            
        }
    }
     public function login(){
        $data['title']='Sign In';      
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run()===FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/login',$data);
            $this->load->view('templates/footer');
            
        }else{         
            //Get user name 
            $username=$this->input->post('username');
            //Get and encrypt the password 
            $password=md5($this->input->post('password'));
            //call model function 
            //login user 
            $user_id=$this->User_model->login($username,$password);        
            if ($user_id) {
                //creat seesion 
                $user_data=array(
                  'user_id'=>$user_id,
                    'username'=>$username,
                    'logged_in'=>true
                );
                $this->session->set_userdata($user_data);
               $this->session->set_flashdata('user_loggedIn','You are now logged in as'.$this->session->username);   
                //$url="https://www.google.ca";            
                redirect('Camera/Twilio');
               // redirect('posts');
            }else{
                $this->session->set_flashdata('login_failed','Login is invalid');
                redirect('users/login');
            }
                        
            //test Twilio API 
           
            
        }
    }
     
    
    function check_user_name_exists($username){
        $this->form_validation->set_message('check_user_name_exists','that username is taken Please choose a different one');
        if ($this->User_model->check_user_name_exists($username)) {
            return true;
        }else{
            return false;
        }
    }
   
 } 

 
?>
