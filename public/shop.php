<?php require_once("../resources/config.php"); ?>
<?php include_once(TEMPLATE_FRONT . DS . "header.php") ?>
<div class="container">


    <header class="jumbotron hero-spacer">
        <h1>Shop</h1>
    </header>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <h3>Latest Products</h3>
        </div>
    </div>

    <div class="row text-center"> <br>
        <?php get_products_in_shop(); ?>
    </div>
    <hr>
</div>

<?php include_once(TEMPLATE_FRONT . DS . "footer.php"); ?>