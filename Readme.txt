#Firstly import the sql file from the prototype.sql file.
DB Name: prototype
Note: There are two tables in the db, dummy_data and users, but only dummy_data is used in this project.
Overview:
    The config.php contains the login details. This system does not have a login system, but admin and standard user can be switched into by manually editing the $_SESSION['isAdmin'] variable in config.php file.
    The dbConnection.php file is used for database connection.
    The EditDelete.php file is used to perform edit and delete functionalities, along with the live search view.
    The footer.php has the footer structure.
    The Handler.php is used to handle the insert, search, edit, delete queries, and performs other functionalities as well.
    The header.php has the header structure.
    The Import.php has the Excel import function(Currently blank, so it is requested to you to add it from the previous project).
    The ImportScripts.php is used to import all the necessary JS.
    The index.php is moreover similar to the EditDelete.php file, but can be accessed by the standard user as well.
    The Insert.php file is used to insert the records.
    ManageAjax.js file is used to handle the user requests with the help of Ajax, its functionalities are linked in with the Handler.php file.
    Modals.php has the various modals.
    SettingsSideBar.php has the sidebar structure of the settings page.
    SettingsSideViewStyle.css is the css file for the SettingsSideBar.php.


