<?php
// databases  dep_inject, dep_posts

class Connection
{
    public static function make()
    {
        return new PDO("mysql:host=mysql-db;dbname=ale", username: 'root', password: 'secret');
    }
}

class QueryBuilder
{
    private $db;

    //typehint
    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function select($table)
    {
        $statement = $this->db->query("SELECT * FROM $table");
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

$db = new QueryBuilder(Connection::make()); //внедрение зависимости Connection::make()

$users = $db->select('dep_inject');
$posts = $db->select('dep_posts');

echo '<pre>';
var_dump($users, $posts);
echo '</pre>';

echo '<br><a href="javascript:history.back()" class="back-button">Назад</a>';