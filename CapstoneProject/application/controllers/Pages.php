<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Pages extends CI_Controller{
    public function view($page='home'){
        //APP Path is CI constant pointing to applicaiton folder 
        if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
            show_404();           
        }
        
        $data['title']=  ucfirst($page);
        $this->load->view('templates/header');
         $this->load->view('pages/'.$page,$data);
          $this->load->view('templates/footer');
    }
}
