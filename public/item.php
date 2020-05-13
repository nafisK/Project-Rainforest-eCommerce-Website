<?php require_once("../resources/config.php"); ?>
<?php include_once(TEMPLATE_FRONT . DS . "header.php") ?>
<div class="container">


    //Displays the item information individually

    <?php include_once(TEMPLATE_FRONT . DS . "catagories.php") ?>
    <?php
    $query = query("SELECT * FROM products WHERE product_id =" . escape_string($_GET['id']) . " ");
    confirm($query);
    //contineous while loop to the end of the file
    while ($row = fetch_array($query)) :
    ?>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-7">
                    <img class="img-responsive" src="../resources/<?php echo display_image($row['product_image']); ?>" alt="">
                </div>
                <div class="col-md-5">
                    <div class="thumbnail">
                        <div class="caption-full">
                            <h4><a href="#"><?php echo  $row['product_title']; ?></a> </h4>
                            <hr>
                            <h4 class=""><?php echo "&#36;" . $row['product_price']; ?></h4>
                            <p><?php echo  $row['short_description']; ?></p>

                            <form action="">
                                <div class="form-group">
                                    <a href="../resources/cart.php?add=<?php echo $row['product_id'] ?>" class="btn btn-primary">Add to Cart</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div role="tabpanel">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <p></p>
                            <p><?php echo  $row['product_description']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>




        </div>
        <div class="container">
            <hr>

            <?php include_once(TEMPLATE_FRONT . DS . "footer.php"); ?>