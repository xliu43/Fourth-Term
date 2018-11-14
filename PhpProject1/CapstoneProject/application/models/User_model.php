<?php
 class User_model extends CI_Model{
     public function register($enc_password){
         $data=array(
             'name'=>$this->input->post('name'),
             'email'=>$this->input->post('email'),
             'username'=>$this->input->post('username'),
             'password'=> $enc_password,
             'zipcode'=>$this->input->post('zipcode'),  
             'phonenumber'=>$this->input->post('phonenumber')
         );
         
         //insert user 
         return $this->db->insert('users',$data);
     }
     
     //check username exists 
     public function check_user_name_exists($username){
         $query=$this->db->get_where('users',array('username'=>$username));
         if (empty($query->row_array())) {
             return true;
         }else{
             return false;
         }
     }
     public function login($username, $password){
         $this->db->where('username',$username);
         $this->db->where('password',$password);
         $result=$this->db->get('users');
         log_message('INFO', 'inside user model login');
         if ($result->num_rows()==1) {
             return $result->row(0)->id;
         }else{
             return false;
         }
             
     }
 }

