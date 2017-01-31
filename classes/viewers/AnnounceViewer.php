<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 14/01/17
 * Time: 13:01
 */

namespace viewers;


use Visitor;

class AnnounceViewer
{

    public static function getAnnouncesList(array $announces) : string
    {
        $ret = '';
        foreach($announces as $announce) {
            $topic = $announce->getTopic();
            $ret .= '<a href="' . Visitor::getRootPage() . '/members/forums/sujets/voir.php?id=' . $topic->getId() . '">';
            $ret .= '<h3><i class="label label-primary">' . $announce->getType()->getLabel() . '</i>&nbsp; '.$announce->getTitle().' <small>' . $topic->getSubtitle() . '</small></h3>';
            $ret .= '<p style="font-size: 8pt">Par ' . $announce->getUser()->toString() . ' le ' . $topic->getDate()->format('d / m / Y à H:i') . '</p>';
            $ret .= '</a>';
        }

        return $ret;
    }

    public static function getCreateAnnouncementForm($announce=null) {
        $ret = '';
        if($announce != null) {
            $type = $announce->getType()->getId();
        }

        $ret .= '<div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-10">
                    <div class="form-group">
                        <select tabindex="1" class="selectpicker form-control input-lg" required="required"
                        id="announceType" name="announceType">
                            <option disabled selected>Type d\'annonce</option>
                            <option value="1" '.(isset($type) && $type == 1 ? "selected=selected" : "").'>Remplacement</option>
                            <option value="2" '.(isset($type) && $type == 2 ? "selected=selected" : "").'>Praticien</option>
                            <option value="3" '.(isset($type) && $type == 3 ? "selected=selected" : "").'>Assitanat</option>
                            <option value="4" '.(isset($type) && $type == 4 ? "selected=selected" : "").'>Autre</option>
                        </select>
                    </div>
                </div>';

        $ret .= '<div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-10">
                    <div class="form-group">
                        <input required="required" type="text" name="announcetitle" id="announcetitle"
                        class="form-control input-lg" placeholder="Titre de l\'annonce" tabindex="2"
                       value="'.(isset($announce) ? $announce->getTitle() : '').'"
                        >
                    </div>
                </div>';
        $ret .= '<div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-6">
                    <div class="form-group">
                        <input required="required" type="text" name="town" id="town"
                        class="form-control input-lg" placeholder="Ville" tabindex="3"
                        value="'.(isset($announce) ? $announce->getTown() : '').'"
                        >
                    </div>
                </div>';

        $ret .= '<div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="form-group">
                        <input required="required" type="text" name="postalCode" id="postalCode"
                        class="form-control input-lg" placeholder="Code postal" tabindex="4"
                        value="'.(isset($announce) ? $announce->getPostalCode() : '').'"
                        >
                    </div>
                </div>';

        $ret .= '<div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-6">
                    <div class="form-group">
                        <div required="required" class="input-group date input-group-lg" id="date">
                            <input data-date-format="DD/MM/YYYY" tabindex="5" type="text" id="date"
                            name="date" placeholder="Date de début" class="form-control input-lg"
                            value="'.(isset($announce) ? $announce->getDate()->format("d/m/Y") : '').'"
                            />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>';

        $ret .= '<div class="col-xs-12 col-sm-6 col-md-4" style="padding-top: 12px">
                    <div class="form-group">
                        <label><input tabindex="6" type="checkbox"'.
                        /*if($user->getHasSigned() && $editing) echo "checked=checked"; */'
                          name="signed" id="signed"> &nbsp;Dès que possible</label>
                    </div>
                </div>';

        $ret .= '<div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-6">
                    <div class="form-group">
                        <input required="required" type="text" name="duration" id="duration"
                        class="form-control input-lg" placeholder="Durée" tabindex="7"
                        value="'.(isset($announce) ? $announce->getDuration() : '').'"
                        >
                    </div>
                </div>';

        $ret .= '<div class="col-xs-12 col-sm-6 col-md-4" style="padding-top: 12px">
                    <div class="form-group">
                        <label><input tabindex="8" type="checkbox"'.
                        /*if($user->getHasSigned() && $editing) echo "checked=checked"; */'
                        name="indeterminatedDuration" id="indeterminatedDuration"> &nbsp;Durée
                        indeterminée</label>
                    </div>
                </div>';

        $ret .= '<div class="row" style="width: 80%; margin: auto;margin-bottom: 20px;"></div>';

        return $ret;
    }
}