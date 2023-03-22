<?php
// validation formulaire
// étape 1 création de mes variables
include_once ('models/model.php');
$error = [];
$errMsgRequire = "<span class='text-red-500'>Ce champ est obligatoire</span>";
$success = false;

// 2-Verification si le formulaire est soumis
if(!empty($_POST['submitted'])){
       // 2- faille xss
    $first_name = trim(htmlspecialchars($_POST['first_name']));
    $last_name = trim(htmlspecialchars($_POST['last_name']));
    $compagny_name = trim(htmlspecialchars($_POST['compagny_name']));
    $year_of_birth = trim(htmlspecialchars($_POST['year_of_birth']));
    $sexe = trim(htmlspecialchars($_POST['sexe']));
    $description = trim(htmlspecialchars($_POST['sexe']));

    // validation des champs
    // first Name
    if(empty($first_name)){
        $error['first_name'] = $errMsgRequire;
    } elseif(strlen($first_name) < 3 || strlen($first_name) > 50) {
        $error['first_name'] = "<span class='text-red-500'>Le prénom doit contenir 3 à 50 caractères! /span>";
    } else {
        $error['first_name'] = $errorMsgRequire;
    }
    // last name
    if(empty($last_name)){
        $error['last_name'] = $errMsgRequire;
    } elseif(strlen($last_name) < 3 || strlen($last_name) > 50) {
        $error['last_name'] = "<span class='text-red-500'>Le prénom doit contenir 3 à 50 caractères! /span>";
    } else {
        $error['last_name'] = $errorMsgRequire;
    }
    // compagny name
    if(empty($compagny_name)){
        $error['compagny_name'] = $errMsgRequire;
    } elseif(strlen($compagny_name) < 3 || strlen($compagny_name) > 50) {
        $error['compagny_name'] = "<span class='text-red-500'>Le prénom doit contenir 3 à 50 caractères! /span>";
    } else {
        $error['compagny_name'] = $errorMsgRequire;
    }
    // année de naissance
    if (!empty($year_of_birth)){
        // vérifie que l'année de naissance est un nombre entier
        if(!is_numeric($year_of_birth)){
            $error['year_of_birth'] = "<span class='text-red-500'>Merci de mettre une année de naissance correcte</span>";
            // vérifie qu'il est bien majeur
        }
         elseif($year_of_birth < 0) {
         $error['year_of_birth'] = "<span class='text-red-500'>Pas d'year_of_birth négatif!</span>";
        }


    } else {
        $error['year_of_birth'] = $errMsgRequire;
    }   
    // sexe

    if(empty($sexe)){
        $error['sexe'] = $errMsgRequire;
    } else {
        $error['sexe'] = $errorMsgRequire;
    }
        // first Name
        if(empty($description)){
            $error['description'] = $errMsgRequire;
        } elseif(strlen($description) < 10 || strlen($description) > 300) {
            $error['description'] = "<span class='text-red-500'>La déscription doit contenir 10 à 300 caractères! /span>";
        } else {
            $error['description'] = $errorMsgRequire;
        }

}

?>

<h2 class="text-center text-4xl font-bold pb-10"><?= $title ?></h2>
<div class="flex flex-col">
    <form method="POST" class="flex flex-col items-center" >
        <!-- first name -->
        <label class="font-bold mt-[20px]" for="first_name">Prénom</label>
        <input type="text" placeholder="John" class="input input-bordered w-full max-w-xs" name="first_name"/>
        <p><?php errorMsg('first_name') ?></p>
        <!-- last name -->
        <label class="font-bold mt-[20px]" for="last_name">Nom</label>
        <input type="text" placeholder="Doe" class="input input-bordered w-full max-w-xs" name="last_name"/>
        <p><?php errorMsg('last_name') ?></p>
        <!-- nom de la société -->
        <label for="compagny_name" class="font-bold mt-[20px]" >Name compagny</label>
        <input type="text" placeholder="acme INC" class="input input-bordered w-full max-w-xs" name="compagny_name"/>
        <p><?php errorMsg('compagny_name') ?></p>
        <!-- year_of_birth -->
        <label class="font-bold mt-[20px]" for="year_of_birth">Year of birth</label>
        <input type="number" placeholder="1900" class="input input-bordered w-full max-w-xs" name="year_of_birth"/>
        <p><?php errorMsg('year_of_birth') ?></p>
        <!-- description -->
        <label class="font-bold mt-[20px]" for="first_name">Déscription</label>
        <input type="textarea" placeholder="Déscription" class="input input-bordered w-[400px] h-[400px]" name="first_name"/>
        <p><?php errorMsg('first_name') ?></p>
        <!-- sexe  -->
        <?php
        $formationOption = [
            ["name" => "Masculin"],
            ["name" => "Féminin"],

        ]
        ?>
        <div class="form-control w-full max-w-xs">
        <label class="label" for="sexe">
            <span class="font-bold">sexe</span>
        </label>
        <select class="select select-bordered" name="sexe">
            <option disabled selected>Sexe du GOAT</option>
            <?php foreach($formationOption as $item) : ?>
                <option value="<?= $item['name'] ?>"><?= $item['name']?></option>
            <?php endforeach ?>
        </select>
        <p><?php errorMsg('sexe') ?></p>
        
        </div>
        <div class="mt-[20px] "> 
            <input type="submit" class="btn btn-primary btn-active" name="submitted" value="Envoyer">
        </div>
    </form>
</div>

<?php include('partials/_footer.php')?>