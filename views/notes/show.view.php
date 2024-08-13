  <?php
  require base_path("views/partials/head.php");
  require base_path("views/partials/nav.php");
  require base_path("views/partials/header.php");
  ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <p class="mb-4"><a href='/notes' class='text-blue-500 hover:underline'>Go back</a></p>
      <?= htmlentities($note['body']); ?>
      <p class="mt-4">
      <form method="POST">
        <input type="hidden" value="DELETE" name="_method">
        <input type="hidden" value="<?= $note['id'] ?>" name="id">
        <button class="text-red-500 hover:underline text-sm">Delete</button>
      </form>
      </p>
    </div>
  </main>

  <?php
  require base_path("views/partials/footer.php");
  ?>