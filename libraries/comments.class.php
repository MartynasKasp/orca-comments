<?php

class Comment
{
    private $comments_table = '';

    public function __construct()
    {
        $this->comments_table = 'comments';
    }

    public function getCommentsCount()
    {
        $query = "  SELECT COUNT(id) AS count 
                    FROM {$this->comments_table}";
        $data = mysql::select($query);

        return $data[0]['count'];
    }
}