

<?php
    if (isset($_SESSION['flash_message'])) {
        echo '<div class="flash-message">' . $_SESSION['flash_message'] . '</div>';
        // Unset the flash message after displaying it
        unset($_SESSION['flash_message']);
    }
  ?>