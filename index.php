<?php
include 'inc/header.php';

?>
<?php
$name = $email = $feedback = '';
$nameErr = $emailErr = $feedbackErr = '';

if (isset($_POST['submit'])) {
  // Validate input name
  if (empty($_POST['name'])) {
    $nameErr = 'Name is required!';
  } else {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
  }
  // Validate input name
  if (empty($_POST['email'])) {
    $emailErr = 'Email is required!';
  } else {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  }
  // Validate input name
  if (empty($_POST['feedback'])) {
    $feedbackErr = 'Feedback is required!';
  } else {
    $feedback = filter_input(INPUT_POST, 'feedback', FILTER_SANITIZE_SPECIAL_CHARS);
  }

  // SEND
  if (empty($nameErr) && empty($emailErr) && empty($feedbackErr)) {
    // SUCCESS
    $sql = "INSERT INTO feedback (name, email, feedback) VALUES ('$name', '$email', '$feedback')";

    if (mysqli_query($conn, $sql)) {
      header('Location: feedback.php');
    }
  } else {
    // ERORR
    echo mysqli_error($conn);
  }
}



?>


<h2>Feedback</h2>

<p>Leave feedback for Rizeen Media</p>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="mt-4 w-75">
  <div class="d-flex flex-column align-items-left">
    <label for="name" class="form-label mt-4 mb-0">Name</label>
    <input type="text" name="name" id="name" class="form-control <?php echo $nameErr ? 'is-invalid' : null; ?> " placeholder="Enter your Name">
    <div class="invalid-feedback ">
      <?php echo $nameErr ?>
    </div>
  </div>

  <div class="d-flex flex-column align-items-left">
    <label for="email" class="form-label mt-4 mb-0">Email</label>
    <input type="email" name="email" id="email" class="form-control <?php echo $emailErr ? 'is-invalid' : null; ?>" placeholder="Enter your Email">
    <div class="invalid-feedback">
      <?php echo $emailErr ?>
    </div>
  </div>

  <div class="d-flex flex-column align-items-left">
    <label for="feedback" class="form-label mt-4 mb-0">Feedback</label>
    <textarea name="feedback" id="feedback" class="form-control <?php echo $feedbackErr ? 'is-invalid' : null; ?>" placeholder="Enter your Feedback"></textarea>
    <div class="invalid-feedback">
      <?php echo $feedbackErr ?>
    </div>
  </div>

  <div class="d-flex flex-column align-items-left">
    <input type="submit" name="submit" value="Send Feedback" class="btn btn-outline-dark align-self-center w-75 mt-4 mb-0">
  </div>
</form>


<?php
include 'inc/footer.php';
?>