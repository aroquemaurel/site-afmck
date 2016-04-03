<?php

/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 28/02/16
 * Time: 11:27
 */
class Uploader
{
    private $targetFolder;
    private $arrayExtensions;
    private $max_size;

    public function __construct($folderTarget, $arrayExtensions, $max_size) {
        $this->targetFolder = $folderTarget."/";
        $this->arrayExtensions = $arrayExtensions;
        $this->max_size = $max_size;
    }

    public function upload($fileName, $tmpName, $fileSize, $filename='') {
        if($fileName == '') {
            $uploadFilename = uniqid() . "_" . basename($fileName);
        } else {
            $uploadFilename = $filename;
        }

        $target_path =  $this->targetFolder.$uploadFilename;
        $ext = explode('.', basename($fileName));   // Explode file name from dot
        $file_extension = end($ext); // Store extensions in the variable.

        $_SESSION['lastMessage'] = "";
        if(file_exists($target_path)) {
            $_SESSION['lastMessage'] .= Popup::errorMessage("Un problème a eu lieu dans l'upload du document ".$fileName);
        }
        if ($fileSize > $this->max_size) {
            $_SESSION['lastMessage'] .= Popup::errorMessage("Votre document ".$fileName." est trop gros. Vous pouvez essayer de réduire sa taille, ou de contacter l'administrateur à maintenance@afmck.fr");
        }

        if(!preg_grep("/".$file_extension."/i", $this->arrayExtensions)) {
            $_SESSION['lastMessage'] .= Popup::errorMessage("Votre document  ".$fileName." est composé d'une extension invalide. Veuillez contacter l'administrateur à maintenance@afmck.fr");
        }


        if($_SESSION['lastMessage'] == "" && move_uploaded_file($tmpName, $target_path)) {
            return $uploadFilename;
        } else {
            return null;
        }
    }

}