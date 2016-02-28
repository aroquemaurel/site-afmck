<?php
use models\File;

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
            $news = $this->getAttachmentsOfNews($dataNews->id, $news);
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
        return $this->dbAccess->lastInsertId();
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

    public function addNewsToSend($idUser, $idNews, DateTime $date) {
        $datestr = $date->format("Y-m-d H:i:s");
        $query = $this->dbAccess->prepare("INSERT INTO user_newsletter VALUES(:idUser, :idNews, 0, :date)");
        $query->bindParam(":idUser", $idUser, PDO::PARAM_INT);
        $query->bindParam(":idNews", $idNews, PDO::PARAM_INT);
        $query->bindParam(":date", $datestr, PDO::PARAM_STR);
        $query->execute();
    }

    public function newsIsSend($idNews) {
        $query = $this->dbAccess->prepare("SELECT count(idNewsletter) as countnews from `user_newsletter` where idNewsletter=:idNews");
        $query->bindParam(":idNews", $idNews, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchObject()->countnews > 0;
    }

    public function getFirstMailsToSend($nbNews)
    {
        $query = $this->dbAccess->prepare("SELECT idNewsletter as id, idUser, title, content, author, news.date as date, subtitle, idUser, user.mail as email, user.firstname as firstname, user.lastname as lastname
                                        from news, user_newsletter, user
                                        where user_newsletter.idNewsletter = news.id
                                          and user_newsletter.idUser = user.id
                                          and user_newsletter.isSend = 0
                                        LIMIT 0,:nbnews");
        $query->bindParam(":nbnews", $nbNews, PDO::PARAM_INT);
        $query->execute();
        $ret = array();
        foreach($query->fetchAll(PDO::FETCH_OBJ) as $data) {
            $news = new News();
            $news->hydrat($data);
            $news = $this->getAttachmentsOfNews($data->id, $news);

            $user = new User();
            $user->setMail($data->email);
            $user->setId($data->idUser);
            $user->setFirstName($data->firstname);
            $user->setLastName($data->lastname);
            $ret[] = new \models\NewsToSend($user, $news);
        }
        return $ret;
    }

    public function updateMailIsSend($idUser, $idNews)
    {
        $query = $this->dbAccess->prepare("UPDATE user_newsletter set isSend=1 where idUser=:idUser and idNewsletter=:idNews");
        $query->bindParam(":idUser", $idUser, PDO::PARAM_INT);
        $query->bindParam(":idNews", $idNews, PDO::PARAM_INT);
        $query->execute();
    }

    public function addFile(File $file, $idNews) {
        $path = $file->getPath();
        $title = $file->getTitle();

        $query = $this->dbAccess->prepare("INSERT INTO file VALUES
          ('', :title, :path)");
        $query->bindParam(":title", $title, PDO::PARAM_STR);
        $query->bindParam(":path", $path, PDO::PARAM_STR);
        $query->execute();
        $idFIle =$this->dbAccess->lastInsertId();
        $query = $this->dbAccess->prepare("INSERT INTO newsletter_file VALUES (:idFile, :idNews)");
        $query->bindParam(":idNews", $idNews, PDO::PARAM_INT);
        $query->bindParam(":idFile", $idFIle, PDO::PARAM_INT);
        $query->execute();
    }

    /**
     * @param $dataNews
     * @param $news
     */
    public function getAttachmentsOfNews($id, $news)
    {
        $query2 = $this->dbAccess->prepare("SELECT titleFile, path from `newsletter_file`, file where idNewsletter=:idNew and newsletter_file.idFile = file.id");
        $query2->bindParam(":idNew", $id, PDO::PARAM_INT);
        $query2->execute();
        foreach ($query2->fetchAll(PDO::FETCH_OBJ) as $dataFile) {
            $news->addAttchment(new File($dataFile->titleFile, $dataFile->path));
        }

        return $news;
    }

}