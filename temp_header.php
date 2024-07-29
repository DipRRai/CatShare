<?php
session_start();
?>
<link rel="stylesheet" href="css/header.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light navigation_css">
    <a class="navbar-brand nav_component_css_title nav_text" href="index.php">Cats Archive</a>
    <div class="nav_spacer"></div>
    <?php
    if (isset($_SESSION['username'])) {
        echo '<a class="navbar-brand nav_component_css_logout nav_text" href="func_logout.php">Logout</a>';
    } else {
        echo '<a class="navbar-brand nav_component_css_login_register nav_text" href="register.php">Register</a>';
        echo '<a class="navbar-brand nav_component_css_login_register nav_text" href="login.php">Login</a>';
    }
    ?>
</nav>