<?php
// récupère la connexion à la BDD
require_once('models/database.php');
include('helpers/function.php');
// je stocks la connexion dans $pdo
$pdo = pdo();

/**
 * Get return items in DB
 * 
 */
function getALL($table, $order='')
{
    global $pdo;
// 1- je stock ma requette dans une variable
    $sql = "SELECT * FROM $table";
    if($order){
        $sql .= " ORDER BY ". $order;
    }
// 2- Prépare ma requette
    $query = $pdo->prepare($sql);
// 3- execute la requette
    $query->execute();
// 4- Je stock tous le resultat dans une variable
    $items = $query->fetchAll();
// 4- Je retourne le resultat de la query
    return $items;
}

/**
 * Get the id for item
 * 
 * @return int
 */
function getId() {
    // 1 on récupére le bon id
if(!empty($_GET['id']) && isset($_GET['id']) && is_numeric($_GET['id'])){
// on néttoie l'id
$id = cleanInput($_GET['id']);

} else {
$_SESSION['error'] = "ID invalide";
// echo "L'id est invalide!";
// redirection quand l'id est invalide
header('Location: liste-goat.php');
}
return $id;

}

function get($table)
{
    global $pdo;
    $id =getId();
        // faire la requette
    $sql = "SELECT * FROM $table where id= :id";
    // prépare la requette
    $query = $pdo->prepare($sql);
    // Associe ou lie la valeur à un parametre
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    // executer la requette
    $query->execute();
    //  on stock l'étudiant dans une variable
    $item = $query->fetch();
    // debug_array($item);
    // pas de item redirect
    if(!$item) {
        $_SESSION["error"] = "Cet étudiant n'existe pas!";
        header('Location: liste-goat.php');
    } 
     return $item;
}

function delete() {
    global $pdo;
    global $table;
    $id = getId();
    
  // faire la requette
    $sql = "DELETE FROM $table where id= :id";
    // prépare la requette
    $query = $pdo->prepare($sql);
    // Associe ou lie la valeur à un parametre
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    // executer la requette
    $query->execute();
    $_SESSION["succes"] = "L'élement à été supprimé avec succès";
    // redirection
    header(('Location: liste-goat.php'));
};