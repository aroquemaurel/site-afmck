<?php $breadcrumb->display()?>
<div class="container-fluid" style="padding-right: 300px">
    <h1>Articles scientifiques</h1>
    <div id="toc" class="toc"></div><!--/.well -->
    <div class="thumbnail with-caption toc" id="toc"' style="text-align: left;margin-right: 300px; margin-top: -100px;">
        <img id="mini" alt="" style="text-align: center;margin:auto">
        <p id="description" style="font-size: 10pt"></p>
    </div>
    <div class="docformation">
        <h2>Interviews</h2>
        <ul>
            <?php
            $folder = Visitor::getRootPage()."/docs/members/kiosque";
            Image::miniLink($folder."/interview", "Interview Diplomes - Fred Steimer_AFMcK",
                            "Interview de Frédéric STEIMER, diplômé en juin 2014, qui nous livre ses impressions");
            Image::miniLink($folder."/interview", "Interview Diplomes - Deneuville",
                            "Interview de Jean-Philippe DENEUVILLE, diplômé en juin 2014");
            Image::miniLink($folder."/interview", "Interview Diplomes - Ostalier",
                            "Interview de Jérôme OSTALIER, diplômé en 2014");
            ?>
        </ul>

        <h2>Articles traduits par L'AFMcK</h2>
        <h3>Dernier article traduit</h3>
        <ul>
            <?php
            Image::miniLink($folder."/traduction", "Edmond 2014_Cervicalgies-Association entre centralisation et preference directionnelle_AFMcK",
            "Association entre centralisation et préférence directionnelle,
                résultats fonctionnels et algiques chez des patients cervicalgiques,
            <small>Susan L. Edmond</small><br/>
                <small>Journal of Orthopaedic & Sports Physical Therapy
                Fevrier 2014, VOL. 44 N°2<small>");
            ?>
        </ul>

        <h3>Dossier spécial sciatiques</h3>
        <ul>
            <?php
                Image::miniLink($folder."/traduction", "Efficacite du traitement consevateur_AFMcK",
                    "Efficacité du traitement conservateur actif systématique chez des patients atteints de sciatiques
                    sévères.<br />SPINE Vol.37 N°7,  <small>Lippincot William & Wilkins</small></i>");
?>
        </ul>
        <h4>Sciatique : exercies pour éviter la chirurgie</h4>

<div style="text-align: center">
        <?php
                    Image::thumbnailsPdf($folder.'/traduction', "Sciatique_Exercices Pour Eviter La chirurgie-1_AFMcK");
Image::thumbnailsPdf($folder.'/traduction', "Sciatique_Exercices Pour Eviter La chirurgie-2_AFMcK");
Image::thumbnailsPdf($folder.'/traduction', "Sciatique_Exercices Pour Eviter La chirurgie-3_AFMcK");
echo '<br/>';
Image::thumbnailsPdf($folder.'/traduction', "Sciatique_Exercices Pour Eviter La chirurgie-4_AFMcK");
Image::thumbnailsPdf($folder.'/traduction', "Sciatique_Exercices Pour Eviter La chirurgie-5_AFMcK");

?>
</div>
</small>
        <h3>Autres articles</h3>
        <ul>
            <?php
            Image::miniLink($folder."/traduction", "Edmond 2014_Cervicalgies-Association entre centralisation et preference directionnelle_AFMcK",
                "Association entre centralisation et préférence directionnelle, résultats fonctionnels et algiques chez des patients cervicalgiques.<small>Susan L. Edmond</small><br/>Journal of Orthopaedic & Sports Physical Therapy<br />Vol.44 N°2 Fev 2014 ");
            Image::miniLink($folder."/traduction", "Algorithme decisionnel des derangements d'epaule_AFMcK",
                "Algorithme décisionnel pour les dérangements d'épaule.<small>Jean-Philippe Deneuville</small><br/>
                    Basé sur les travaux de Scott Herbowy (Diplomé MDT)<br />nov 2013 ");

            Image::miniLink($folder."/traduction", "Diagnostic et traitement bases sur les preuves de l'articulation sacro-iliaque douloureuse_AFMcK",
                "Diagnostic et traitement basés sur les preuves de l'articulation sacro-iliaque douloureuse
<small>Mark Laslett</small><br />Journal of Manual & Manipulative Therapy<br />2008 Vol.16 - N°3 ");
            Image::miniLink($folder."/traduction", "etude de cas pages 43 et 44_AFMcK",
                "Etude de cas: différenciation entre dérangement postérieur et antérieur.<small>J. Anspach-Rickey, traduction F. Steimer</small><br />IJMDT 2010 vol 2 page 41-45 ");
            Image::miniLink($folder."/traduction", "Aytona et Dudley-Resolution rapide douleurs epaule classifiees comme derangement_AFMcK",
                "Résolution rapide de douleurs d’épaule classifiées comme dérangement, à l’aide de la méthode McKenzie.<small>Maria Corazon Aytona, traduction F. Steimer</small><br />Journal of Manual & Manipulative Therapy<br />2013 VOL. 21 NO. 4 </i>");
            Image::miniLink($folder."/traduction", "DONELSON 2011-MDT pour radiculopathie_AFMcK",
                " Diagnostic et Thérapie Mécanique pour les Radiculopathies<small>Ronald Donelson, traduction F. Steimer</small><br />Mechanical Diagnosis and Therapy for Radiculopathy ");
            Image::miniLink($folder."/traduction", "Revue systematique sur la centralisation et la preference directionnelle_AFMcK",
                "Centralisation et préférence directionnelle: Une revue systématique.<small>Stephen May, Alessandro Aina, traduction F. Steimer</small><br />Manual Therapy 2012 ");
            Image::miniLink($folder."/traduction", "Enquete relative au système McKenzie de classification des atteintes au niveau des extremites_AFMcK",
                "Enquête relative au système McKenzie de classification des atteintes au niveau des extrémités.<small>S. J. May, R. Rosedale, traduction F. Steimer</small><br />Rapport de recherche. Phys Ther. 2012 ");
            Image::miniLink($folder."/traduction", "traduction page 10_AFMcK",
                "Peut on identifier le caractère inflammatoire d'une douleur lombaire en utilisant des éléments cliniques propres au modèle de la spondylarthrite ankylosante ?
<small>S. May, traduction F. Steimer</small><br />IJMDT 2010 vol 2 page 10-14 ");
            Image::miniLink($folder."/traduction", "etude de cas pages 43 et 44_AFMcK",
                "Etude de cas: différenciation entre dérangement postérieur et antérieur.<small>J. Anspach-Rickey, traduction F. Steimer</small><br/>IJMDT 2010 vol 2 page 41-45 ");
            ?>
        </ul>

        <h2>Articles parus en Français</h2>
        <ul>
        <?php
            Image::miniLink($folder."/fr", "OTERO 2014 - Lombalgie prévalence des syndromes McKenzie - Kine la revue n 145",
                "Lombalgie prévalence des syndromes McKenzie<br/>Jacky OTERO</br>Kiné la revue n°45, 2014");
            Image::miniLink($folder."/fr", "modic et IRM",
                "La discopathie de type Modic 1<br/>J. Beaudreuil, P. Orcel</br>2009");
            Image::miniLink($folder."/fr", "stade modic",
                "Analyse IRM selon Modic : intérêt dans les lombalgies<br/>B. Bordet, J. Borne, O. Fantino, J.C. Bousquet, S. Coilard<br/>");
            Image::miniLink($folder."/fr", "EMC fev 2011 _AFMcK",
                "Etude de cas: différenciation entre dérangement postérieur et antérieur.<br />J. Anspach-Rickey<br />IJMDT 2010 vol 2 page 41-45 ");
            Image::miniLink($folder."/fr", "IJMDT vol 5 mars 2010 page 33_AFMcK",
                "Pertinence d'une hypersensibilité du sinus carotidien dans la prise en charge MDT.<br />G. SAGI<br />International Journal of MDT vol.5, mars 2010 ");
            Image::miniLink($folder."/fr", "ANAES Lombosciatique fev 2000_AFMcK",
                "Prise en charge diagnostique et thérapeutique des lombalgies et lombosciatiques communes de moins de trois mois d'évolution.<br />Recommandations ANAES<br />Février 2000 ");
            Image::miniLink($folder."/fr", "Contribution de la methode McKenzie à l'evaluation et au traitement des patients lombalgique_AFMcK",
                "Contribution de la méthode McKenzie à l'évaluation et au traitement des patients lombalgique.<br />G. SAGI, J. OTERO<br />Kinésitherapie Scientifique 2012 ");
            Image::miniLink($folder."/fr", "Mobilite vertebrale_AFMcK",
                "Mobilité tridimensionnelle in vivo du rachis. Base de la thérapie manuelle.<br />Patrick Le Roux<br />Kinésithérapie la revue 2010, 107:19-21 ");
            Image::miniLink($folder."/fr", "canal lombaire etroit_AFMcK",
                "L'imagerie des sténoses lombaires.<br />G. MORVAN<br />J Radiol 2002, 83:1165-1175 ");
?>
</ul>

            <h2>Articles parus en Anglais</h2>
            <ul>
            <?php
            Image::miniLink($folder."/en", "Recovery of motor deficit 2014_AFMcK",
                "Recovery of Motor Deficit Accompanying Sciatica
            <small>G.M Overdevest, C. Vlegeert-Lankamp, C.H. Jacobs</small><br/>The Spine Journal");


Image::miniLink($folder."/en", "TissueOriginLowBackPain-Kuslich_AFMcK",
    "The Tissue Origin of Low Back Pain and Sciatica<small>S.D. Kulish, C.L.Ulstrom, C.J. Michael</small>");
Image::miniLink($folder."/en", "magnetic-resonance scans cervical spine_AFMcK",
    "Abnormal magnetic-resonance scans of the cervical spine in asymptomatic subjects.
<small>1990 SD BODEN</small><br />
The Journal of Bone and Joint Surgery ");
Image::miniLink($folder."/en", "AINA-2004_AFMcK",
    "The centralization phenomenon of spinal symptoms-a systematic revue.
<small>A AINA, S MAY, H CLARE</small><br />Manual Therapy 9, 2004 ");
Image::miniLink($folder."/en", "LONG 1995_AFMcK",
    "The centralization phenomenon. Its usefulness as a predictor of outcome in conservative
 treatment of chronic low back pain.<small>A L LONG</small><br />Spine vol 20, numero 23, 1995 ");
Image::miniLink($folder."/en", "Clinical Guidelines-Low Back Pain_AFMcK",
    "Clinical Guidelines Low Back Pain<br />Journal of orthopaedic & sports physical therapy. — Vol.42 N°4 ");
Image::miniLink($folder."/en", "magnetic-resonance scans lumbar spine_AFMcK",
    "Abnormal magnetic-resonance scans of the lumbar spine in asymptomatic subjects.<small>1990 SD BODEN</small>
<br />The Journal of Bone and Joint Surgery ");
Image::miniLink($folder."/en", "CLARE-2004_AFMcK",
    "A systematic review of efficacy of Mcenzie therapy for spinal pain.<small>A CLARE, R ADAMS, G MAHER</small><br/>
Australian Journal of Physiotherapy 2004 vol.50 ");
Image::miniLink($folder."/en", "WERNEKE 2001_AFMcK",
    "Centralization phenomenon as a pronostic factor for chronic low back pain and disability.<small>M WERNEKE et D L HART</small>
<br />Spine vol 26, numero 7, 2001 ");
Image::miniLink($folder."/en", "hist natu hernie lomb_AFMcK",
    "Natural history of lumbar disc hernia with radicular leg pain: Spontaneous MRI changes of the
herniated mass and correlation with clinical outcome.<small>E TAKADA and M TAKAHASHI, K SHIMADA</small>
<br />Journal Of Orthopaedic Surgery 2001,9(1): 1-7 ");
        ?>
</ul>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
    </div><!-- fin de .docformation -->
</div><!-- Fin de .casclinic -->

<?php
$script = Image::miniLinkJs();
?>