<?php include("config.php") ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" href="https://seeklogo.com/images/I/independent-university-logo-776F5F3A69-seeklogo.com.png">

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js" defer></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .content {
            display: flex;
            max-width: 1200px;
            width: 100%;
        }

        .left-aside,
        .right-aside {
            width: 15%;
            max-width: 300px;
            margin-right: 8; /* Adjust this margin as needed */
        }

        .main-section {
            flex-grow: 1;
            width: 65%;
            margin-left: 8; /* Adjust this margin as needed */
        }
    </style>
</head>

<body>
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="studentDashboard.php" class="flex items-center p-2 text-gray-900 rounded-lg group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="studentTimeline.php" class="flex items-center p-2 text-gray-900 rounded-lg group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Timeline</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Messages</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Manage Account</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php" class="flex items-center p-2 text-gray-900 rounded-lg group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <section class="ActiveProject flex-grow flex items-center justify-center mx-30 w-25vw p-20">
    <div class="container mx-auto p-4 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4 text-center">Active Projects</h1>
        <!-- Table Styling with Tailwind CSS -->
        <div class="overflow-x-auto">
        <?php
            try {
                // Fetch data from the SQL table
                $sql = "SELECT ProjectName, ProjectInitialBudget, ProjectFinalBudget, ProjectStatus FROM Project";
                $result = $pdo->query($sql);

            if ($result) {
            ?>
                <table class="min-w-full border border-gray-300">
                    <thead>
                        <tr class="bg-black text-white">
                            <th class="py-2 px-4 text-center">Project Name</th>
                            <th class="py-2 px-4 text-center">Project Phrase</th>
                            <th class="py-2 px-4 text-center">Initial Budget</th>
                            <th class="py-2 px-4 text-center">Final Budget</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            // Check if ProjectStatus is 0
                            if ($row['ProjectStatus'] == 0) {
                                $projectPhrase = "On Going";
                        ?>
                                <tr class="bg-gray-100">
                                    <td class="py-2 px-4 text-center"><?php echo $row['ProjectName']; ?></td>
                                    <td class="py-2 px-4 text-center"><?php echo $projectPhrase; ?></td>
                                    <td class="py-2 px-4 text-center"><?php echo $row['ProjectInitialBudget']; ?></td>
                                    <td class="py-2 px-4 text-center"><?php echo $row['ProjectFinalBudget']; ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                    } else {
                        echo "Error in SQL query: " . $pdo->errorInfo()[2];
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }

                ?>
            </tbody>
            </table>

        </div>
    </div>
</section> 
<br> <br>




    <aside class="rightAside">
        <aside class="rightAside fixed top-0 right-0 z-40 w-1/7 h-screen bg-white border-l border-gray-200">
            <div class="h-full px-4 py-8">
                <!-- First Section: Total Project -->
                <!-- Third Section: Completed Project -->
                <?php
                    // Assuming you have a PDO connection named $pdo
                    $stmt = $pdo->prepare("SELECT COUNT(*) as totalProjects FROM Project");
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Extract the totalProjects value
                    $totalProjects = isset($result['totalProjects']) ? $result['totalProjects'] : 0;
                ?>

                <div class="mb-6">
                    <h2 class="text-lg font-medium text-gray-700">Total Project</h2>
                    <div class="mt-2 text-3xl font-bold text-blue-500" id="ProjectCount"><?php echo $totalProjects; ?></div>
                    <div class="mt-1 text-sm text-gray-500">100%</div>
                </div>


                <!-- Second Section: Running Project -->
                <!-- Second Section: Running Project -->
                <?php


                    // Assuming you have a PDO connection named $pdo
                    $stmtTotal = $pdo->prepare("SELECT COUNT(*) as totalProjects FROM Project");
                    $stmtTotal->execute();
                    $resultTotal = $stmtTotal->fetch(PDO::FETCH_ASSOC);

                    $stmtRunning = $pdo->prepare("SELECT COUNT(*) as runningProjects FROM Project WHERE ProjectStatus = 0");
                    $stmtRunning->execute();
                    $resultRunning = $stmtRunning->fetch(PDO::FETCH_ASSOC);

                    // Extract the totalProjects and runningProjects values
                    $totalProjects = isset($resultTotal['totalProjects']) ? $resultTotal['totalProjects'] : 0;
                    $runningProjects = isset($resultRunning['runningProjects']) ? $resultRunning['runningProjects'] : 0;

                    // Calculate the percentage
                    $percentageRunning = ($totalProjects > 0) ? ($runningProjects / $totalProjects) * 100 : 0;
                ?>

                <div class="mb-6">
                    <h2 class="text-lg font-medium text-gray-700">Running Project</h2>
                    <div class="mt-2 text-3xl font-bold text-green-500" id="RunningProject"><?php echo $runningProjects; ?></div>
                    <div class="mt-1 text-sm text-gray-500"><?php echo number_format($percentageRunning, 2) . '%'; ?></div>
                </div>


                <!-- Third Section: Completed Project -->
                <?php
                    include("config.php");

                    // Assuming you have a PDO connection named $pdo
                    $stmtCompleted = $pdo->prepare("SELECT COUNT(*) as completedProjects FROM Project WHERE ProjectStatus = 1");
                    $stmtCompleted->execute();
                    $resultCompleted = $stmtCompleted->fetch(PDO::FETCH_ASSOC);

                    // Extract the completedProjects value
                    $completedProjects = isset($resultCompleted['completedProjects']) ? $resultCompleted['completedProjects'] : 0;

                    // Calculate the percentage
                    $percentageCompleted = ($totalProjects > 0) ? ($completedProjects / $totalProjects) * 100 : 0;
                    ?>

                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-700">Completed Project</h2>
                        <div class="mt-2 text-3xl font-bold text-purple-500" id="CompletedProject"><?php echo $completedProjects; ?></div>
                        <div class="mt-1 text-sm text-gray-500"><?php echo number_format($percentageCompleted, 2) . '%'; ?></div>
                    </div>


                <!-- Fourth Section: Success Rate Project -->
                <?php
                    include("config.php");

                    // Assuming you have a PDO connection named $pdo
                    $stmtTotal = $pdo->prepare("SELECT COUNT(*) as totalProjects FROM Project");
                    $stmtTotal->execute();
                    $resultTotal = $stmtTotal->fetch(PDO::FETCH_ASSOC);

                    $stmtCompleted = $pdo->prepare("SELECT COUNT(*) as completedProjects FROM Project WHERE ProjectStatus = 1");
                    $stmtCompleted->execute();
                    $resultCompleted = $stmtCompleted->fetch(PDO::FETCH_ASSOC);

                    // Extract the totalProjects and completedProjects values
                    $totalProjects = isset($resultTotal['totalProjects']) ? $resultTotal['totalProjects'] : 0;
                    $completedProjects = isset($resultCompleted['completedProjects']) ? $resultCompleted['completedProjects'] : 0;

                    // Calculate the success rate
                    $successRate = ($totalProjects > 0) ? ($completedProjects / $totalProjects) * 100 : 0;
                ?>
                <div>
                    <h2 class="text-lg font-medium text-gray-700">Success Rate Project</h2>
                    <div class="mt-2 text-3xl font-bold text-yellow-500"><?php echo number_format($successRate, 2) . '%'; ?></div>
                    <div class="mt-1 text-sm text-gray-500">Based on <?php echo $totalProjects; ?> projects</div>
                </div>

            </div>
        </aside>
    </aside>
    <section class="main-section"> 
    <section class="ProjectStatistic">
        <h1 class="text-2xl font-semibold mb-4">Budget Project Statistic</h1>
        <div class="bg-gray-200 p-6 rounded-lg">
            <canvas id="budgetChart" class="w-full h-64"></canvas>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            <?php
            try {
                // Fetch data from the SQL table
                $sql = "SELECT ProjectName, ProjectInitialBudget, ProjectFinalBudget FROM Project WHERE ProjectStatus = 0";
                $result = $pdo->query($sql);

                if ($result) {
                    ?>
                    // Extract InitialBudget and FinalBudget data for projects with ProjectStatus == 0
                    const filteredData = [];
                    <?php
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        filteredData.push({
                            project: '<?php echo $row['ProjectName']; ?>',
                            initialBudget: <?php echo $row['ProjectInitialBudget']; ?>,
                            finalBudget: <?php echo $row['ProjectFinalBudget']; ?>
                        });
                        <?php
                    }
                    ?>

                    // Extract the range for the vertical bar chart
                    const minInitialBudget = Math.min(...filteredData.map(item => item.initialBudget)) - 10000;
                    const maxFinalBudget = Math.max(...filteredData.map(item => item.finalBudget)) + 15000;

                    // Create datasets
                    const datasets = [
                        {
                            label: 'Initial Budget',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1,
                            data: filteredData.map(item => item.initialBudget)
                        },
                        {
                            label: 'Final Budget',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                            data: filteredData.map(item => item.finalBudget)
                        }
                    ];

                    // Create the bar chart
                    const ctx = document.getElementById('budgetChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: filteredData.map(item => item.project),
                            datasets: datasets
                        },
                        options: {
                            scales: {
                                x: {
                                    beginAtZero: true
                                },
                                y: {
                                    min: minInitialBudget,
                                    max: maxFinalBudget
                                }
                            }
                        }
                    });
            <?php
                } else {
                    echo "Error in SQL query: " . $pdo->errorInfo()[2];
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        });
    </script>
</section>
</section>   

</body>

</html>