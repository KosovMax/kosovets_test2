<?php

class Comments_model extends MY_Model
{
    const COMMENTS_TABLE = 'comments';

    function __construct($id = FALSE)
    {
        parent::__construct();
        $this->class_table = self::COMMENTS_TABLE;
        $this->set_id($id);
    }

    /**
     * @return get_list_comments_id
     */
    public static function get_list_comments_id($id = 0, $user = ''){

        $CI =& get_instance();
        $_list = $CI->s->from(self::COMMENTS_TABLE)->select(array('id', 'name', 'news_id', 'text'))->where('news_id', $id)->many();

        $comment_list = [];
        foreach ($_list as $k => $_item) {
            $comment_list[$k] = $_item;
            $comment_list[$k]['like_count'] = Like_comments_model::get_like_comment_count($_item['id']);
            $comment_list[$k]['like_status'] = Like_comments_model::get_like_comment_status($_item['id'], $user);
        }


        return $comment_list;
    }

    /**
     * @return delete
     */
    public static function delete($id = 0){

        $CI =& get_instance();
        $res = $CI->s->from(self::COMMENTS_TABLE)->where('id', $id)->delete()->execute();

        if(!$res){
            return FALSE;
        }
        return TRUE;
    }

    public static function create($data){

        $CI =& get_instance();
	    $res = $CI->s->from(self::COMMENTS_TABLE)->insert($data)->execute();
	    if(!$res){
	        return FALSE;
        }
	    return TRUE;
    }


    

}
