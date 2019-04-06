<?php

$filename = 'friends.txt';
$friendsArray = array();

//Reading names in file + adding them to array
if (file_exists($filename)) {
    $file = fopen($filename, "r");
    while (!feof($file)) {
        $gName = trim((fgets($file)));
        if (strlen($gName) > 0) {
            $friendsArray[] = $gName;
        }
    }
    fclose($file);
}

//Adding name to array
if (isset($_POST['name']) && strlen(trim($_POST['name'])) > 0) {
    $friendsArray[] = $_POST['name'];
}

//Deleting name to array
if (isset($_POST['delete'])) {
    unset($friendsArray[($_POST['delete'])]);
    $friendsArray = array_values($friendsArray);
}

//Appending to file, write content with names in array
if (!empty($friendsArray)) {
    $file = fopen($filename, "w");
    foreach ($friendsArray as $AName) {
        fwrite($file, $AName . PHP_EOL);
    }
    fclose($file);
}

?>

<?php include("header.php"); ?>

<br>

<form action="index.php" method="post">
    Name: <input type="text" name="name">
    <input type="submit">
</form>

<h1>My Best Friends List :</h1>


<form method="post">
    <ul>
        <?php
        $nameFilter = '';
        if (!empty($friendsArray)) {
            $i = 0;
            foreach ($friendsArray as $FName) {
                if (isset($_POST['nameFilter']) && strlen(trim($_POST['nameFilter'])) > 0) {
                    $nameFilter = $_POST['nameFilter'];
                    if (isset($_POST['startingWith']) && $_POST['startingWith'] === 'true') {
                        if ((strpos($FName, $nameFilter) === 0))
                            echo "<li>$FName<button type='submit' name='delete' value='$i'>Delete</button></li>";
                    } else
                        if (strstr($FName, $nameFilter))
                            echo "<li>$FName<button type='submit' name='delete' value='$i'>Delete</button></li>";
                } else
                    echo "<li>$FName<button type='submit' name='delete' value='$i'>Delete</button></li>";
                $i++;
            }
        }
        ?>
    </ul>
</form>


<form action="index.php" method="post">
    <input type="text" name="nameFilter" id="nameFilter" value="<?php echo $nameFilter; ?>"/>
    <input type="checkbox"
           name="startingWith" <?php echo (isset($_POST['startingWith']) && $_POST['startingWith']) ? 'checked' : ''; ?>
           value="true">Only names starting with</input>
    <input type="submit" value="Filter List"/>

</form>

<br>
<br>
<?php include("footer.php"); ?>