<?php
include "../../config/db_conn.php";

$sql = "SELECT * FROM artikel LIMIT 3";

$result = mysqli_query($conn, $sql);

// print_r($result);
// die("here");
?>

<div class="container my-5" style="text-align: left;">
        <h3>Anyeonhaseyo, Mas!</h3>
        <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sapiente aliquid nam perspiciatis, iste voluptatem provident explicabo nisi facilis architecto inventore ad illo dignissimos quisquam nulla eaque vero in tempore.
        </p>
        <button class="btn btn-primary">Learn more</button>
</div>

<div class="container my-5">
        <div class="d-flex resposive justify-content-center">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                        <div style="width: 30%" class="card text-left p-4 mx-3">
                                <img src="<?php echo $row['gambar']; ?>" alt="" class="card-img-top">
                                <div class="card-text">
                                        <h2><?php echo $row['judul']; ?></h2>
                                        <p><?php echo $row['isi']; ?></p>
                                </div>
                                <button class="btn btn-secondary">View Details</button>
                        </div>
                <?php
                }
                ?>
        </div>
</div>