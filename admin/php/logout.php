<?php
session_start();
session_destroy();
if(!isset($_SESSION['username']))
{
echo "<script>window.open('../index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
echo "<script>window.open('../index.php','_self')</script>";

?>
<?php } ?>