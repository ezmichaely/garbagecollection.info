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
<?php $title = 'Collection'; ?>
<?php include('../app/includes/admin/head.php'); ?>

<!-- QUERY -->
<?php
$query = "SELECT 
          t1.collection_id AS COLLECTION_ID,
          t2.brgy_id AS BARANGAY_ID,
          t2.brgy_name AS BARANGAY_NAME, 
          t3.day_id AS DAY_ID,
          t3.day_name AS DAY_NAME,
          t4.time_id AS TIME_ID,
          t4.time_name AS TIME_NAME
          FROM collection t1 
          INNER JOIN barangay t2 ON t1.collection_brgy = t2.brgy_id
          INNER JOIN day t3 ON t1.collection_day = t3.day_id
          INNER JOIN time t4 ON t1.collection_time = t4.time_id ORDER BY COLLECTION_ID;";

$result = $conn->query($query)
  or die($conn->error);
?>


<body>
  <main class="container-fluid" id="admin">
    <!-- SIDE BAR -->
    <?php include('../app/includes/admin/sidebar.php'); ?>

    <div class="main-container" id="main-container">
      <div class="top-content">
        <?php include('../app/includes/admin/top-content.php'); ?>
      </div>
      <div class="hr bg-gray500"></div>

      <div class="main-content">
        <div class="collection">
          <div class="add-button">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
              <i class="fas fa-plus"></i>
              <span>ADD NEW SCHEDULE</span>
            </button>

            <!-- ADD Collection Modal -->
            <?php include('../app/includes/admin/modal/addCollectionModal.php'); ?>

          </div>

          <div class="data-table container-fluid">
            <table id="data-table" class="table table-dark table-striped table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Barangay</th>
                  <th>Day</th>
                  <th>Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($row = $result->fetch_assoc()) :;
                  $cID = $row['COLLECTION_ID'];
                  $brgyID = $row['BARANGAY_ID'];
                  $brgyName = $row['BARANGAY_NAME'];
                  $dayID = $row['DAY_ID'];
                  $dayName = $row['DAY_NAME'];
                  $timeID = $row['TIME_ID'];
                  $timeName = $row['TIME_NAME'];
                ?>
                  <tr>
                    <td class="center"><?php echo $cID; ?></td>
                    <td><?php echo $brgyName; ?></td>
                    <td><?php echo $dayName; ?></td>
                    <td class="center"><?php echo $timeName; ?></td>
                    <td class="center">
                      <!-- Button trigger modal -->
                      <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $cID; ?>">
                        <i class="fas fa-edit"></i>
                        <span>EDIT</span>
                      </button>

                      <!-- Modal for EDIT -->
                      <?php include('../app/includes/admin/modal/editCollectionModal.php'); ?>

                      <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $cID; ?>">
                        <i class="fas fa-trash"></i>
                        <span>DELETE</span>
                      </button>

                      <!-- Modal for DELETE -->
                      <?php include('../app/includes/admin/modal/deleteCollectionModal.php'); ?>

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