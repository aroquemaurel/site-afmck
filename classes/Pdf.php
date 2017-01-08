<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 19/01/15
 * Time: 00:09
 */

class Pdf extends HTML2PDF {
    private $head;
    private $foot;
    public function __construct() {
        parent::__construct('P','A4','fr');
        $this->head = "<page backtop=\"10mm\" backbottom=\"10mm\" backleft=\"10mm\" backright=\"10mm\"
        style=\"font-size: 8pt;text-align: justify;\">";
        //$this->html .=
        $this->foot = "</page>";
    }

    public function WriteHTML($html, $debugVue=false) {
        parent::WriteHTML($this->head.$html.$this->foot, $debugVue);
    }
}