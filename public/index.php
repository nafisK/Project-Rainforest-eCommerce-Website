<?php require_once("../resources/config.php"); ?>
<?php include_once(TEMPLATE_FRONT . DS . "header.php") ?>


/*
Main Page of the Website
*/
<div class="container">
    <div class="row">
        <!-- Catagories code here -->
        <?php include_once(TEMPLATE_FRONT . DS . "catagories.php") ?>
        <div class="col-md-9">
            <div class="row carousel-holder">
                <div class="col-md-12">
                    <?php include_once(TEMPLATE_FRONT . DS . "slider.php") ?>
                </div>
            </div>
            <div class="row">
                <?php get_products(); ?>
            </div>
            <!--ROW ENDS HERE-->
        </div>
    </div>
</div>


<?php include_once(TEMPLATE_FRONT . DS . "footer.php"); ?>