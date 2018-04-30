<div class="ui top attached tabular menu ">
    <a class="active item" data-tab="details"><i class="image icon"></i>Details</a>
    <a class="item" data-tab="museum"><i class="university icon"></i>Museum</a>
    <a class="item" data-tab="genres"><i class="theme icon"></i>Genres</a>
    <a class="item" data-tab="subjects"><i class="cube icon"></i>Subjects</a>    
</div>
                
<div class="ui bottom attached active tab segment" data-tab="details">
  <table class="ui definition very basic collapsing celled table">
    <tbody>
      <tr>
        <td>Artist</td>
        <td><?= $artist->FirstName . ' ' . $artist->LastName ?></td>                       
      </tr>
      <tr>                       
        <td>Year</td>
        <td><?= $painting->YearOfWork ?></td>
      </tr>       
      <tr>
        <td>Medium</td>
        <td><?= $painting->Medium ?></td>
      </tr>  
      <tr>
        <td>Dimensions</td>
        <td><?= $painting->Width . 'cm x ' . $painting->Height ?>cm</td>
      </tr>        
    </tbody>
  </table>
</div>

<div class="ui bottom attached tab segment" data-tab="museum">
    <table class="ui definition very basic collapsing celled table">
      <tbody>
        <tr>
          <td>Museum</td>
          <td>
            <?= $painting->GalleryName ?>
          </td>
        </tr>       
        <tr>
          <td>Accession #</td>
          <td>
            <?= $painting->AccessionNumber ?>
          </td>
        </tr>  
        <tr>
          <td>Copyright</td>
          <td>
          <?= $painting->CopyrightText ?>
          </td>
        </tr>       
        <tr>
          <td>URL</td>
          <td>
          <a href="<?= $painting->MuseumLink ?>"><?= $painting->MuseumLink ?></a>
          </td>
        </tr>        
      </tbody>
    </table>    
</div>   

<div class="ui bottom attached tab segment" data-tab="genres">
    <ul class="ui list">
      <?php 
      $genres = $genreGate->findForPainting($paintingID);
      // loop thru genres 
      foreach($genres as $genre) {
      ?>
        <li class="item">
          <a href="single-genre.php?id=<?= $genre->GenreID ?>"><?= $genre->GenreName ?></a>  

        </li>
      <?php } ?>
    </ul>
</div>  

<div class="ui bottom attached tab segment" data-tab="subjects">
    <ul class="ui list">
          <?php 
          $subjects = $subjectGate->findForPainting($paintingID);
          // loop thru subjects 
          foreach($subjects as $subject) {
          ?>
            <li class="item">
              <a href="#"><?= $subject->SubjectName ?></a>
            </li>
          <?php } ?>
    </ul>
</div>  