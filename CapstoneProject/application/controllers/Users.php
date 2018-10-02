<?php
 class Users extends CI_Controller{
     public function register(){
         $data['title']='Sign Up';
         
         $this->form_validation->set_rules('name','Name','required');
         $this->form_validation->set_rules('username', 'Username', 'required|callback_check_user_name_exists');
        $this->form_validation->set_rules('email', 'Email', 'required');
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
            redirect('posts');
            
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
