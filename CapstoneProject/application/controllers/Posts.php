<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Posts extends CI_Controller{
    public function index(){
        //APP Path is CI constant pointing to applicaiton folder 
        
        
        $data['title']=  'Latest Posts';
        $this->load->view('templates/header');
         $this->load->view('posts/index',$data);
          $this->load->view('templates/footer');
    }
}