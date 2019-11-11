<?php ob_start(); ?>

<?php $title = 'Mentions legales'; ?>

<div id="legal_container" class="container">
    <p>
        Ce site est fictif, il a été fait dans le cadre d’un projet OpenClassroom par MANSOUR Jean-Loup.<br />

        Tous les services, réservations, articles et informations disponibles sur le site "Billet simple pour l'Alaska" 
        sont purement fictifs.<br/><br/>

        En parcourant les pages de notre site, l’internaute reconnaît avoir lu et accepté 
        les limites de responsabilités et les conditions d’utilisation du site. 
        L’internaute accepte les limitations offertes par le réseau Internet dans la consultation des pages du site. 
        L’auteur du site web, MANSOUR Jean-Loup, ne peut être tenu responsable des difficultés de 
        connexion au réseau Internet ou de visualisation des pages du site. 
        L’internaute reconnaît, en particulier, être informé des différences d’interprétation 
        des pages Internet par les différents logiciels de navigation présents sur le marché.<br /><br/>

        <strong>Edition / conception </strong><br/>

        <em>Editeur du site :</em><br/>

        MANSOUR Jean-Loup<br/><br/>

        <strong>Hébergeur :</strong><br/>

        O2 Switch<br/>
        18-20 rue du Faubourg du Temple – 75011 Paris – France<br/>

        222 et 224 bd gustave flaubert 63000 clermont ferrand France<br/><br/>

        <strong>Contenu et informations</strong><br/>

        Le site "Billet simple pour l'Alaska" met à disposition un contenu fourni à titre informatif. 
        Ces informations sont fournies en l’état, quelle que soit leur origine. 
        Sa responsabilité ne saurait être engagée en raison de l’inexactitude, des erreurs ou de 
        l’omission des informations diffusées sur son site.<br/><br/>

        <strong>Traitement et utilisation des données personnelles</strong><br/>

        Aucune de vos données n'est collectée de quelque manière que ce soit.<br/><br/>

        <strong>Droits d’auteur</strong><br/>

        La reproduction, l’utilisation, l’exploitation de tout ou partie du présent site internet et de son 
        contenu, extractions de base de données, des éléments de conception graphique et en règle générale 
        de tous les éléments constitutifs du site sont interdites sans accord préalable de l’auteur. 
        Le non-respect de cette interdiction constitue une contrefaçon pouvant engager la responsabilité 
        civile et pénale du contrefacteur.<br/>

        La totalités des images du site ont étés produites par l’auteur du sites ou sont libre de droit, 
        et proviennent des sources suivantes :<br/>

        <a href="https://unsplash.com/">https://unsplash.com/</a><br/><br/>

        <strong>Liens hypertexte</strong><br/>

        La présence de liens hypertexte renvoyant vers d’autres sites ne constitue pas une garantie 
        sur la qualité de contenu et de bon fonctionnement desdits sites. 
        La responsabilité de l’auteur ne saurait être engagée quant au contenu de ces sites. 
        L’internaute doit utiliser ces informations avec les précautions d’usage.<br/>

        Dans le cas de la création d’un lien hypertexte vers le site "Billet simple pour l'Alaska" 
        qui n’aurait pas fait l’objet d’un accord préalable, l’auteur se réserve le droit d’exiger 
        à tout moment le retrait dudit lien hypertexte pointant sur son site.
    </p>
</div>

<?php $content = ob_get_clean(); ?>

<?php 
require_once('header.php');
require_once('footer.php');
require_once('templates/template.php'); 
?>