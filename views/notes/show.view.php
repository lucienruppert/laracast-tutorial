  <?php
  require base_path("views/partials/head.php");
  require base_path("views/partials/nav.php");
  require base_path("views/partials/header.php");
  ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <p class="mb-4"><a href='/notes' class='text-indigo-500 hover:underline'>Go back</a></p>
      <?= htmlentities($note['body']); ?>
      <p class="mt-10">
        <a href="/note/edit?id=<?= $note['id'] ?>" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit this note</a>
      </p>
    </div>
  </main>

  <?php
  require base_path("views/partials/footer.php");
  ?>