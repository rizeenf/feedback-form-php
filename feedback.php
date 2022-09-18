<?php
include 'inc/header.php';
?>

<?php
$sql = 'SELECT * FROM feedback';
$result = mysqli_query($conn, $sql);
$feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>



<h2>Feedbacks</h2>

<?php if (empty($feedback)) : ?>
  <p class="lead"> There is no feedback</p>
<?php endif; ?>

<?php foreach ($feedback as $feeds) : ?>
  <div class="card my-2 mt-4 w-75">
    <div class="card-body text-center">
      <?php echo $feeds['feedback'] ?>
      <div class="text-secondary">
        <?php echo 'By ' . $feeds['name'] . ' on ' . $feeds['date'] ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<?php
include 'inc/footer.php';
?>