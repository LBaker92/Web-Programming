<?php include 'lib/artstore-utilities.php'; ?>

<!DOCTYPE html>
<html lang=en>

<head>
  <meta charset=utf-8>
  <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="css/semantic.js"></script>
  <script src="js/misc.js"></script>

  <link href="css/semantic.css" rel="stylesheet">
  <link href="css/icon.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">

</head>

<body>
  <?php include "include/header.inc.php"; ?>
  <main class="ui segment doubling stackable grid container">

    <section class="five wide column">
      <form class="ui form">
        <h4 class="ui dividing header">Filters</h4>

        <?php 
        $engine = new ArtStore();
        $aColl = $engine->get_artist_collection();
        $gColl = $engine->get_gallery_collection();
        $sColl = $engine->get_shape_collection();
        ?>
        <div class="field">
          <label>Artist</label>
          <select name ="artistID" class="ui fluid dropdown">
            <option>Select Artist</option>
            <?php echo $aColl->display_artist_dropdown(); ?>
          </select>
        </div>
        <div class="field">
          <label>Museum</label>
          <select name ="museumID" class="ui fluid dropdown">
            <option>Select Museum</option>
            <?php echo $gColl->display_museum_dropdown(); ?>
          </select>
        </div>
        <div class="field">
          <label>Shape</label>
          <select name ="shapeID" class="ui fluid dropdown">
            <option>Select Shape</option>
            <?php echo $sColl->display_shape_dropdown(); ?>
          </select>
        </div>

        <button class="small ui orange button" type="submit">
          <i class="filter icon"></i> Filter
        </button>

      </form>
    </section>

    <section class="eleven wide column">
      <h1 class="ui header">Paintings</h1>
      <ul class="ui divided items" id="paintingsList">
      <?php
      $constraint = generate_query_from_params();
      $pColl = $engine->get_painting_collection_with_params($constraint);
      $pColl->display_paintings();
      ?>
      </ul>
    </section>

  </main>

  <footer class="ui black inverted segment">
    <div class="ui container">footer for later</div>
  </footer>
</body>

</html>