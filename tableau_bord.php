<style>
    @keyframes clignoter {
       0% { 
        opacity: 1; 
        transform: scale(1); 
        box-shadow: 0 0 0px rgba(139, 0, 0, 0); 
    }
    50% { 
        opacity: 0.8; 
        transform: scale(1.5); /* La pastille grossit légèrement */
        box-shadow: 0 0 20px #8B0000; /* Halo lumineux de la couleur du texte/bord */
    }
    100% { 
        opacity: 1; 
        transform: scale(1); 
        box-shadow: 0 0 0px rgba(139, 0, 0, 0);
    }
}
    table{
        border:1px dashed aqua;
        border-radius:10px;
        padding:20px; 
        width:100%;  
        cursor: pointer;  
    }   
    th, td{
        padding: 10px;
        text-align: center; 
    }
    .formrond{
        width: 20px;
        height: 20px;
        border-radius:50%;
        display:inline-block;
        animation: clignoter 1.5s infinite;
    }
    .up{
        background-color:green;
    }
    .down{
        background-color:#8B0000;
    }
    .attente{
        background-color:yellow;
    }
</style>
<?php
session_start();
include 'db_connect.php';
$demande=$pdo->prepare('SELECT equipement.*, sante.etat FROM equipement
LEFT JOIN sante ON equipement.id_equipement=sante.id_equipement');
/*le ON sert à relier 2 colonnes de tables différentes
ici on appelle l'etat de l'équipement à tavers la table
sante d'ou le LEFT JOIN aprés on ne peut mettre un select*/
$demande->execute();
echo"<table>";
echo"<tr>";
echo"<th>Type</th>";
echo"<th>Adrese MAC</th>";
echo"<th>Adresse IP</th>";
echo"<th>Localisation</th>";
echo"<th>ID Admin</th>";
echo"<th>Statut</th>";
echo"</tr>";
while($eq=$demande->fetch(PDO::FETCH_ASSOC)){
    echo"<tr>";
    echo"<td>".htmlspecialchars($eq['type_eq'])."</td>";
    echo"<td>".htmlspecialchars($eq['ad_mac'])."</td>";
    echo"<td>".htmlspecialchars($eq['ad_ip'])."</td>";
    echo"<td>".htmlspecialchars($eq['localisation_eq'])."</td>";
    echo"<td>".htmlspecialchars($eq['id_admin'])."</td>";
    $etat=(!empty($eq['etat']))?htmlspecialchars($eq['etat']):'attente';
    //au cas ou il n'y aurai pas de statut  
    echo"<td><span class='formrond $etat'></span>".$etat."</td>";
    //class ne s'utilise pas directement sur td dou le span
    echo"</tr>";
}
echo"</table>";
?>
