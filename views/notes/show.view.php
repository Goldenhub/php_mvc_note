<?php
require base_uri("views/partials/header.php");
require base_uri("views/partials/nav.php");
require base_uri("views/partials/banner.php");
?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <a href="/notes" class="text-blue-600 my-4">&LeftArrow; Back</a>

        <p id="/note?id=<?= $note['id'] ?>" class="text-dark bg-gray-200 mt-3 p-3 h-80">
            <?= htmlspecialchars($note['body']) ?>
        </p>

        <form method="POST">
            <input type="hidden" name="_METHOD" value="DELETE">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <button  type="submit" class="text-sm text-red-600 my-4 hover:underline">Delete</button>
        </form>

    </div>
</main>

<?php
require base_uri("views/partials/footer.php");
?>