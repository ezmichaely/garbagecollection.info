<!-- DB CONNECTION -->
<?php include_once("../app/config/dbconnect.php"); ?>

<?php
//check if you are already logged in, if not go back to homepage / front page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: ../index.php");
  exit;
}
?>

<!-- HTML - HEAD -->
<?php $title = "Barangay"; ?>
<?php include('../app/includes/admin/head.php'); ?>

<!-- QUERY -->
<?php
$query = "SELECT * FROM $title";
$result = mysqli_query($conn, $query);
?>


<body>
  <main class="container-fluid" id="admin">
    <!-- SIDE BAR -->
    <?php include('../app/includes/admin/sidebar.php'); ?>

    <div class="main-container" id="main-container">
      <div class="top-content">
        <!-- TOP CONTENT -->
        <?php include('../app/includes/admin/top-content.php'); ?>
      </div>
      <div class="hr bg-gray500"></div>

      <div class="main-content">
        <div class="barangay">
          <div class="add-button">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
              <i class="fas fa-plus"></i>
              <span>ADD NEW BARANGAY</span>
            </button>

            <!-- Add Barangay Modal -->
            <?php include('../app/includes/admin/modal/addBarangayModal.php'); ?>

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
                  $brgyID = $row['brgy_id'];
                  $brgyName = $row['brgy_name'];
                ?>
                  <tr>
                    <td class="center"> <?php echo $brgyID; ?> </td>
                    <td class=""> <?php echo $brgyName; ?> </td>
                    <td class="center">
                      <!-- Button trigger modal -->
                      <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $brgyID; ?>">
                        <i class="fas fa-edit"></i>
                        <span>EDIT</span>
                      </button>

                      <!-- Modal for EDIT -->
                      <?php include('../app/includes/admin/modal/editBarangayModal.php'); ?>


                      <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $brgyID ?>">
                        <i class="fas fa-trash"></i>
                        <span>DELETE</span>
                      </button>

                      <!-- Modal for DELETE -->
                      <?php include('../app/includes/admin/modal/deleteBarangayModal.php'); ?>

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