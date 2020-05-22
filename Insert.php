<?php
    require_once 'config.php';  /*  Including file for login configurations.    */
    require_once 'dbConnection.php';    /*  Including file for database connection.   */
    $website = 'RijuApps';  /*  To indicate website name.   */
    $current_page = ' | Settings'; /*  To indicate the current page.   */
    $page_tab = ' | Insert';    /*  To indicate the current page's active tab.  */
    if(!$_SESSION['isAdmin'])
        header("Location: index.php");
?>
<!doctype html>
<html lang="en">
<head>
    <title><?php echo $website.$current_page.$page_tab;?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="SettingsSideViewStyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body onload="pullNewId()">
    <?php
        require_once "header.php";  //Loading page's header.
        require_once "SettingsSideBar.php"; //Importing side bar.
    ?>
    <div class="container mt-5 py-5">
        <div class="jumbotron">
            <p class="h2">Insert</p><hr>
            <label for = "insert_person_id" class="form-group h4">ID</label>
            <input id = "insert_person_id" class="form-group form-control" type="text" disabled>
            <label for = "insert_person_name" class="form-group h4">Name</label>
            <input id = "insert_person_name" class="form-group form-control" placeholder="Enter name here." type="text">
            <button id="insertRecord" onclick="insertRecord();" class="btn btn-primary" id="insertRecord">Insert</button>
        </div>
    </div>
    <?php
        require_once "Modals.php"; //Loading modals.
        require_once "footer.php"; //Loading page's footer.
        require_once "ImportScripts.php";   //Importing required JS files.
    ?>
</body>
</html>