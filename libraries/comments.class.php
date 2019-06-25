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

    public function getCommentsList()
    {
        $query = "  SELECT id, email, name, text, date, parent_id
                    FROM {$this->comments_table}
                    WHERE parent_id IS NULL
                    ORDER BY id DESC";

        $data = mysql::select($query);

        return $data;
    }

    public function getChildComments($parentId)
    {
        $query = "  SELECT id, email, name, text, date, parent_id
                    FROM {$this->comments_table}
                    WHERE parent_id = '{$parentId}'
                    ORDER BY id DESC";

        $data = mysql::select($query);

        return $data;
    }
}