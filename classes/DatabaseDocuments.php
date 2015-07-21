<?php
use models\Document;

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
                                          from document, user, tag, file, document_file, document_tag
                                        where idUser = user.id
                                        and document_file.idFile = file.id
                                        and document_file.idDocument = document.id
                                        and document_tag.idTag = tag.id
                                        and document_tag.idDocument = document.id
                                           order by date desc");
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
}