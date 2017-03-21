<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CodeIgniter Shopping Cart</title>
<!-- <link rel="shortcut icon" href=""> -->
<!-- <link rel="icon" href="data:;base64,iVBORw0KGgo="> -->
<!-- <link rel="icon" type="image/png" href="http://www.delagua.org/assets/images/aboutus/contactus/contact-form-icon-blue.png"> -->
<link href="<?php echo base_url(); ?>application/assets/css/core.css" media="screen" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url(); ?>application/assets/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/assets/js/core.js"></script>
</head>
<body>

    <div id="wrap">
 <tr>
        <?php $this->view($content); ?>
</tr>
</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
        <div class="cart_list">
            <h3>Your shopping cart</h3>
            <div id="cart_content">
                <?php echo $this->view('ShoppingCart/cart.php'); ?>
            </div>
        </div>


    </div>

</body>
</html>
