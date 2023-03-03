<?php
    require('database.php');
    $query = 'SELECT * FROM videocategories ORDER BY videoCategoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement ->fetchAll();
    $statement->closeCursor();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Titles</title>
        <link rel="stylesheet" href="styles/home.css">

        <!--<script type="text/javascript" language="javascript" src="js/managerForm.js"></script>-->
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
            <h1>Add Titles</h1>
        </header>
        <main>
            <div class="nav">
                <nav>
                <a href="home.html">Home</a> | <a href="about.html">About</a> | <a href="contact.html">Contact</a> | <a href="movies.html">Movies</a> | <a href="tv.html">TV Shows</a> | <a href="anime.html">Anime</a> | <a href="managerForm.php">Add Videos</a>  
                </nav> 
            </div>

            <form action= "add_video.php" method="post" id="managerForm">
                <label for="genre">Select Genre:</label><br>
                <select name="videoCategory_id" required>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?php echo $category['videoCategoryID']; ?>">
                            <?php echo $category['videoCategoryName']; ?>
                        </option>
                    <?php endforeach; ?>
                 </select> <br>
                <label for="code">Title code:</label><br>
                <input type="text" id="code" name="code" minlength="2" maxlength="10" required><br>
                <label for="tname">Title name:</label><br>
                <input type="text" id="tname" name="tname" minlength="2" maxlength="255" required> <br>
                <label for="tdescription">Title description:</label><br>
                <textarea placeholder="Enter a description" name="tdescription" id="tdescription" rows="5" cols="45" minlength="2" maxlength="255" required></textarea> <br>
                <label for="tprice">Title price:</label><br>
                <input type="text" id="tprice" name="tprice" required> <br>
                <input type="reset"> <input type="submit"><br>

            </form>

            <div id="errors" class="visible">
            </div>    

            <div>
                
                <footer>
                    <p>Copyright &copy; Danny's Videos</p>
             </div>
        </main>
    </body>
</html>