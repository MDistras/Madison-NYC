
<?php 
$title  = get_sub_field('title');
$text   = get_sub_field('text');
$image  = get_sub_field('image');
$side   = get_sub_field('side');
?>
<div class="container section ">
    <div class="row">
        <?php if($side == 'left'){ ?>
            <div class="col-12 col-sm-6" data-aos="fade-right">
                    <h3><?php echo $title; ?></h3>
                    <p><?php echo $text; ?></p>
            </div>

            <div class="col-12 col-sm-6" data-aos="fade-left">
                <img src="<?php echo $image; ?>">
            </div>
        <?php }else{ ?>
            <div class="col-12 col-sm-6" data-aos="fade-right">
                <img src="<?php echo $image; ?>">
            </div>
            <div class="col-12 col-sm-6" data-aos="fade-left">
                    <h3><?php echo $title; ?></h3>
                    <p><?php echo $text; ?></p>
            </div>


       
        <?php } ?>
        
    </div>
   
   
</div>