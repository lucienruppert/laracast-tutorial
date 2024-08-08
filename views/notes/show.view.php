  <?php
  require base_path("views/partials/head.php");
  require base_path("views/partials/nav.php");
  require base_path("views/partials/header.php");
  ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <?= htmlentities($note['body']); ?>
      <p><a href='/notes' class='text-blue-500 hover:underline'>Go back</a></p>
    </div>
  </main>

  <?php
  require base_path("views/partials/footer.php");
  ?>