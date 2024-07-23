  <?php
  require base_path("views/partials/head.php");
  require base_path("views/partials/nav.php");
  require base_path("views/partials/header.php"); 
  ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <?php
      if (isset($notes)) {
        foreach ($notes as $note) :
          echo  "<li><a href='/note?id={$note['id']}' class='text-blue-500 hover:underline'>" . $note['body'] . '</a></li>';
        endforeach;
      }
      ?>
    </div>
  </main>

  <?php
  require base_path("views/partials/footer.php"); 
  ?>