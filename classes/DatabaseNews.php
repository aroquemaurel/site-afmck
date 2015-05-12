<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 23/03/15
 * Time: 22:34
 */

class DatabaseNews extends Database {

    public function getAllNews($page=1, $nbNewsByPage=2) {
        $ret = array();
        $limitMin = ($page-1) * $nbNewsByPage;
        $limitMax = $nbNewsByPage;
        $query = $this->dbAccess->prepare("SELECT * from `news` order by date desc LIMIT :min,:max ");
        $query->bindParam(":min", $limitMin, PDO::PARAM_INT);
        $query->bindParam(":max", $limitMax, PDO::PARAM_INT);
        $query->execute();

        foreach($query->fetchAll(PDO::FETCH_OBJ) as $dataNews) {
            $news = new News();
            $news->hydrat($dataNews);
            $ret[] = $news;
        }
        return $ret;
    }

    public function getNbNews() {
        $query = $this->dbAccess->prepare("SELECT count(id) as nbnews from `news`");
        $query->execute();

        return $query->fetchObject()->nbnews;
    }

    public function removeById($id) {
        $query = $this->dbAccess->prepare("DELETE FROM news where id=:id");
        $query->bindParam(":id", $id);
        $query->execute();
    }
    public function addNew(News $new)
    {
        $title = utf8_decode($new->getTitle());
        $subtitle = utf8_decode($new->getSubtitle());
        $content = utf8_decode($new->getContent());
        $author = $new->getAuthor()->getId();
        $date = $new->getDate()->format("Y-m-d H:i:s");
        $query = $this->dbAccess->prepare("INSERT INTO news VALUES('', :title, :subtitle, :content, :author, :date)");
        $query->bindParam(":title", $title, PDO::PARAM_STR);
        $query->bindParam(":subtitle", $subtitle, PDO::PARAM_STR);
        $query->bindParam(":content", $content, PDO::PARAM_STR);
        $query->bindParam(":author", $author, PDO::PARAM_INT);
        $query->bindParam(":date", $date, PDO::PARAM_STR);
        $query->execute();
    }

    public function updateNew(News $new) {
        $title = utf8_decode($new->getTitle());
        $subtitle = utf8_decode($new->getSubtitle());
        $content = utf8_decode($new->getContent());
        $author = $new->getAuthor()->getId();
        $id = $new->getId();

        $query = $this->dbAccess->prepare("UPDATE news set title=:title, subtitle=:subtitle, content=:content,
                                          author=:author where id=:id");

        $query->bindParam(":title", $title, PDO::PARAM_STR);
        $query->bindParam(":subtitle", $subtitle, PDO::PARAM_STR);
        $query->bindParam(":content", $content, PDO::PARAM_STR);
        $query->bindParam(":author", $author, PDO::PARAM_INT);
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();


    }

    public function getById($id) {
        $new = new News();
        $query = $this->dbAccess->prepare("SELECT * from `news` where id=:id");
        $query->bindParam(":id", $id);
        $query->execute();
        $new->hydrat($query->fetchObject());
        return $new;
    }
}