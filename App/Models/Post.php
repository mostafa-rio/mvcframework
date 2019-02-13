<?php
namespace App\Models;
use Core\Model;
use PDO;
/**
 * Post model
 * PHP version 7.2
 */
class Post extends Model
{
    public static function getPosts()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM posts ORDER BY created_at');
        $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    }   
}
