<?php
require base_uri("views/partials/header.php");
require base_uri("views/partials/nav.php");
require base_uri("views/partials/banner.php");
?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <a href="/note/create" class="inline-block my-10 rounded-md bg-gray-800 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add note</a>
        <ul>
            <?php foreach ($notes as $note) : ?>
                <li>
                    <a href="/note?id=<?= $note['id'] ?>" class=" text-white bg-blue-600 mt-3 p-3 inline-block w-full"><?= htmlspecialchars($note['body']) ?></a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</main>

<?php
require base_uri("views/partials/footer.php");
?>