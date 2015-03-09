<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        $this->load->library('template');
        $this->template->set_title('Home');
        $this->template->set_summary('Home of the homestay');
        $this->template->set_description('Description');
        
        $this->template->load_view('home');
    }

}
