<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 23/03/15
 * Time: 22:34
 */

class DatabaseNews extends Database {

    public function getAllNews($page=1) {
        $ret = array();
        $limitMin = ($page-1) * 2;
        $limitMax = 2;
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
}