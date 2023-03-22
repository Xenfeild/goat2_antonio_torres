<h2 class="text-3xl text-center text-bold py-10"><?= $title?></h2>
<div class="overflow-x-auto items-center px-40">
  <table class="table table-zebra w-full">
    <!-- head -->
    <thead>
      <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Nationalité</th>
        <th>Entreprise</th>
        <th>Voir</th>
      </tr>
    </thead>
    <tbody>
<?php 
  foreach ($goatLists as $goatList) {?>
      <tr>
        <th><?= $goatList['id']?></th>
        <td><?= $goatList['first_name']." ". $goatList['last_name'] ?></td>
        <td><?= $goatList['nationality']?></td>
        <td><?= $goatList['compagny_name'] ?></td>
        <td>
          <a href="profil-goat.php?id=<?=$goatList['id']?>&first_name=<?=$goatList['first_name']?>&last_name=<?= $goatList['last_name']?>">
              <i class="fa-solid fa-eye"></i>
          </a>
      </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>