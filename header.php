<?php
    require_once "config.php";
?>
<nav class="navbar navbar-expand-sm navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index.php">RijuApps</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId" align="right">
        <ul class="navbar-nav mr-4 mt-2 mt-lg-0 ml-auto">
            <?php
                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true){
            ?>
                <li class="nav-item">
                    <a class="nav-link <?php if($current_page==' | Settings') echo 'active'; ?>" href="import.php">Settings</a>
                </li>
            <?php
                }
            ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="Logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
