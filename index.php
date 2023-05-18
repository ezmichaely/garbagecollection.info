<?php include_once("app/config/dbconnect.php"); ?>

<!-- HEAD -->
<?php include('app/includes/homepage/head.php'); ?>

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

// $result = $conn->query($query) or die($conn->error);
$result = mysqli_query($conn, $query);

?>


<body>
  <!-- HEADER -->
  <?php include('app/includes/homepage/header.php'); ?>

  <main class="container" id="index">
    <h3 class="title">GARBAGE COLLECTION SCHEDULE</h3>

    <div class="data-table container-fluid">
      <table id="data-table" class="table table-dark table-striped table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Barangay</th>
            <th>Day</th>
            <th>Time</th>
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
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </main>

  <!-- FOOTER -->
  <?php include('app/includes/homepage/footer.php'); ?>

  <!-- SCRIPT -->
  <?php include('app/includes/homepage/script.php'); ?>

</body>

</html>