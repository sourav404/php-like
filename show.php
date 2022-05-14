<?php
session_start();
if ($_SESSION['user'] == false) {
    header('Location: login.php');
}

include('conn.php');

$sql = "SELECT * FROM posts";
$q = mysqli_query($conn, $sql);



while ($data = mysqli_fetch_assoc($q)) {
    $sql2 = "SELECT * FROM `like` WHERE pid = '$data[id]'";
    $q2 = mysqli_query($conn, $sql2);
    $likeno = mysqli_num_rows($q2);
?>
    <div class="card" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title">Post NO <?= $data['id'] ?></h5>
            <p class="card-text"><?= $data['cont'] ?></p>
            <p class="btn btn-primary " id="like" data-id="<?= $data['id'] ?>">LIKE <?= $likeno; ?></p>
        </div>
    </div>
    <br>
<?php

}
?>