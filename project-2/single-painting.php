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
<?php
include "include/header.inc.php";
?>
  <main>
    <!-- Main section about painting -->
    <section class="ui segment grey100">
      <div class="ui doubling stackable grid container">
      <?php
      include 'lib/artstore-utilities.php';
      $engine = new Artstore();
      $painting = $engine->get_painting_collection_by_ID($_GET['PaintingID']);
      $artist = $engine->get_artist_collection()->get_artist_by_ID($painting->get_artist_ID());
      $gallery = $engine->get_gallery_collection()->get_gallery_by_ID($painting->get_gallery_ID());
      $genres = $engine->get_genre_collection()->genres_by_painting_ID($painting->get_painting_ID());
      $subjects = $engine->get_subject_collection()->subjects_by_painting_ID($painting->get_painting_ID());
      ?>

        <div class="nine wide column">
          <img src="images/art/works/medium/<?= $painting->get_image_file_name() ?>.jpg" alt="..." class="ui big image" id="artwork">

          <div class="ui fullscreen modal">
            <div class="image content">
              <img src="images/art/works/large/<?= $painting->get_image_file_name() ?>.jpg" alt="..." class="image">
              <div class="description">
                <p></p>
              </div>
            </div>
          </div>

        </div>
        <!-- END LEFT Picture Column -->

        <div class="seven wide column">

          <!-- Main Info -->
          <div class="item">
            <h2 class="header"><?= utf8_encode($painting->get_title()) ?></h2>
            <h3> <?= utf8_encode($artist->get_first_name() . ' '. $artist->get_last_name()) ?></h3>
            <div class="meta">
              <p>
                <i class="orange star icon"></i>
                <i class="orange star icon"></i>
                <i class="orange star icon"></i>
                <i class="orange star icon"></i>
                <i class="empty star icon"></i>
              </p>
              <p><?= utf8_encode($painting->get_description()) ?></p>
            </div>
          </div>

          <!-- Tabs For Details, Museum, Genre, Subjects -->
          <div class="ui top attached tabular menu ">
            <a class="active item" data-tab="details">
              <i class="image icon"></i>Details</a>
            <a class="item" data-tab="museum">
              <i class="university icon"></i>Museum</a>
            <a class="item" data-tab="genres">
              <i class="theme icon"></i>Genres</a>
            <a class="item" data-tab="subjects">
              <i class="cube icon"></i>Subjects</a>
          </div>

          <div class="ui bottom attached active tab segment" data-tab="details">
            <table class="ui definition very basic collapsing celled table">
              <tbody>
                <tr>
                  <td>
                    Artist
                  </td>
                  <td>
                    <a href="#"><?= utf8_encode($artist->get_first_name() . ' '. $artist->get_last_name()) ?></a>
                  </td>
                </tr>
                <tr>
                  <td>
                    Year
                  </td>
                  <td>
                  <?= $painting->get_year_of_work() ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    Medium
                  </td>
                  <td>
                  <?= $painting->get_medium() ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    Dimensions
                  </td>
                  <td>
                  <?= $painting->get_width() . 'cm x ' . $painting->get_height() . 'cm' ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="ui bottom attached tab segment" data-tab="museum">
            <table class="ui definition very basic collapsing celled table">
              <tbody>
                <tr>
                  <td>
                    Museum
                  </td>
                  <td>
                    <?= utf8_encode($gallery->get_name()) ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    Accession #
                  </td>
                  <td>
                  <?= $painting->get_accession_number() ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    Copyright
                  </td>
                  <td>
                  <?= $painting->get_copyright() ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    URL
                  </td>
                  <td>
                    <a href="<?= $painting->get_museum_link() ?>">View painting at museum site</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="ui bottom attached tab segment" data-tab="genres">

            <ul class="ui list">
            <?= output_genres($genres); ?>
            </ul>

          </div>
          <div class="ui bottom attached tab segment" data-tab="subjects">
            <ul class="ui list">
            <?= output_subjects($subjects); ?>
            </ul>
          </div>

          <!-- Cart and Price -->
          <div class="ui segment">
            <div class="ui form">
              <div class="ui tiny statistic">
                <div class="value">
                  $<?= (float)$painting->get_cost() ?>
                </div>
              </div>
              <div class="four fields">
                <div class="three wide field">
                  <label>Quantity</label>
                  <input type="number" placeholder="0">
                </div>
                <?php
                $frames = $engine->get_type_collection()->get_frames();
                $glasses = $engine->get_type_collection()->get_glasses();
                $matts = $engine->get_type_collection()->get_matts();
                ?>
                <div class="four wide field">
                  <label>Frame</label>
                  <select id="frame" class="ui search dropdown">
                    <option>None</option>
                    <?= output_type($frames) ?>
                  </select>
                </div>
                <div class="four wide field">
                  <label>Glass</label>
                  <select id="glass" class="ui search dropdown">
                    <option>None</option>
                    <?= output_type($glasses) ?>
                  </select>
                </div>
                <div class="four wide field">
                  <label>Matt</label>
                  <select id="matt" class="ui search dropdown">
                    <option>None</option>
                    <?= output_type($matts) ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="ui divider"></div>

            <button class="ui labeled icon orange button">
              <i class="add to cart icon"></i>
              Add to Cart
            </button>
            <button class="ui right labeled icon button">
              <i class="heart icon"></i>
              Add to Favorites
            </button>
          </div>
          <!-- END Cart -->

        </div>
        <!-- END RIGHT data Column -->
      </div>
      <!-- END Grid -->
    </section>
    <!-- END Main Section -->

    <!-- Tabs for Description, On the Web, Reviews -->
    <section class="ui doubling stackable grid container">
      <div class="sixteen wide column">

        <div class="ui top attached tabular menu ">
          <a class="active item" data-tab="first">Description</a>
          <a class="item" data-tab="second">On the Web</a>
          <a class="item" data-tab="third">Reviews</a>
        </div>

        <div class="ui bottom attached active tab segment" data-tab="first">
          <?= utf8_encode($painting->get_description()) ?>
        </div>
        <!-- END DescriptionTab -->

        <div class="ui bottom attached tab segment" data-tab="second">
          <table class="ui definition very basic collapsing celled table">
            <tbody>
              <tr>
                <td>
                  Wikipedia Link
                </td>
                <td>
                  <a href="<?= $painting->get_wiki_link() ?>">View painting on Wikipedia</a>
                </td>
              </tr>

              <tr>
                <td>
                  Google Link
                </td>
                <td>
                  <a href="<?= $painting->get_google_link() ?>">View painting on Google Art Project</a>
                </td>
              </tr>

              <tr>
                <td>
                  Google Text
                </td>
                <td>
                <?= utf8_encode($painting->get_google_description()) ?>
                </td>
              </tr>



            </tbody>
          </table>
        </div>
        <!-- END On the Web Tab -->

        <div class="ui bottom attached tab segment" data-tab="third">
          <div class="ui feed">
          <?php
          $reviews = $engine->get_review_collection()->get_reviews_by_ID($painting->get_painting_ID());
          output_reviews($reviews);
          ?>
          </div>
        </div>
        <!-- END Reviews Tab -->

      </div>
    </section>
    <!-- END Description, On the Web, Reviews Tabs -->

    <!-- Related Images ... will implement this in assignment 2 -->
    <section class="ui container">
      <h3 class="ui dividing header">Related Works</h3>
    </section>

  </main>



  <footer class="ui black inverted segment">
    <div class="ui container">footer</div>
  </footer>
</body>

</html>