<?php
//upload directory
$upload_directory = "uploads";


//Small helping functions to reduce HTML and php code

function last_id()
{
    global $conn;
    return mysqli_insert_id($conn);
}

//set a msg to be displayed
function set_message($msg)
{
    if (!empty($msg)) {
        $_SESSION['message'] = $msg;
    } else {
        $msg = "";
    }
}

//displays the set msg
function display_message()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

//function same as head except you dont need to write Location everytime
function redirect($location)
{
    return header("Location: $location ");
}

//query function shortener
function query($sql)
{
    global $conn;
    return mysqli_query($conn, $sql);
}

//Checks against sql database
function confirm($result)
{
    global $conn;
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($conn));
    }
}

//Protects against sql injection
function escape_string($string)
{
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}

//short form
function fetch_array($result)
{
    return mysqli_fetch_array($result);
}



/*  Main Website Functions */

//gets all products in the index
function get_products()
{


    $query = query(" SELECT * FROM products");
    confirm($query);

    while ($row = fetch_array($query)) {
        $product_image = display_image($row['product_image']);
        $product = <<<DELIMETER
        <div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
            <img src="../resources/{$product_image}" alt="">
            <div class="caption">
                <h3>{$row['product_title']}</h3>
                <p>{$row['short_description']}</p>
                <p>
                    <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!</a> 
                    <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                </p>
            </div>
        </div>
    </div>
DELIMETER;
        echo $product;
    }
}

//gets all categories and prints on the side
function get_catagories()
{
    $query = query("SELECT * FROM catagories");
    confirm($query);
    while ($row = fetch_array($query)) {
        $catagories_links = <<<DELIMETER
<a href='catagory.php?id={$row['catagory_id']}' class='list-group-item'>{$row['catagory_title']}</a>
DELIMETER;
        echo $catagories_links;
    }
}

//gets all products in each category usng category ID via get
function get_products_in_cat_page()
{

    $query = query(" SELECT * FROM products WHERE product_catagory_id = " . escape_string($_GET['id']) . " ");
    confirm($query);
    while ($row = fetch_array($query)) {
        //prints image
        $product_image = display_image($row['product_image']);
        $product = <<<DELIMETER
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="../resources/{$product_image}" alt="">
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                        <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
DELIMETER;
        echo $product;
    }
}


//gets all products in the shop page || same as get_products();
function get_products_in_shop()
{
    $query = query(" SELECT * FROM products");
    confirm($query);
    while ($row = fetch_array($query)) {
        $product_image = display_image($row['product_image']);
        $product = <<<DELIMETER
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="../resources/{$product_image}" alt="">
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <p>{$row['short_description']}</p>
                        <p>
                            <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
DELIMETER;
        echo $product;
    }
}


//logs in user along with error validations
function login_user()
{
    if (isset($_POST['submit'])) {
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);
        $query = query("SELECT * FROM users WHERE user_name = '{$username}' AND password = '{$password}' ");
        confirm($query);
        if (mysqli_num_rows($query) == 0) {
            set_message("Your Password or Username are wrong");
            redirect("login.php");
        } else {
            $_SESSION['username'] = $username;
            redirect("admin");
        }
    }
}


//displays image easily
function display_image($picture)
{
    global $upload_directory;
    return $upload_directory  . DS . $picture;
}

//get all products in admin in a table
function get_products_in_admin()
{
    $query = query("SELECT * FROM products");
    confirm($query);
    while ($row = fetch_array($query)) {
        $catagory = show_product_catagory_title($row['product_catagory_id']);
        $product_image = display_image($row['product_image']);
        $product = <<<DELIMETER
        <tr>
            <td>{$row['product_id']}</td>
            <td>{$row['product_title']}<br>
        <a href="index.php?edit_product&id={$row['product_id']}"><img width='100' src="../../resources/{$product_image}" alt=""></a>
            </td>
            <td>{$catagory}</td>
            <td>{$row['product_price']}</td>
            <td>{$row['product_quantity']}</td>
            <td><a class="btn btn-danger" href="../../resources/templates/back/delete_product.php?id={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
DELIMETER;
        echo $product;
    }
}

//shows products title
function show_product_catagory_title($product_catagory_id)
{
    $catagory_query = query("SELECT * FROM catagories WHERE catagory_id = '{$product_catagory_id}' ");
    confirm($catagory_query);
    while ($catagory_row = fetch_array($catagory_query)) {
        return $catagory_row['catagory_title'];
    }
}

