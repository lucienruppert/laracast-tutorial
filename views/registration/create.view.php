  <?php
  require base_path("views/partials/head.php");
  require base_path("views/partials/nav.php");
  ?>

  <main>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
      <p class="text-center mb-20 text-4xl font-bold leading-9 tracking-tight text-gray-900">Registration</p>
      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="/register" method="POST">
          <div>
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
            <div class="mt-2">
              <input id="email" name="email" type="email" autocomplete="email" required
                value="<?= $_POST['email'] ?? '' ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <?php if (isset($errors['email'])) : ?>
            <span class="text-red-500"><?= $errors['email'] ?? '' ?></span>
          <?php endif; ?>
          <div>
            <div class="flex items-center justify-between">
              <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
            </div>
            <div class="mt-2">
              <input id="password" name="password" type="password" autocomplete="current-password" required
                value="<?= $_POST['password'] ?? '' ?>"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <?php if (isset($errors['password'])) : ?>
            <span class="text-red-500"><?= $errors['password'] ?? '' ?></span>
          <?php endif; ?>
          <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
          </div>
        </form>

      </div>
    </div>
  </main>

  <?php
  require base_path("views/partials/footer.php");
  ?>