  <?php
  require base_path("views/partials/head.php");
  require base_path("views/partials/nav.php");
  require base_path("views/partials/header.php");
  ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <form action="/note" method="post">
        <textarea name="body" rows="3" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $note['body'] ?></textarea>
        <?php if (isset($errors['body'])) : ?>
          <span class="text-red-500"><?= $errors['body'] ?? '' ?></span>
        <?php endif; ?>
        <div class="mt-6 flex items-center justify-end">
          <input type="hidden" value="PATCH" name="_method">
          <input type="hidden" value="<?= $note['id'] ?>" name="id">
          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
        </div>
        <!-- <div class="mt-6 flex items-center justify-end">
          <input type="hidden" value="DELETE" name="_method">
          <input type="hidden" value="<?= $note['id'] ?>" name="id">
          <button class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete</button>
        </div> -->
        <div>
          <a href="/notes" class="rounded-md px-3 py-2 text-sm font-semibold text-indigo-600 shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back to Notes</a>
        </div>
      </form>
    </div>
  </main>
  <?php
  require base_path("views/partials/footer.php");
  ?>