<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 23/03/15
 * Time: 22:34
 */

class DatabaseNews extends Database {

    public function getAllNews() {
        $ret = array();
        $query = $this->dbAccess->prepare("SELECT * from `news` order by date desc");
        $query->execute();

        foreach($query->fetchAll(PDO::FETCH_OBJ) as $dataNews) {
            $news = new News();
            $news->hydrat($dataNews);
            $ret[] = $news;
        }
        return $ret;
    }
}