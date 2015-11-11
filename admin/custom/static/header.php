<header>
  <div class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">
      <div class="navbar-brand">
         <img src="<?php echo BASE_URL.'static/thimthumb.php?src='.$_global_general->logo.'&h=80&w=80&q=100';?>" alt="logo">
      </div>
      
      <ul class="nav navbar-nav" role="navigation">
        
		<!--
        <li id="id-nav-pages"><a data-toggle="dropdown" href="#">Pages</a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="<?php echo BASE_URL;?>home">Home</a></li>
            <li><a href="<?php echo BASE_URL;?>about/ID">About</a></li>
            <li><a href="<?php echo BASE_URL;?>contact">Contact</a></li>
            <li class="hidden"><a href="<?php echo BASE_URL;?>faq">FAQ</a></li>
          </ul>
        </li>-->
        
        
        <li><a href="<?php echo BASE_URL.'news';?>">News</a></li>
        
        <!--
        <li id="id-nav-news"><a data-toggle="dropdown" href="#">News</a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="<?php echo BASE_URL.'news-category';?>">Category</a></li>
            <li><a href="<?php echo BASE_URL.'news';?>">News</a></li>
          </ul>
        </li>
        -->

      <li><a href="<?php echo BASE_URL.'career';?>">Career</a></li>

	  <li><a href="<?php echo BASE_URL.'contact';?>">Contact</a></li>

      <ul class="nav navbar-nav navbar-right" role="navigation">
        <li id="id-nav-settings"><a data-toggle="dropdown" href="#" style="font-size: 18px; padding: 14px 6px 14px 10px"><span class="glyphicon glyphicon-cog"></span></a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="<?php echo BASE_URL;?>general">General</a></li>
            <!--<li><a href="<?php echo BASE_URL;?>server-info">Server Information</a></li>-->
            <li><a href="<?php echo BASE_URL;?>accounts">Account</a></li>
            <!--<li><a href="<?php echo BASE_URL;?>notifications">Notifications</a></li>
            <li><a href="<?php echo BASE_URL;?>mailchimp">Mailchimp</a></li>
            <li class="disabled"><a>Payments</a></li>
            <li><a href="<?php echo BASE_URL;?>payment-bank">Bank</a></li>
            <li><a href="<?php echo BASE_URL;?>payment-bank-account">Bank Account</a></li>
            <li><a href="<?php echo BASE_URL;?>payment-veritrans">Credit Card</a></li>
            <li><a href="<?php echo BASE_URL;?>payment-paypal">Paypal</a></li>
            <li><a href="<?php echo BASE_URL;?>shipping">Shipping Methods</a></li>-->
            <li><a href="<?php echo BASE_URL;?>logout">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</header>

<input type="hidden" class="form-control" id="id-global-url" value="<?php echo BASE_URL;?>">

<?php
/* --- PHP INI VALUES FOR FILES--- */
echo '<input type="text" class="hidden" id="id-hidden-ini-max-upload" value="'.$ini_max_upload.'">';
echo '<input type="text" class="hidden" id="id-hidden-ini-max-post" value="'.$ini_max_post.'">';
echo '<input type="text" class="hidden" id="id-hidden-ini-memory-limit" value="'.$ini_max_memory_limit.'">';
echo '<input type="text" class="hidden" id="id-hidden-ini-max-file-upload" value="'.$ini_max_file_uploads.'">';
?>