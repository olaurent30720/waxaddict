<?php
  include_once("session-init.php");
  @date_default_timezone_set("Europe/Paris"); // fuseau horaire
  @setlocale(LC_TIME, "fr_FR.utf8","fra"); // jours et mois en français
  $dateDuJour = strftime("%A %d %B %Y");

  $productsPath = "conf/products.json";
  $productsContent = file_get_contents($productsPath);
  $productsArray = json_decode($productsContent, JSON_OBJECT_AS_ARRAY);

?><!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>wax-addict — boutique officielle</title>
  <meta name="description" content="Bienvenue dans la boutique privée “Wax-Addict”. Retrouvez notre toute dernière sélection de tissus africains hauts de gamme.">
  <link rel="stylesheet" href="assets/style.css">
</head>

<body class="back-office">
  <header><h2>wax-addict</h2></header>
  <main>
    <h2>Bienvenue dans votre espace privé</h2>
    <p>Voici les produits disponibles en ce <?php echo $dateDuJour; ?> :</p>
    <?php
      foreach ($productsArray as $key => $product) { 
    ?>
      <div id="ficheProduit">
        <div id="infosProduit">
          <strong>Désignation: </strong><?php echo $product['nom']; ?><br>
          <strong>Prix: </strong><?php echo $product['prix']; ?> euros<br> 
          <strong>Longueur: </strong><?php echo $product['longueur']; ?> yards<br> 
          <strong>Noms alternatifs: </strong> <?php echo $product['nom alternatif']; ?> <br> 
          <img src="<?php echo $product['image'] ?>" alt="image du produit" height=150px>
        </div>
      </div>
    <?php }?>
  </main>
  <footer><a href="logout.php">déconnexion</a></footer>
</body>

</html>