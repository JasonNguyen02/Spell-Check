<?php

include('config/db_connection.php');

$errors = array('brand' => '');

if (isset($_POST['submit'])) {
    echo $_POST['clothing'];
    echo $_POST['color'];
    echo $_POST['brand'];
}

//check brand
if (empty($_POST['brand'])) {
    $errors['brand'] = ' A brand is required <br />';
}

if (array_filter($errors)) {
    //  echo 'errors in the form';    
} else {
    session_start();
    $_SESSION['name'] = $_POST['clothing'];
    echo $_SESSION['name'];

    //echo 'form is valid';
    $clothing = mysqli_real_escape_string($conn, $_POST['clothing']);
    $color = mysqli_real_escape_string($conn, $_POST['color']);
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);

    //Create SQL 
    $sql = "INSERT INTO clothes(clothing, color, brand) VALUES('$clothing', '$color', '$brand')";

    //Save to database and check
    if (mysqli_query($conn, $sql)) {
        //sucess
    } else {
        echo ('query error ') . mysqli_error($conn);
    }
    //Form is valid
    header('Location: main.php');
}
?>

<!DOCTYPE html>
<html>

<?php
// Include Header
include('C:\xampp\htdocs\main\templates\header.php');
?>

<body>
    <section>
        <h4>Adding Clothes</h4>
        <form class='form' action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label>Type of Clothing:</label>
            <select id="clothing" name="clothing">
                <option value="SST">Short Sleeve Tee</option>
                <option value="LST">Long Sleeve Tee</option>
                <option value="Hoodies">Hoodies</option>
                <option value="Jackets">Jackets</option>
                <option value="Shorts">Shorts</option>
                <option value="Pants">Pants</option>
                <option value="Socks">Socks</option>
                <option value="Shoes">Shoes</option>
            </select>
            <br>
            <br>
            <label>Color:</label>
            <select id="color" name="color">
                <option value="white">White</option>
                <option value="black">Black</option>
                <option value="grey">Grey</option>
                <option value="brown">Brown</option>
                <option value="red">Red</option>
                <option value="green">Green</option>
                <option value="purple">Purple</option>
                <option value="blue">Blue</option>
                <option value="mixed">Mixed</option>
            </select>
            <br>
            <br>
            <label>Brand:</label>
            <input type="text" name="brand">
            <br>
            <div class='red-text'> <?php echo $errors['brand']; ?> </div>
            <br>
            <button id='submit'>Submit</button>
        </form>
    </section>

    <?php
    // Include Footer
    include('C:\xampp\htdocs\main\templates\footer.php');
    ?>

</html>