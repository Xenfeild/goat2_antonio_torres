<h2 class="text-center text-4xl font-bold py-20" > <?= $goatList['first_name'] ?> <?=$goatList['last_name']?></h2>
<div class="flex justify-around px-40">
    <img class=" h-[400px]  flex " src="<?= $goatList['url_img']?>" alt="">
    <div class="pt-[8rem] px-20">
        <P class="text-2xl"><span class="font-bold">Id</span> : <?= $goatList['id'] ?></P>
        <P class="text-2xl"><span class="font-bold">Prenom</span> : <?= $goatList['first_name'] ?></P>
        <P class="text-2xl"><span class="font-bold">Nom</span> : <?= $goatList['last_name'] ?></P>
        <P class="text-2xl"><span class="font-bold">Age</span> : <?= $goatList['year_of_birth'] ?></P>
        <P class="text-2xl"><span class="font-bold">Entreprise</span> : <?= $goatList['compagny_name'] ?></P>
        <P class="text-2xl"><span class="font-bold">Sexe</span> : <?= $goatList['sexe'] ?></P>
        <P class="text-2xl"><span class="font-bold">Description</span> : <?= $goatList['description'] ?></P>
    </div>
<div class="text-[20px] flex space-x-10">
<button class="btn btn-active btn-accent">Modifier</button>
<button class="btn btn-active btn-secondary"><a href="delete.php?id=<?=$goatList['id']?>">Supprimer</a></button>
</div>
</div>

