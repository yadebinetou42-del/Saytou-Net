

<?php
SESSION_START();
if(isset($_POST['nom'],$_POST['prenom'],$_POST['username'],$_POST['mdp'])){
    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['username']) && !empty($_POST['mdp'])){
        $nom=htmlspecialchars($_POST['nom']);
        $prenom=htmlspecialchars($_POST['prenom']);
        $username=htmlspecialchars($_POST['username']);
        $mdp=password_hash($_POST['mdp'],PASSWORD_DEFAULT);
        include'db_connect.php';
        $inserer=$pdo->prepare("INSERT INTO administrateur (nom,prenom,username,mdp)
        VALUES (:nom,:prenom,:username,:mdp)");
        $inserer->execute([
            'nom'=>$nom,
            'prenom'=>$prenom,
            'username'=>$username,
            'mdp'=>$mdp
        ]);
        header('location:login.php?succes=1');
        exit();
    }
}
?>