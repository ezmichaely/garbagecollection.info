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
<?php $title = 'Dashboard'; ?>
<?php include('../app/includes/admin/head.php'); ?>

<?php
$queryCol = "SELECT COUNT(*) FROM collection";
$queryBrgy = "SELECT COUNT(*) FROM barangay";
$queryDay = "SELECT COUNT(*) FROM day";
$queryTime = "SELECT COUNT(*) FROM time";

$resultCol = mysqli_query($conn, $queryCol);
$rowCol = mysqli_fetch_array($resultCol);

$resultBrgy = mysqli_query($conn, $queryBrgy);
$rowBrgy = mysqli_fetch_array($resultBrgy);

$resultDay = mysqli_query($conn, $queryDay);
$rowDay = mysqli_fetch_array($resultDay);

$resultTime = mysqli_query($conn, $queryTime);
$rowTime = mysqli_fetch_array($resultTime);

$totalCol = $rowCol[0];
$totalBrgy = $rowBrgy[0];
$totalDay = $rowDay[0];
$totalTime = $rowTime[0];
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
        <div class="dashboard">
          <div class="collection-schedule-count card">
            <h5 class="card-header">
              <i class="fas fa-dumpster"></i>
              <span>Collection Schedule</span>
            </h5>
            <div class="card-body">
              <p class="card-text"><?php echo $totalCol; ?></p>
            </div>
          </div>

          <div class="barangay card">
            <h5 class="card-header">
              <i class="fas fa-map-marker-alt"></i>
              <span>Barangay</span>
            </h5>
            <div class="card-body">
              <p class="card-text"><?php echo $totalBrgy; ?></p>
            </div>
          </div>

          <div class="day card">
            <h5 class="card-header">
              <i class="fas fa-calendar-day"></i>
              <span>Days</span>
            </h5>
            <div class="card-body">
              <p class="card-text"><?php echo $totalDay; ?></p>
            </div>
          </div>

          <div class="time card">
            <h5 class="card-header">
              <i class="fas fa-hourglass"></i>
              <span>Time</span>
            </h5>
            <div class="card-body">
              <p class="card-text"><?php echo $totalTime; ?></p>
            </div>
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