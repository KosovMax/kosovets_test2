<?php

class Like_comments_model extends MY_Model
{
    const LIKE_COMMENTS_TABLE = 'like_comments';

    function __construct($id = FALSE)
    {
        parent::__construct();
        $this->class_table = self::LIKE_COMMENTS_TABLE;
        $this->set_id($id);
    }

    /**
     * @return get_like_comment_count
     */
    public static function get_like_comment_count($id = 0){
        $CI =& get_instance();
        return $CI->s->from(self::LIKE_COMMENTS_TABLE)->where('comment_id', $id)->select(array("count(*) 'count'"))->one()['count'];
    }

    /**
     * @return get_like_comment_status
     */
    public static function get_like_comment_status($id = 0, $user = ''){
        $CI =& get_instance();
        return $CI->s->from(self::LIKE_COMMENTS_TABLE)->where(array('comment_id'=>$id, 'user'=>$user))->select(array("count(*) 'count'"))->one()['count'];
    }

    /**
     * @return updateLikes
     */
    public static function updateLikes($data){
        $CI =& get_instance();
        if($data['thumb'] == '0'){
            $CI->s->from(self::LIKE_COMMENTS_TABLE)->where(array('comment_id'=>$data['comment_id'], 'user'=>$data['user']))->delete()->execute();
        }else{
            $res = $CI->s->from(self::LIKE_COMMENTS_TABLE)->insert($data)->execute();
        }

        if(!$res){
            return FALSE;
        }
        return TRUE;
    }

    /**
     * @return delete
     */
    public static function delete($id = 0){

        $CI =& get_instance();
        $res = $CI->s->from(self::LIKE_COMMENTS_TABLE)->where('comment_id', $id)->delete()->execute();

        if(!$res){
            return FALSE;
        }
        return TRUE;
    }


}