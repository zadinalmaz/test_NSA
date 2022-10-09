<?php


class UserHandler extends Database
{
//можно рандомом было заполнить, но готовую с базой не нашел
    public function addUser()
    {
        return mysqli_query(mysqli_connect("mysql", 'root', getenv('MYSQL_ROOT_PASSWORD')), "INSERT INTO db_name.user
                        (name, lastname)
                        VALUES ('nametest','lastnametest')");
    }
// с CreateDatabase пример с executeSql, необходимо было через него делать?
    public function addArticle()
    {
        return mysqli_query(mysqli_connect("mysql", 'root', getenv('MYSQL_ROOT_PASSWORD')), "INSERT INTO db_name.article
                            (userId, label, text)
                            VALUES (2, 'labeltest','texttest')");
    }

    public function getUsers()
    {
        $result = mysqli_query(mysqli_connect("mysql", 'root', getenv('MYSQL_ROOT_PASSWORD')), "SELECT * FROM db_name.user");
        $newarray = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $newarray[] = $row;
        }
        return "users:" . json_encode($newarray);
    }

    public function getUserArticles($userId)
    {
        $result = mysqli_query(mysqli_connect("mysql", 'root', getenv('MYSQL_ROOT_PASSWORD'), 'db_name'), "SELECT article.id,label,text FROM article
        INNER JOIN user ON (article.userId = user.id) WHERE user.id = {$userId}");
        $newarray = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $newarray[] = $row;
        }
        return "articles:" . json_encode($newarray);
    }
}
