<?php require basePath('views/partials/head.php') ?>
<?php require basePath('views/partials/nav.php') ?>
<?php require basePath('views/partials/banner.php') ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <p class="mb-4">
      👈 <a href="/notes" class="text-blue-500 hover:underline">Go back...</a>
    </p>

    <p><?= $note['body'] ?></p>

    <form method="POST" class="mt-4">
      <input type="hidden" name="id" value="<?= $note['id'] ?>">
      <button class="text-sm text-red-500">Delete</button>
    </form>
  </div>
</main>

<?php require basePath('views/partials/footer.php') ?>