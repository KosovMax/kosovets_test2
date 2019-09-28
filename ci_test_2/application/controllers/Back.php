<?php

class Back extends MY_Controller
{
    protected $response_data;

    public function __construct()
    {
        parent::__construct();

        $this->CI =& get_instance();
        $this->load->model('news_model');
        $this->load->model('comments_model');
        $this->load->model('like_news_model');
        $this->load->model('like_comments_model');

        if (ENVIRONMENT === 'production')
        {
            die('Access denied!');
        }
    }

    public function index()
    {
        $name = $this->input->post('name');
        $param = $this->input->post('param');
        // echo $name;
        // die();

        if($name == 'UPDATE_LIKE_NEWS'){
            /*
                Поставить лайк и отменить(unlike)
                AJAX запрос:
                {
                    name:'UPDATE_LIKE_NEWS',
                    param:{
                        NEWS_ID: 1, - number news
                        LIKE:0  0-unlike 1-like,
                        USER:12345 - user session
                    }
                }
            */ 

            return $this->response_success([
                'like' => Like_news_model::updateLikes(['user'=>$param['USER'], 'news_id'=>$param['NEWS_ID'], 'thumb'=>$param['LIKE']]),

                'like_count' => Like_news_model::get_count_like_id($param['NEWS_ID']),
                'like_status' => Like_news_model::get_like_status($param['NEWS_ID'], $param['USER']),

            ]);

        }elseif ($name == 'CREATE_COMMENT') {
            /*
                Написать комментарий
                AJAX запрос:
                {
                    name:'CREATE_COMMENT',
                    param:{
                        NEWS_ID: 1, - number news
                        NAME:' write name',
                        TEXT:' write comment ',
                        USER:12345 - user session
                    }
                }
            */ 

                return $this->response_success(
                    ['comment' => Comments_model::create([
                                'news_id'=>$param['NEWS_ID'], 
                                'name'=>$param['NAME'],
                                'text'=>$param['TEXT']
                            ]),
                    'list_comments' => Comments_model::get_list_comments_id($param['NEWS_ID'], $param['USER'])
                ]);
            
        }elseif ($name == 'DELETE_COMMENT') {
            /*
                Удалить комментарий
                AJAX запрос:
                {
                    name:'DELETE_COMMENT',
                    param:{
                        NEWS_ID: 1, - number news
                        COMMENT_ID: 0, - number comment
                        USER:12345 - user session
                    }
                }
            */ 

            return $this->response_success(
                ['comment' => Comments_model::delete($param['COMMENT_ID']),
                'list_comments' => Comments_model::get_list_comments_id($param['NEWS_ID'], $param['USER'])
            ]);
            
        }elseif ($name == 'UPDATE_LIKE_COMMENT') {
            /*
                Лайкнуть комментарий и отменить
                AJAX запрос:
                {
                    name:'UPDATE_LIKE_COMMENT',
                    param:{
                        COMMENT_ID: 0, - number comment
                        LIKE:0  0-unlike 1-like
                        NEWS_ID: 1, - number news
                        USER:12345 - user session
                    }
                }
            */

            return $this->response_success([
                'like_comment' => Like_comments_model::updateLikes(['user'=>$param['USER'], 'comment_id'=>$param['COMMENT_ID'], 'thumb'=>$param['LIKE']]),
                'list_comments' => Comments_model::get_list_comments_id($param['NEWS_ID'], $param['USER'])
            ]); 
            
        }elseif ($name == 'GET_NEWS_LIST') {
            /*
                Список новини
                AJAX запрос:
                {
                    name:'GET_NEWS_LIST',
                    param:{
                        
                    }
                }
            */ 

            return $this->response_success(['news' => News_model::get_all('short_info')]);
            
        }elseif ($name == 'GET_NEWS_ONE') {
            /*
                Взять стронція новини 
                AJAX запрос:
                {
                    name:'GET_NEWS_ONE',
                    param:{
                        NEWS_ID: 0, - number news
                        USER:12345 - user session
                    }
                }
            */ 
            
            

            if(isset($param['NEWS_ID'])){

                return $this->response_success([
                    'news' => News_model::get_one('short_info', $param['NEWS_ID'], $param['USER']),
                    'like_count' => Like_news_model::get_count_like_id($param['NEWS_ID']),
                    'like_status' => Like_news_model::get_like_status($param['NEWS_ID'], $param['USER']),
                    'list_comments' => Comments_model::get_list_comments_id($param['NEWS_ID'], $param['USER']),
                    'top_news' => News_model::get_top_news()
                ]);
            }else {
               die('');
            }

        }


        // elseif ($name == 'UPDATE_LIKE_COMMENT') {
            
        //         Лайкнуть комментарий и отменить
        //         {
        //             name:'UPDATE_LIKE_COMMENT',
        //             param:{
        //                 COMMENT_ID: 0, - number comment
        //                 LIKE:0  0-unlike 1-like
        //             }
        //         }
             
            
        // }

    }

    
}