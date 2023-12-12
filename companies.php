<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies</title>
    <link rel="icon" href="https://seeklogo.com/images/I/independent-university-logo-776F5F3A69-seeklogo.com.png">

    <!-- flowbite -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"  rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js" defer></script>

    <link rel="stylesheet" href="./css/companies.css">

</head>
<body>

    <?php include('assets/header.php') ?>

    <section class="bg-center bg-no-repeat bg-blue-900 pt-24">
        <div class="px-4 mx-auto max-w-screen-xl text-center pb-6 lg:pt-6">
            <h1 class="mb-4 text-3xl font-extrabold text-white sm:text-4xl">
            IUB 360 founders are bold and visionary, and dare to strap themselves in and launch into the unknown.
            </h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Here are the companies that IUB 360 has helped launch.</p>
            
            

        </div>
    </section>

    <div class="container text-center">
        
        <?php
            include "connection.php";
            
            $sql = "SELECT * FROM companies";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<table class="table table-borderless text-blue-900 font-bold">';
                $count = 0;
                while ($row = $result->fetch_assoc()) {
                    if ($count % 3 == 0) {
                        echo '<tr>';
                    }
                    echo '<td>';
                    echo 'Company: ' . $row['name'] . '<br>';
                    echo 'Batch: ' . $row['batch'];
                    echo '</td>';
                    $count++;
                    if ($count % 3 == 0) {
                        echo '</tr>';
                    }
                }
                echo '</table>';
            } else {
                echo 'No companies found.';
            }
            $conn->close();
        ?>

    </div>

</body>
</html>
