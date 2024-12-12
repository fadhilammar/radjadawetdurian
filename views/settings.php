<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-yellow-300 font-sans leading-normal tracking-normal text-yellow-300">
    <div class="max-w-2xl mx-auto mt-20 p-8 bg-yellow-800 rounded-xl shadow-lg">
        <h1 class="text-3xl font-bold text-center text-yellow-300 mb-8">Update Your Password</h1>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="flex justify-center mb-4">
                <div class="m-4 p-4 w-64 rounded-lg shadow-lg text-center <?= $_SESSION['message']['type'] === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'; ?>">
                    <?= $_SESSION['message']['text']; ?>
                    <?php unset($_SESSION['message']); ?>
                </div>
            </div>
        <?php endif; ?>

        <form action="../controllers/UpdatePasswordController.php" method="POST">
            <div class="mb-6">
                <label for="old_password" class="block text-yellow-300 font-semibold">Old Password</label>
                <input type="password" id="old_password" name="old_password" required placeholder="********" class="w-full mt-2 p-3 border border-yellow-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 transition duration-300 bg-white placeholder-yellow-800" />
            </div>

            <div class="mb-6">
                <label for="new_password" class="block text-yellow-300 font-semibold">New Password</label>
                <input type="password" id="new_password" name="new_password" required placeholder="********" class="w-full mt-2 p-3 border border-yellow-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 transition duration-300 bg-white placeholder-yellow-800" />
            </div>

            <div class="mb-6">
                <label for="confirm_new_password" class="block text-yellow-300 font-semibold">Confirm New Password</label>
                <input type="password" id="confirm_new_password" name="confirm_new_password" required placeholder="********" class="w-full mt-2 p-3 border border-yellow-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 transition duration-300 bg-white placeholder-yellow-800" />
            </div>

            <div class="mb-6">
                <button type="submit" name="submit" class="w-full bg-yellow-300 text-yellow-800 font-semibold py-3 rounded-lg hover:bg-yellow-500 hover:text-yellow-100 transition duration-300 focus:outline-none focus:ring-2 focus:ring-yellow-700">Update Password</button>
            </div>
        </form>
    </div>

    <div class="max-w-2xl mx-auto mt-10 p-8 bg-yellow-800 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-yellow-300 mb-4">Delete Your Account</h2>
        <p class="text-yellow-300 text-center mb-6">Account deletion is permanent, all data related to your account will be deleted. This action cannot be undone.</p>

        <div class="flex justify-center">
            <a href="../controllers/DeleteAccountController.php" class="bg-yellow-300 text-yellow-800 font-semibold py-3 px-6 rounded-lg hover:bg-yellow-500 hover:text-yellow-100 transition duration-300 focus:outline-none focus:ring-2 focus:ring-red-500">Delete Account</a>
        </div>
    </div>
</body>

</html>