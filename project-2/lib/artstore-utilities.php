<?php

include 'include/art-config.inc.php';

include 'lib/classes/Artist.class.php';
include 'lib/classes/ArtStore.class.php';
include 'lib/classes/Gallery.class.php';
include 'lib/classes/Genre.class.php';
include 'lib/classes/Painting.class.php';
include 'lib/classes/Review.class.php';
include 'lib/classes/Shape.class.php';
include 'lib/classes/Subject.class.php';
include 'lib/classes/Frame.class.php';
include 'lib/classes/Glass.class.php';
include 'lib/classes/Matt.class.php';

include 'lib/collections/ArtistCollection.class.php';
include 'lib/collections/GalleryCollection.class.php';
include 'lib/collections/GenreCollection.class.php';
include 'lib/collections/ShapeCollection.class.php';
include 'lib/collections/PaintingCollection.class.php';
include 'lib/collections/SubjectCollection.class.php';
include 'lib/collections/ReviewCollection.class.php';
include 'lib/collections/TypeCollection.class.php';

include 'lib/database/ArtistDB.php';
include 'lib/database/DBUtil.php';
include 'lib/database/GenreDB.php';
include 'lib/database/GalleryDB.php';
include 'lib/database/PaintingDB.php';
include 'lib/database/PDODBConnector.php';
include 'lib/database/ShapeDB.php';
include 'lib/database/SubjectDB.php';
include 'lib/database/ReviewDB.php';
include 'lib/database/TypeDB.php';

function generate_query_from_params() {
    $constraint = "";
    $counter = 0;
    if (!empty($_GET['artistID'])) {
        if ($_GET['artistID'] != "Select Artist") {
            if ($counter > 0) {
                $constraint .= ' AND ArtistID = ' . $_GET['artistID'];
            }
            else {
                $constraint .= ' WHERE ArtistID = ' . $_GET['artistID'];
            }
            $counter++;
        }
    }
    if (!empty($_GET['museumID'])) {
        if ($_GET['museumID'] != "Select Museum") {
            if ($counter > 0) {
                $constraint .= ' AND GalleryID = ' . $_GET['museumID'];
            }
            else {
                $constraint .= ' WHERE GalleryID = ' . $_GET['museumID'];
            }
            $counter++;
        }
    }
    if (!empty($_GET['shapeID'])) {
        if ($_GET['shapeID'] != "Select Shape") {
            if ($counter > 0) {
                $constraint .= ' AND ShapeID = ' . $_GET['shapeID'];
            }
            else {
                $constraint .= ' WHERE ShapeID = ' . $_GET['shapeID'];
            }
            $counter++;
        }
    }
    return $constraint;
}

function output_genres($genreArray) {
    foreach ($genreArray as $genre) {
        echo '<li class="item">';
        echo '<a href="#">'. $genre['GenreName'] . '</a>';
        echo '</li>';
    }
}

function output_subjects($subjectArray) {
    foreach ($subjectArray as $subject) {
        echo '<li class="item">';
        echo '<a href="#">'. $subject['SubjectName'] . '</a>';
        echo '</li>';
    }
}

function review_stars($review) {
    $MAX_STARS = 5;
    $star_total = 0;
    for ($i = 0; $i < $review->get_rating(); $i++) {
        echo '<i class="star icon"></i>';
        $star_total++;
    }
    while ($star_total < $MAX_STARS) {
        echo '<i class="empty star icon"></i>';
        $star_total++;
    }
}

function output_reviews($reviewArray) {
    foreach($reviewArray as $review) {
    ?>
    <div class="event">
              <div class="content">
                <div class="date"><?= substr($review->get_review_date(), 0, 10) ?></div>
                <div class="meta">
                  <a class="like">
                  <?= review_stars($review); ?>
                  </a>
                </div>
                <div class="summary">
                <?= $review->get_comment() ?>
                </div>
              </div>
            </div>
        <?php
        if ($review != end($reviewArray)) {
        ?>
            <div class="ui divider"></div>
        <?php
        }
    }
}

function output_type($types) {
    foreach($types as $type) {
        if ($type->get_title() != "[None]") {
        ?>
        <option><?= $type->get_title() ?></option>
<?php
        }
    }
}
?>