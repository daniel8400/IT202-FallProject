<?php
    require('database.php');
    $query = 'SELECT * FROM customers ORDER BY customerID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement ->fetchAll();
    $statement->closeCursor();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Join Our Mailing List!</title>
        <link rel="stylesheet" href="styles/home.css">
        <script type="text/javascript" language="javascript" src="js/validateForm.js"></script>>
    </head>
    <body>
    <h6>
            Daniel Escobar Pineda<br>
            IT 202-005<br>
            Semester Project Phase 3<br>
            12/09/2022
         </h6>
         <header>
            <img src="images/logo.png" alt="logo" width="100" height="100"/>
            <h1>Join Our Mailing List!</h1>
         </header>
         <main>
            <div class="nav">
                <nav>
                <a href="home.html">Home</a> | <a href="about.html">About</a> | <a href="contact.html">Contact</a> | <a href="movies.html">Movies</a> | <a href="tv.html">TV Shows</a> | <a href="anime.html">Anime</a> | <a href="managerForm.php">Add Videos</a>  
                </nav> 
            </div>

            <form action="add_customer.php" method= "post" id="mailingList">
                <label for="fname">First Name:</label><br>
                <input type="text" name="fname" id="fname" minlength="2" maxlength="25" required><br>
                <label for="lname">Last Name:</label><br>
                <input type="text" name="lname" id="lname" minlength="2" maxlength="25" required><br>
                <label for="email">E-Mail:</label><br>
                <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" id="email" maxlength= "50" required><br>
                <label for="address">Address:</label><br>
                <input type="text" name="address" id="address" minlength="4" maxlength="75" required><br>
                <label for="city">City:</label><br>
                <input type="text" name="city" id="city" minlength="2" maxlength="50" required><br>
                <label for="state">State:</label><br>
                <input type="text" name="State" id="State" size="2" minlength="2" maxlength="2" required><br>
                <label for="zip">Zip Code:</label><br>
                <input pattern="[0-9]{5}" name="zip" id="zip" required><br>
                <label for="reference">How did you hear about us?:</label><br>
                <select name="where" required>
                    <option value="">Choose Option</option>
                    <option>Google Search</option>
                    <option>Friend</option>
                    <option>Yellow Pages</option>
                    <option>Website Advertisement</option>
                 </select> <br>
                 <input type="reset"> <input type="submit"><br>
            </form>

            <div>
                <footer>
                    <p>Copyright &copy; Danny's Videos</p>
                </footer>
             </div>
         </main>
    </body>
</html>