<?php

class Like_news_model extends MY_Model
{
    const LIKE_NEWS_TABLE = 'like_news';


    function __construct($id = FALSE)
    {
        parent::__construct();
        $this->class_table = self::LIKE_NEWS_TABLE;
        $this->set_id($id);
    }

    
    /**
     * @return updateLikes
     */
    public static function updateLikes($data){
        $CI =& get_instance();
        if($data['thumb'] == '0'){
            $CI->s->from(self::LIKE_NEWS_TABLE)->where(array('news_id'=>$data['news_id'], 'user'=>$data['user']))->delete()->execute();
        }else{
            $res = $CI->s->from(self::LIKE_NEWS_TABLE)->insert($data)->execute();
        }

        if(!$res){
            return FALSE;
        }
        return TRUE;
    }

    /**
     * @return get_count_like_id
     */
    public static function get_count_like_id($id = 0){
        $CI =& get_instance();
        $_count_like = $CI->s->from(self::LIKE_NEWS_TABLE)->where('news_id', $id)->select(array("count(*) 'count'"))->one();

        return $_count_like['count'];
    }

    /**
     * @return get_like_status
     */
    public static function get_like_status($id = 0, $user = ''){
        $CI =& get_instance();
        $_status = $CI->s->from(self::LIKE_NEWS_TABLE)->where(array('news_id'=>$id, 'user'=>$user))->select(array("count(*) 'count'"))->one();
        return $_status['count'];
    }

    

}