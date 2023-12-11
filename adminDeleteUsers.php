<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iub360";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_users"])) {
    $selectedUserIds = isset($_POST["selected_users"]) ? $_POST["selected_users"] : [];

    $adminUserId = $_SESSION["user_id"];
    if (in_array($adminUserId, $selectedUserIds)) {
        echo '<script>alert("You cannot delete your account.");</script>';
    } else {
        if (!empty($selectedUserIds)) {
            $userIdsString = implode(",", $selectedUserIds);
            $deleteQuery = "DELETE FROM users WHERE user_id IN ($userIdsString)";
            $deleteResult = $conn->query($deleteQuery);

            if ($deleteResult === true) {
                echo '<script>alert("Selected users have been deleted successfully.");</script>';
            } else {
                echo "Error deleting users: " . $conn->error;
            }
        }
    }
}

$selectQuery = "SELECT user_id, name, email, user_type FROM users";
$selectResult = $conn->query($selectQuery);

if ($selectResult === false) {
    die("Error retrieving users: " . $conn->error);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View and Delete Users</title>
  <link rel="icon" href="https://seeklogo.com/images/I/independent-university-logo-776F5F3A69-seeklogo.com.png">

  <script src="https://cdn.tailwindcss.com"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js" defer></script>

</head>
<body>

    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
            </button>
            <a href="index.php" class="flex ms-2 md:me-24">
            <img src="https://seeklogo.com/images/I/independent-university-logo-776F5F3A69-seeklogo.com.png" class="h-8 me-3" alt="FlowBite Logo" />
            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">IUB 360</span>
            </a>
        </div>
        <div class="flex items-center">
            <div class="flex items-center ms-3">
                <div>
                <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                </button>
                </div>
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow" id="dropdown-user">
                <div class="px-4 py-3" role="none">
                    <p class="text-sm text-gray-900" role="none">
                    <?php
                            if (isset($_SESSION["name"])) {
                                echo $_SESSION["name"];
                            }
                            else {
                                echo "Name";
                            }
                    ?>
                    </p>
                    <p class="text-sm font-medium text-gray-900 truncate" role="none">
                        <?php
                            if (isset($_SESSION["email"])) {
                                echo $_SESSION["email"];
                            }
                            else {
                                echo "Email";
                            }
                        ?>
                    </p>
                </div>
                <ul class="py-1" role="none">
                    <li>
                    <a href="adminDashboard.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Dashboard</a>
                    </li>
                    <li>
                    <a href="adminManageAccount.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Manage</a>
                    </li>
                    <li>
                    <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
                    </li>
                </ul>
                </div>
            </div>
            </div>
        </div>
    </div>
    </nav>

    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="adminDashboard.php" class="flex items-center p-2 text-gray-900 rounded-lg group">
                <svg class="w-5 h-5 text-gray-500 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                    <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                    <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                </svg>
                <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="adminCreateUsers.php" class="flex items-center p-2 text-gray-900 rounded-lg group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-2V5a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V9h2a1 1 0 1 0 0-2Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Create Users</span>
                </a>
            </li>
            <li>
                <a href="adminDeleteUsers.php" class="flex items-center p-2 text-gray-900 rounded-lg group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.109 17H1v-2a4 4 0 0 1 4-4h.87M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm7.95 2.55a2 2 0 0 1 0 2.829l-6.364 6.364-3.536.707.707-3.536 6.364-6.364a2 2 0 0 1 2.829 0Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Delete Users</span>
                </a>
            </li>
            <li>
                <a href="adminMessages.php" class="flex items-center p-2 text-gray-900 rounded-lg group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Messages</span>
                </a>
            </li>
            <li>
                <a href="adminManageAccount.php" class="flex items-center p-2 text-gray-900 rounded-lg group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Manage Account</span>
                </a>
            </li>
            <li>
                <a href="logout.php" class="flex items-center p-2 text-gray-900 rounded-lg group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>
    </aside>

    <div class="py-20 px-16 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">
            <p class="text-3xl text-black p-5">Delete Users</p>
            <div class="flex items-center justify-center h-fit mb-4 rounded bg-gray-50 ">
                <p class="text-2xl text-black"> 
                    <form method="post" action="">
                        <div class="relative overflow-x-auto shadow-md rounded-lg m-10">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3">Name</th>
                                        <th class="px-6 py-3">Email</th>
                                        <th class="px-6 py-3">User Type</th>
                                        <th class="px-6 py-3">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $selectResult->fetch_assoc()) : ?>
                                        <tr class="odd:bg-white even:bg-gray-50 border-b">
                                            <td class="px-6 py-4"><?php echo $row["name"]; ?></td>
                                            <td class="px-6 py-4"><?php echo $row["email"]; ?></td>
                                            <td class="px-6 py-4"><?php echo $row["user_type"]; ?></td>
                                            <td class="px-6 py-4"><input type="checkbox" name="selected_users[]" value="<?php echo $row["user_id"]; ?>"></td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" name="delete_users" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center m-10 me-2 mb-2 mt-8">Delete Selected Users</button>
                    </form>
                </p>
            </div>
        </div>
    </div>


</body>
</html>

<?php
// Close the connection
$conn->close();
?>