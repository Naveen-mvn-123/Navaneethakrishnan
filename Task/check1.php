<?php
if (isset($_GET['success'])) {
  if ($_GET['success'] == 'true') {
    echo '<div class="alert alert-success" role="alert">Profile updated successfully!</div>';
  } else {
    echo '<div class="alert alert-danger" role="alert">Failed to update profile.</div>';
  }
}
?>
