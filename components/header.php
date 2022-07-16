<?php
    session_start();
?>
<a class="sidebar-toggle js-sidebar-toggle">
    <i class="hamburger align-self-center"></i>
</a>
<p style="padding-top: 20px;">Olá <strong><?php echo $_SESSION['usuario'] ?></strong></p>