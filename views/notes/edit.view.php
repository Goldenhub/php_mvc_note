<?php
require base_uri("views/partials/header.php");
require base_uri("views/partials/nav.php");
require base_uri("views/partials/banner.php");
?>


<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <a href="/notes" class="text-blue-600 my-4">&LeftArrow; Back</a>

        <form method="POST" action="/note">
            <input type="hidden" name="_METHOD" value="PATCH">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <div class="space-y-12">
                <div class="pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="col-span-full">
                            <label for="note" class="block text-sm font-medium leading-6 text-gray-900">Note</label>
                            
                            <div class="mt-2">
                                <textarea id="note" name="note" rows="3" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter note here"><?= $note['body'] ?? '' ?></textarea>
                            </div>
                            <p class="mt-3 text-sm leading-6 text-red-600">
                                <?= isset($errors['body']) ?  $errors['body'] : ''; ?>
                            </p>
                        </div>

                    </div>
                </div>

            </div>

            <div class="mt-3 flex items-center justify-end gap-x-6">
                <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>
        </form>

    </div>
</main>

<?php
require base_uri("views/partials/footer.php");
?>