<?php
$breadcrumb->display();
$folder = Visitor::getRootPage()."/docs/members/kiosque";
?>
<div class="container-fluid">
    <h1>Généralités sur le MDT</h1>
    <div id="toc" class="toc"></div><!--/.well -->
    <div class="thumbnail with-caption toc" id="toc" style="text-align: left;margin-right: 300px; margin-top: -00px;">
        <img id="mini" alt="" style="text-align: center;margin:auto">
        <p id="description" style="font-size: 10pt"></p>
    </div>
    <h2>Généralités</h2>
    <h3>Articles traduits par l'AFMcK</h3>
    <ul>
        <?php
        Image::miniLink($folder."/traduction", "KHAN_2009_Mecanotherapie",
            "Mécanothérapie : comment la prescription d’exercices des
                    kinésithérapeutes stimulent-t-elles la réparation tissulaire ?<br/>
            <small>K M Khan, A Scott</small>");
        ?>
    </ul>

    <h3>Articles en langue originale</h3>
    <ul>
        <?php
        Image::miniLink($folder."/fr", "Mobilite vertebrale_AFMcK",
            "Mobilité tridimensionnelle in vivo du rachis. Base de la thérapie manuelle.<br /><small>Patrick Le Roux</small>, Kinésithérapie la revue 2010, 107:19-21 ");
        ?>
    </ul>

    <h2>Sacro illiaques</h2>
    <h3>Articles traduits par l'AFMcK</h3>
    <ul>
        <?php
        Image::miniLink($folder."/traduction", "Diagnostic et traitement bases sur les preuves de l'articulation sacro-iliaque douloureuse_AFMcK",
            "Diagnostic et traitement basés sur les preuves de l'articulation sacro-iliaque douloureuse
<small>Mark Laslett</small>, Journal of Manual & Manipulative Therapy 2008 Vol.16 - N°3 ");
        ?>
    </ul>
    <h3>Articles en langue originale</h3>
    <ul>
        <?php
        Image::miniLink($folder."/traduction", "BERTHELOT-LASLETT_AFMcK",
            "Signes cliniques assurant l'origine sacro-iliaque d'une douleur<br/><small>Jean Marie BERTHELOT et Mark LASLETT</small>, Janvier 2009");
        Image::miniLink($folder."/en", "LASLET 2003_AFMcK",
            "Diagnosis painful sacroiliac joints:
                A validity study of a McKenzie evaluation and sacroiliac provocation tests.<br/>
                    <small>M Laslett, S B Young, C N Aprill et B McDonald</small>, Australian Journal ofPhysiotherapy 2003 vol.49");
        ?>
    </ul>
    <h2>Généralités et présentation MDT</h2>
    <h3>Articles traduits par l'AFMcK</h3>
    <ul>
        <?php
        Image::miniLink($folder."/fr", "DOSSIER McKENZIE ANNALES KINE JUIL 05_AFMcK",
            "Dossier « La Méthode McKENZIE ».<br/><small>Michel GEDDA</small>, Annales Kiné Juillet 2005");
        ?>
    </ul>

    <h3>Articles en langue originale</h3>
    <ul>
        <?php
        Image::miniLink($folder."/en", "LASLET 2003_AFMcK",
            "Diagnosis painful sacroiliac joints:
                A validity study of a McKenzie evaluation and sacroiliac provocation tests.<br/>
                    <small>M Laslett, S B Young, C N Aprill et B McDonald</small>, Australian Journal ofPhysiotherapy 2003 vol.49");
        Image::miniLink($folder."/fr", "Classifier patients rachialgiques_AFMcK",
            "Classifier les patients rachialgiques en sous-groupes homogenes:
                    Une nécessité pour rendre les études cliniques pertinentes. <br/><small>Gabor SAGI et Jacky OTERO</small>");

        Image::miniLink($folder."/fr", "Revue de medecine orthopedique mars 2000_AFMcK",
            "La méthode McKENZIE<br/><small>D. CYPEL, R. McKENZIE, G. SAGI et R. DONELSON</small>, Revue de médecine orthopédique N°60 Mars 2000");

        Image::miniLink($folder."/fr", "SAGI 2010 Pref Dir Kine Rev_AFMcK",
            "Recherche d'une préférence directionnelle avec la méthode McKenzie dans l'évaluation de patients rachialgiques.<br/>
                        <small>Gabor SAGI</small>, 2010");

        Image::miniLink($folder."/en", "standing on giant's shoulders_AFMcK",
            "Survey categorizes the seven most influential people in orthopedic PT.<br /><small>Robert J Schrupp</small>, MA,PT, Honoring our Giants, vol.15, issue 14, page61");
        ?>
    </ul>
    <h2>Interviews</h2>
    <ul>
        <?php
        Image::miniLink($folder."/interview", "Interview Diplomes - Fred Steimer_AFMcK",
            "Interview de Frédéric STEIMER, diplômé en juin 2014, qui nous livre ses impressions");
        Image::miniLink($folder."/interview", "Interview Diplomes - Deneuville",
            "Interview de Jean-Philippe DENEUVILLE, diplômé en juin 2014");
        Image::miniLink($folder."/interview", "Interview Diplomes - Ostalier",
            "Interview de Jérôme OSTALIER, diplômé en 2014");
        ?>
    </ul>
</div>




<?php
$script = Image::miniLinkJs();
?>
