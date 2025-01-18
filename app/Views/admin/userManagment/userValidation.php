<?php 
require_once __DIR__ . '/../../../../vendor/autoload.php';


use App\Controllers\AdminController;


$admin = new AdminController();
$users = $admin->getAllStudent();

if (isset($_POST['submit'])) {
   
       
        $action = $_POST["action"];
        $userId = $_POST["user_id"];
       $admin->usersManager($userId,$action);
      
}        


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>userManagment</title>
</head>
<body class="bg-gray-100">
<div class="flex flex-col md:flex-row min-h-screen">
    <?php include "../../components/sidbarAdmin.php"?>

    <main class="flex-grow p-6">
    <section class="bg-white shadow p-6 rounded-lg mb-6">
      <h2 class="text-xl font-semibold text-blue-900 mb-4">User Management</h2>
      <div class="overflow-x-auto">
          <table class="w-full table-auto border-collapse border border-gray-300">
              <thead>
                  <tr class="bg-gray-200">
                      <th class="p-4 border border-gray-300">Name</th>
                      <th class="p-4 border border-gray-300">Email</th>
                      <th class="p-4 border border-gray-300">Status</th>
                      <th class="p-4 border border-gray-300">Actions</th>
                  </tr>
              </thead>
              <tbody>
                  
                  <?php foreach ($users as $user): ?>
                             <?php if($user['deleted_at'] == null): ?>  
                            <tr>
                                <td class="p-4 border border-gray-300"><?= $user['username']?></td>
                                <td class="p-4 border border-gray-300"><?= $user['email'] ?></td>
                                <td class="p-4 border border-gray-300"><?= $user['status'] ?></td>
                                <td class="p-4 border border-gray-300 flex space-x-2">

                                    <form method="POST" action="">
                                        <input type="hidden" name="action" value="Activation">
                                        <input type="hidden" name="user_id" value="<?= $user['user_id']?>">
                                        <button type="submit" name="submit" class="text-white bg-green-600 hover:bg-green-700 px-4 py-2 rounded">Active</button>
                                    </form>

                                    <form method="POST" action="">
                                        <input type="hidden" name="action" value="suspension">
                                        <input type="hidden" name="user_id" value="<?= $user['user_id']?>">
                                        <button type="submit" name="submit" class="text-white bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded">Suspended</button>
                                    </form>

                                    <form method="POST" action="">
                                        <input type="hidden" name="action" value="suppression">
                                        <input type="hidden" name="user_id" value="<?= $user['user_id']?>">
                                        <button type="submit" name="submit" class="text-white bg-red-600 hover:bg-red-700 px-4 py-2 rounded">Delete</button>
                                    </form>

                                </td>
                            </tr>
                            <?php endif ?>
                            <?php endforeach; ?>
                    
              </tbody>
          </table>
      </div>
  </section>



  </main>

  </div>
</body>
</html>