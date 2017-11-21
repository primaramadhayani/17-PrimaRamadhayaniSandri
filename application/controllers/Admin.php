<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            $this->load->view('Admin/home');
        }
       
        
    } 
}