<?php
require('database.php');
 
// Get category ID
$category_id = filter_input(INPUT_GET, 'videoCategory_id', 
                            FILTER_VALIDATE_INT);
if ($category_id == NULL || $category_id == FALSE) {
    $category_id = 1;
}
 
// Get name for selected category
$queryCategory = 'SELECT * FROM videocategories
                      WHERE videoCategoryID = :videoCategory_id';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':videoCategory_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['videoCategoryName'];
$statement1->closeCursor();
 
// Get all categories
$queryAllCategories = 'SELECT * FROM videocategories
                           ORDER BY videoCategoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();
 
// Get videos for selected category
$queryVideos = 'SELECT * FROM videos
              WHERE videoCategoryID = :videoCategory_id
              ORDER BY videoID';
$statement3 = $db->prepare($queryVideos);
$statement3->bindValue(':videoCategory_id', $category_id);
$statement3->execute();
$videos = $statement3->fetchAll();
$statement3->closeCursor();
?>
 
 <!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>Danny's Videos</title>
    <link rel="stylesheet" type="text/css" href="styles/video.css" />
</head>
<!-- the body section -->
<body>
<main>
        <h6>
            Daniel Escobar Pineda<br>
            IT 202-005<br>
            Semester Project Phase 3<br>
            12/09/2022
         </h6>
    <h1>Video List</h1>
    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <nav>
        <ul>
            <?php foreach ($categories as $category) : ?>
            <li>
                <a href="?videoCategory_id=<?php echo
                   $category['videoCategoryID']; ?>">
                    <?php echo $category['videoCategoryName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>           
    </aside>
 
    <section>
        <!-- display a table of products -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Description</th>
                <th class="right">Price</th>
            </tr>
            <?php foreach ($videos as $video) : ?>
            <tr>
                <td><?php echo $video['videoCode']; ?></td>
                <td><?php echo $video['videoName']; ?></td>
                <td><?php echo $video['description']; ?></td>
                <td class="right"><?php echo 
                                   $video['price']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>    
<footer></footer>
</body>
</html>