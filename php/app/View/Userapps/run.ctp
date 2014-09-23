<?php
if (empty($userApp['Mashup'])) {
  ?>
  <div class="alert">
    You need at least one mashup in your app.
    <button>Create a mashup</button>
  </div>
  <?php
} else {
  ?>
  <div class="">
    <?php echo $userApp['Mashup'][0]['nome']; ?>
  </div>
  <?php
}
