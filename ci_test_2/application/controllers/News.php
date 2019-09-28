<?php

class News extends MY_Controller
{
    protected $response_data;

    public function __construct()
    {
        parent::__construct();

        $this->CI =& get_instance();
        $this->load->model('news_model');

        if (ENVIRONMENT === 'production')
        {
            die('Access denied!');
        }
    }

    public function index(string $news_id)
    {
       return $this->load->view('layouts/news', ['news_id'=>$news_id]);
    }


    
}