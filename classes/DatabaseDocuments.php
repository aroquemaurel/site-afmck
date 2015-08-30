<?php
use models\Category;
use models\Document;
use models\File;

/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 21/07/15
 * Time: 22:34
 */

class DatabaseDocuments extends Database {

    public function getAllDocuments()
    {
        $ret = array();

        $query = $this->dbAccess->prepare("SELECT *
                                          from document, user, tag, file, document_file, document_tag, category
                                        where idUser = user.id
										and document.category = category.id
                                        and document_file.idFile = file.id
                                        and document_file.idDocument = document.id
                                        and document_tag.idTag = tag.id
                                        and document_tag.idDocument = document.id
                                           order by category.name asc, date desc");
        $query->execute();
        $lastDoc = 0;
        foreach($query->fetchAll(PDO::FETCH_OBJ) as $dataDoc) {
            if($lastDoc != $dataDoc->idDocument) {
                $doc = new Document();
                $doc->hydrat($dataDoc);
                $ret[] = $doc;
            }
            $ret[count($ret)-1]->addTag($dataDoc->tag);
            $ret[count($ret)-1]->addFile($dataDoc->titleFile, $dataDoc->path);
            $lastDoc = $dataDoc->idDocument;


        }
        return $ret;
    }

    public function addDocument(Document $d) {
        $title = $d->getTitle();
        $desc = $d->getDescription();
        $tags = $d->getTags();
        $file = $d->getFiles()[0];
        $idUser = $d->getUser()->getId();
        $date = $d->getDate()->format("Y-m-d");
        $idCategory = $d->getCategory()->getId();

        $query = $this->dbAccess->prepare("INSERT INTO document VALUES
          ('', :title, :desc, :date, :idUser, :category)");
        $query->bindParam(":title", $title, PDO::PARAM_STR);
        $query->bindParam(":desc", $desc, PDO::PARAM_STR);
        $query->bindParam(":date", $date, PDO::PARAM_STR);
        $query->bindParam(":idUser", $idUser, PDO::PARAM_STR);
        $query->bindParam(":category", $idCategory, PDO::PARAM_STR);

        $query->execute();
        $idDoc = $this->dbAccess->lastInsertId();
        foreach($tags as $tag) {
            // add all tags
            $this->addTag($tag->getTag(), $idDoc);
        }

        $this->addFile($file, $idDoc);
    }

    public function addFile(File $file, $idDoc) {
        $path = $file->getPath();
        $title = $file->getTitle();

        $query = $this->dbAccess->prepare("INSERT INTO file VALUES
          ('', :title, :path)");
        $query->bindParam(":title", $title, PDO::PARAM_STR);
        $query->bindParam(":path", $path, PDO::PARAM_STR);
        $query->execute();
        $idFIle =$this->dbAccess->lastInsertId();
        $query = $this->dbAccess->prepare("INSERT INTO document_file VALUES (:idDocument, :idFile)");
        $query->bindParam(":idDocument", $idDoc, PDO::PARAM_INT);
        $query->bindParam(":idFile", $idFIle, PDO::PARAM_INT);
        $query->execute();
    }

    public function addTag($tag, $idDocument)
    {
        $idTag = $this->getIdTag($tag);
        $query = $this->dbAccess->prepare("INSERT INTO document_tag VALUES
          (:idTag, :idDocument)");
        $query->bindParam(":idTag", $idTag, PDO::PARAM_INT);
        $query->bindParam(":idDocument", $idDocument, PDO::PARAM_INT);
        $query->execute();
    }

    public function getIdTag($tag) {
        $query = $this->dbAccess->prepare("SELECT id, tag
                                          from tag where tag=:tag");
        $query->bindParam(":tag", $tag, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() == 0) {
            $query = $this->dbAccess->prepare("INSERT INTO tag(tag) VALUES(:tag)");
            $query->bindParam(":tag", $tag, PDO::PARAM_STR);
            $query->execute();
            $ret = $this->dbAccess->lastInsertId();
        } else {
            $ret = $query->fetchObject()->id;
        }

        return $ret;
    }
    public function addCategory($name) {
        $query = $this->dbAccess->prepare("INSERT INTO category(name) VALUES(:name)");
        $query->bindParam(":name", $name, PDO::PARAM_STR);
        $query->execute();

        return $this->dbAccess->lastInsertId();
    }
    public function getCategoryName($id) {
        $query = $this->dbAccess->prepare("SELECT id, name
                                          from category where id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_STR);
        $query->execute();

        return $query->fetchObject()->name;

    }

    public function removeDocument($id)
    {
        $query = $this->dbAccess->prepare("DELETE FROM document_tag
                                          where idDocument=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();

        $query = $this->dbAccess->prepare("DELETE FROM document_file
                                          where idDocument=:id");

        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();
        $query = $this->dbAccess->prepare("DELETE FROM document
                                          where id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();
    }

    public function getAllCategoriesName() {
        $query = $this->dbAccess->prepare("SELECT id, name
                                          from category
                                           order by name");
        $query->execute();
        $ret = array();
        foreach($query->fetchAll(PDO::FETCH_OBJ) as $dataCat) {
            $ret[] = new Category($dataCat->id, $dataCat->name);
        }
        return $ret;
    }
}
