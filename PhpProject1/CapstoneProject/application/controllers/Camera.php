<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once APPPATH.'libraries/twilio-php-master/twilio-php-master/Twilio/autoload.php';
use Twilio\Rest\Client;
class Camera extends CI_Controller{
    public function index(){
        //APP Path is CI constant pointing to applicaiton folder 
        $data['title']=  'Redirecting to your camera site....';
        $this->load->view('templates/header');
        $this->load->view('posts/index',$data);
        $this->load->view('templates/footer'); 
    }
    public function Twilio(){
                    //test Twilio API 
             
            $sid = 'AC3eeed93c3d7c199989563850ac1b8340';
            $token = 'f325ffe7cba72cbcd7f77b6bd1a60699';
            $client = new Client($sid, $token);
            // Use the client to do fun stuff like send text messages!
            $client->messages->create(
                    // the number you'd like to send the message to
                    '+17802635818', array(
                // A Twilio phone number you purchased at twilio.com/console
                'from' => '+16476992182',
                // the body of the text message you'd like to send
                'body' => $this->input->post('username')."has been registered"
                    )
            );
        redirect('Camera/index');
            
    }
}