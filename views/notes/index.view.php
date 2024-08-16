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
          echo  "<li><a href='/note?id={$note['id']}' class='text-indigo-600 hover:underline'>" . htmlspecialchars($note['body']) . '</a></li>';
        endforeach;
      }
      ?>
      <p class="mt-6">
        <a href='/notes/create' class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add a new note</a>
      </p>
    </div>
  </main>

  <?php
  require base_path("views/partials/footer.php");
  ?>