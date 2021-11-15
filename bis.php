
<?php 

$nn="";
$genre;
if(empty($_POST['nom'])){
    $_SESSION['error'][]="Entrez le nom";
}

if(empty($_POST['prenom'])){
    $_SESSION['error'][]="Entrez le prénom";
}
if(empty($_POST['nn'])){
    $_SESSION['error'][]="Entrez le numéro national";
}else {
    $nn=$_POST['nn'];
}
$taille=strlen($nn);
if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['nn']) && strlen($nn)==11)
{
    
    $nn=$_POST['nn'];
    $nn=str_split($nn);
    if (sizeof($nn)==11){
        $_SESSION['nn'][]=$_POST['nn'];
    $fillegars=(int) $nn[6].$nn[7].$nn[8];
    if ($fillegars%2==0){
        $genre="fille";
    }
    else{
        $genre="garçon";
    }
    }
    else{
        $_SESSION['error'][]="Entrez le numéro national à 11 chiffres";
    }

    $_SESSION['nom'][]=$_POST['nom'];
$_SESSION['prenom'][]=$_POST['prenom'];

$_SESSION['genre'][]=$genre;

}
?>

    <?php   
    if (isset($_SESSION['nom'])){
    for ($i=0; $i < sizeof($_SESSION['nom']); $i++) { 
    echo "
    <td>{$_SESSION['nom'][$i]}</td>
    <td>{$_SESSION['prenom'][$i]}</td>
    <td>{$_SESSION['nn'][$i]}</td>
    <td>{$_SESSION['genre'][$i]}</td>
    ";
    }
    }
    ?>

</body>
</html>

