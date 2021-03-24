<?php
define('PAGES_', '../pages/');
session_start();
?>
<pre>
    <?php print_r($_SESSION); ?>
</pre>

<?php
if (empty($_SESSION)) {
    header('Location: ' . PAGES_ . 'login.php?error=unset');
    die();
}
?>

<a href="../plugins/logout.php" title="Logout">Logout</a>
