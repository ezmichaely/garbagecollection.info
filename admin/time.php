<!-- DB CONNECTION -->
<?php include_once("../app/config/dbconnect.php"); ?>

<?php
//check if you are already logged in, if not go back to homepage / front page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: ../index.php");
  exit;
}
?>

<!-- HEAD -->
<?php $title = 'Time'; ?>
<?php include('../app/includes/admin/head.php'); ?>
<!-- QUERY -->
<?php
$query = "SELECT * FROM $title";
$result = mysqli_query($conn, $query);
?>


<body>
    <main class="container-fluid" id="admin">
        <!-- SIDE BAR -->
        <?php include '../app/includes/admin/sidebar.php' ?>

        <div class="main-container" id="main-container">
            <div class="top-content">
                <?php include '../app/includes/admin/top-content.php' ?>
            </div>
            <div class="hr bg-gray500"></div>

            <div class="main-content">
                <div class="time">
                    <div class="add-button">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                            <i class="fas fa-plus"></i>
                            <span>ADD NEW TIME</span>
                        </button>

                        <!-- Add New Time Modal -->
                        <?php include '../app/includes/admin/modal/addTimeModal.php' ?>

                    </div>

                    <div class="data-table container-fluid">
                        <table id="data-table" class="table table-dark table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo $title; ?></th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_array($result)) :;
                  $timeID = $row['time_id'];
                  $timeName = $row['time_name'];
                ?>
                                <tr>
                                    <td class="center"><?php echo $timeID; ?></td>
                                    <td class="center"><?php echo $timeName; ?></td>
                                    <td class="center">
                                        <!-- Button trigger modal -->
                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editModal<?php echo $timeID; ?>">
                                            <i class="fas fa-edit"></i>
                                            <span>EDIT</span>
                                        </button>

                                        <!-- Modal for EDIT -->
                                        <?php include '../app/includes/admin/modal/editTimeModal.php' ?>

                                        <button class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal<?php echo $timeID; ?>">
                                            <i class="fas fa-trash"></i>
                                            <span>DELETE</span>
                                        </button>

                                        <!-- Modal for DELETE -->
                                        <?php include '../app/includes/admin/modal/deleteTimeModal.php' ?>

                                    </td>
                                </tr>

                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- footer -->
    <?php include('../app/includes/admin/footer.php'); ?>
    <!-- javascripts -->
    <?php include('../app/includes/admin/script.php'); ?>
</body>

</html>