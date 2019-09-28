<?php

class Main extends MY_Controller
{
    protected $response_data;

    public function __construct()
    {
        parent::__construct();

        // $this->CI =& get_instance();
        // $this->load->model('news_model');

        if (ENVIRONMENT === 'production')
        {
            die('Access denied!');
        }
    }

    public function index()
    {
       return $this->load->view('layouts/main');
    }

    public function news(int $news_id)
    {
       echo "About Test";
    }

    
}