//Add products to the database
function add_product()
{
    if (isset($_POST['publish'])) {
        $product_title          = escape_string($_POST['product_title']);
        $product_catagory_id    = escape_string($_POST['product_catagory_id']);
        $product_price          = escape_string($_POST['product_price']);
        $product_description    = escape_string($_POST['product_description']);
        $short_description            = escape_string($_POST['short_description']);
        $product_quantity       = escape_string($_POST['product_quantity']);
        $product_image          = escape_string($_FILES['file']['name']);
        $image_temp_location    = escape_string($_FILES['file']['tmp_name']);

        //moves image file to uploads for neatness
        move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image);
        $query = query("INSERT INTO products(product_title, product_catagory_id, product_price, product_description, short_description, product_quantity, product_image) VALUES('{$product_title}', '{$product_catagory_id}', '{$product_price}', '{$product_description}', '{$short_description}', '{$product_quantity}', '{$product_image}')");
        $last_id = last_id();
        confirm($query);
        set_message("New Product with id {$last_id} was Added");
        redirect("index.php?products");
    }
}

//prints categories in database in a options tag in the add section
function show_catagories_add_product_page()
{
    $query = query("SELECT * FROM catagories");
    confirm($query);
    while ($row = fetch_array($query)) {
        $catagories_options = <<<DELIMETER
        <option value="{$row['catagory_id']}">{$row['catagory_title']}</option>
DELIMETER;
        echo $catagories_options;
    }
}


//edits/updates products
function update_product()
{

    if (isset($_POST['update'])) {
        $product_title          = escape_string($_POST['product_title']);
        $product_catagory_id    = escape_string($_POST['product_catagory_id']);
        $product_price          = escape_string($_POST['product_price']);
        $product_description    = escape_string($_POST['product_description']);
        $short_description      = escape_string($_POST['short_description']);
        $product_quantity       = escape_string($_POST['product_quantity']);
        $product_image          = escape_string($_FILES['file']['name']);
        $image_temp_location    = escape_string($_FILES['file']['tmp_name']);
        if (empty($product_image)) {
            $get_pic = query("SELECT product_image FROM products WHERE product_id =" . escape_string($_GET['id']) . " ");
            confirm($get_pic);
            while ($pic = fetch_array($get_pic)) {
                $product_image = $pic['product_image'];
            }
        }

        move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image);

        $query = "UPDATE products SET ";
        $query .= "product_title            = '{$product_title}'        , ";
        $query .= "product_catagory_id      = '{$product_catagory_id}'  , ";
        $query .= "product_price            = '{$product_price}'        , ";
        $query .= "product_description      = '{$product_description}'  , ";
        $query .= "short_description        = '{$short_description}'    , ";
        $query .= "product_quantity         = '{$product_quantity}'     , ";
        $query .= "product_image            = '{$product_image}'          ";
        $query .= "WHERE product_id=" . escape_string($_GET['id']);

        $send_update_query = query($query);
        confirm($send_update_query);
        set_message("Product has been updated");
        redirect("index.php?products");
    }
}


//shows categories frrom sql database
function show_catagories_in_admin()
{
    $catagory_query = query("SELECT * FROM catagories");
    confirm($catagory_query);
    while ($row = fetch_array($catagory_query)) {
        $catagory_id = $row['catagory_id'];
        $catagory_title = $row['catagory_title'];
        $catagory = <<<DELIMETER
        <tr>
            <td>{$catagory_id}</td>
            <td>{$catagory_title}</td>
            <td><a class="btn btn-danger" href="../../resources/templates/back/delete_catagory.php?id={$row['catagory_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
DELIMETER;
        echo $catagory;
    }
}

//adds category title to sql
function add_catagory()
{
    if (isset($_POST['add_catagory'])) {
        $catagory_title = escape_string($_POST['catagory_title']);
        if (empty($catagory_title) || $catagory_title == " ") {
            echo "<p class='bg-danger'>THIS CANNOT BE EMPTY</p>";
        } else {
            $insert_cat = query("INSERT INTO catagories(catagory_title) VALUES('{$catagory_title}') ");
            confirm($insert_cat);
            set_message("Catagory Created");
        }
    }
}


//displays all users in database in the backend
function display_users()
{
    $catagory_query = query("SELECT * FROM users");
    confirm($catagory_query);
    while ($row = fetch_array($catagory_query)) {
        $user_id = $row['user_id'];
        $username = $row['user_name'];
        $email = $row['email'];
        $password = $row['password'];
        $user = <<<DELIMETER
        <tr>
            <td>{$user_id}</td>
            <td>{$username}</td>
            <td>{$email}</td>
            <td><a class="btn btn-danger" href="../../resources/templates/back/delete_user.php?id={$row['user_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
DELIMETER;
        echo $user;
    }
}

//adds user to the database
function add_user()
{
    if (isset($_POST['add_user'])) {
        $user_name   = escape_string($_POST['username']);
        $email      = escape_string($_POST['email']);
        $password   = escape_string($_POST['password']);
        $query = query("INSERT INTO users( user_name, email, password) VALUES ('{$user_name}','{$email}','{$password}')");
        confirm($query);
        set_message("USER CREATED");
        redirect("index.php?users");
    }
}
