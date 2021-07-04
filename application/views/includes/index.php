<?php
$dir = 'ltr';

?>
<!DOCTYPE html>
<html lang="en" dir="<?php echo $dir; ?>">
    <?php $this->load->view('includes/head'); ?>
    <body>
        <?php        
            $this->load->view("includes/header");         
            $this->load->view($requested_view);
            $this->load->view("includes/footer");
        ?>
    </body>
</html>