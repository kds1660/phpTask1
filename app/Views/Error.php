<p>Oops, this is the error page.</p>

<p>Looks like something went wrong.</p>

<?php
if (isset($errorDb)) {
    echo "<div class='alert alert-danger'>Error connect (" .$errorDb . ")</div>";
}