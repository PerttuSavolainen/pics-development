<?php 




if (isset($_POST["amount"])) { 
    $amount = $_POST["amount"];

    $colors = array("#ed1c24", "#f15a24", "#f7931e","#fbb03b");




    for ($i=0;$i<$amount;$i++) {
?>

        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 col-pics of-hidden">
            <div class="img-wrapper-pics">
                
                <img src="img/lift<?php echo rand(1,3) ?>.jpg" class="landscape trans-centered"/>
                <div class="img-info button-pics">
                    <i class="fa fa-download"></i> 54
                    <i class="fa fa-comments"></i> 4

                </div>
            </div>    
        </div>

<?php
    } // for
} // if   
    
?>