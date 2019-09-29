<?php

class Comments_model extends MY_Model
{
    const COMMENTS_TABLE = 'comments';
    // const LIKE_COMMENTS_TABLE = 'like_comments';

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
        $_list = $CI->s->sql("SELECT c.id, c.name, c.text, c.news_id, count(lc.comment_id) 'like_count', 
            (SELECT count(*) 'like_status' FROM like_comments WHERE comment_id=lc.comment_id AND user='".$user."') 'like_status' 
            FROM `comments` AS c LEFT JOIN like_comments AS lc ON c.id = lc.comment_id WHERE `news_id`=".$id." GROUP BY c.id ORDER BY c.id ASC")->many();


        return $_list;
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
