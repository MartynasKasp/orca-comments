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

    public function insertComment($data)
    {
        $query = "  INSERT INTO {$this->comments_table}
                    (
                        email,
                        name,
                        text,
                        date,
                        level
                    ) VALUES (
                        '{$data['email']}',
                        '{$data['name']}',
                        '{$data['text']}',
                        '{$data['date']}',
                        '{$data['level']}'
                    )";

        mysql::query($query);
    }
}