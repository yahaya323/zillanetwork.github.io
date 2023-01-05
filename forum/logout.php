<?php
session_start();
include("includes/config.php");
include('includes/function.php'); 
$_SESSION['sign-in']=="";
session_unset();
session_destroy();

?>
<script language="javascript">
document.location="<?= base_url('../index');?>";
</script>
