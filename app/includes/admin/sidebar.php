<aside class="sidebar block" id="sidebar">
    <div class="brand">
        <img src="../assets/images/logo/gc_brand.png" alt="site-logo" class="brand-name" />

        <img src="../assets/images/logo/gc_logo.png" alt="site-logo" class="brand-logo" />
    </div>

    <div class="hr bg-gray500"></div>

    <div class="sidebar">
        <a class="<?php if ($title == 'Dashboard') {
                        echo 'active';
                    } ?>" href="index.php">
            <i class="fa fa-home"></i>
            <span>Home</span>
        </a>
        <a class="<?php if ($title == 'Collection') {
                        echo 'active';
                    } ?>" href="collection.php">
            <i class="fas fa-dumpster"></i>
            <span>Collection</span>
        </a>
        <a class="<?php if ($title == 'Barangay') {
                        echo 'active';
                    } ?>" href="barangay.php">
            <i class="fas fa-map-marker-alt"></i>
            <span>Barangay</span>
        </a>
        <a class="<?php if ($title == 'Day') {
                        echo 'active';
                    } ?>" href="day.php">
            <i class="fas fa-calendar-day"></i>
            <span>Day</span>
        </a>
        <a class="<?php if ($title == 'Time') {
                        echo 'active';
                    } ?>" href="time.php">
            <i class="fas fa-hourglass"></i>
            <span>Time</span>
        </a>
    </div>
</aside>