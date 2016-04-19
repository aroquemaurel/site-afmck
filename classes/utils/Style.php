<?php
namespace utils;
use Visitor;

class Style {
    public static function getSmileys()
    {
        $smileys = array(
        ':)' => self::imgOfSmiley('smile', ':-)'),
        ':-)' => self::imgOfSmiley('smile', ':-)'),

        ':D' => self::imgOfSmiley('heureux', ':D'),
        ':-D' => self::imgOfSmiley('heureux', ':D'),

        ';-)' => self::imgOfSmiley('clin', ';-)'),
        ';)' => self::imgOfSmiley('clin', ';-)'),

        ':(' => self::imgOfSmiley('triste', ':)'),
        ':-(' => self::imgOfSmiley('triste', ':)'),

        'Oo' => self::imgOfSmiley('blink', 'oO', 'gif'),
        'oO' => self::imgOfSmiley('blink', 'oO', 'gif'),
        'o_O' => self::imgOfSmiley('blink', 'oO', 'gif'),
        'o.O' => self::imgOfSmiley('blink', 'oO', 'gif'),
        'O_o' => self::imgOfSmiley('blink', 'oO', 'gif'),
        'O.o' => self::imgOfSmiley('blink', 'oO', 'gif'),

        '^^' => self::imgOfSmiley('hihi', '^^'),
        '^.^' => self::imgOfSmiley('hihi', '^^'),
        '^_^' => self::imgOfSmiley('hihi', '^^'),

        ':-°' => self::imgOfSmiley('siffle', ':-°'),
        ':°' => self::imgOfSmiley('siffle', ':-°'),

        ':\'(' => self::imgOfSmiley('pleure', 'pleure'),

        '8)'  => self::imgOfSmiley('soleil', 'soleil'),
        '8-)' => self::imgOfSmiley('soleil', 'soleil'),
        '(h)' => self::imgOfSmiley('soleil', 'soleil'),
        '(H)' => self::imgOfSmiley('soleil', 'soleil'),

        '(A)' => self::imgOfSmiley('ange', 'ange'),
        '(a)' => self::imgOfSmiley('ange', 'ange'),
        'O:)' => self::imgOfSmiley('ange', 'ange'),
        'o:)' => self::imgOfSmiley('ange', 'ange'),
        ':ange:' => self::imgOfSmiley('ange', 'ange'),

        ':@' => self::imgOfSmiley('angry', 'ange', "gif"),

        'lol' => self::imgOfSmiley('rire', 'lol', 'gif'),

        ':p' => self::imgOfSmiley('langue', ':-p'),
        ':-p' => self::imgOfSmiley('langue', ':-p'),

        '&gt;.&lt;' => self::imgOfSmiley('pinch', '>.<'),
        '&gt;&lt;' => self::imgOfSmiley('pinch', '>.<'),
        '&gt;_&lt;' => self::imgOfSmiley('pinch', '>.<'),

        ':-/' => self::imgOfSmiley('unsure', '>.<', 'gif'),
        ':/' => self::imgOfSmiley('unsure', '>.<', 'gif'),
        ':\\' => self::imgOfSmiley('unsure', '>.<', 'gif'),
        ':-\\' => self::imgOfSmiley('unsure', '>.<', 'gif'),
        );

        return $smileys;
    }
    public static function imgOfSmiley($name, $original, $ext='png') {
        return ' <img src="'.Visitor::getRootPage().'/style/img/smileys/'.$name.'.'.$ext.'" alt="'.$name.'"/> ';
    }

    public static function replaceSmileys($pText) {
        $text = $pText;
        foreach(self::getSmileys() as $smiley=>$image) {
            $smiley = preg_quote($smiley, '#');
            $text = preg_replace("#(^|\W)$smiley($|\W)#",$image,$text);
        }


        return $text;
    }
}
