<?php
    require_once 'config.php';  /*  Including file for login configurations.    */
    require_once 'dbConnection.php';    /*  Including file for database connection.   */
    $website = 'RijuApps';  /*  To indicate website name.   */
    $current_page = ' | Home'; /*  To indicate the current page.   */
    $page_tab = '';    /*  To indicate the current page's active tab.  */
?>
<!doctype html>
<html lang="en">
    <head>
        <title><?php echo $website.$current_page.$page_tab;?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <?php
            require_once "header.php";  //Loading page's header.
        ?>
        <div class="container mt-5 py-5">

            <!--    Search box section  -->
            <div class="jumbotron bg-dark text-light">
                <span class="h2">Search</span><hr class="bg-light">
                <input type="search" class="form-control" id="SearchItem">
                <span class="small text-muted">For test purpose, maximum of 5 records will be displayed.</span>
            </div>

            <!--    Section where our output will be displayed. -->
            <div id="SearchResult"></div>

        </div>
        <?php
            require_once "Modals.php"; //Loading modals.
            require_once "footer.php"; //Loading page's footer.
            require_once "ImportScripts.php";   //Importing required JS files.
        ?>

    </body>
</html>