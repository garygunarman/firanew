<?php
/*
# ----------------------------------------------------------------------
# HEADER: LANGUAGE
# ----------------------------------------------------------------------
*/
if(isset($_SESSION['dual-language'])){
   $_SESSION['dual-language']	= $_SESSION['dual-language'];
   
}else{
   $_SESSION['dual-language'] 	= 'ID';
   
}



if($_SESSION['dual-language'] === 'ID'){
   /*
   # ----------------------------------------------------------------------
   # NAVBAR
   # ----------------------------------------------------------------------
   */
   $var_navbar_login	= 'Masuk';
   $var_navbar_logout	= 'Keluar';
   $var_navbar_join		= 'Daftar';
   $var_navbar_account	= 'Akun Saya';
   $var_navbar_confirm	= 'Konfirmasi Pembayaran';
   
   $var_navbar_menu_product	= 'Produk';
   $var_navbar_menu_recipes	= 'Resep';
   $var_navbar_menu_news	= 'Berita';
   $var_navbar_menu_article	= 'Artikel';
   $var_navbar_menu_gallery	= 'Galeri';
   $var_navbar_menu_bag		= 'Keranjang Belanja';
   
   $var_navbar_mini_cart_view	= 'Lihat Keranjang';
   $var_navbar_mini_cart_none	= 'Tidak ada produk';
   
   
   /*
   # ----------------------------------------------------------------------
   # REGISTER
   # ----------------------------------------------------------------------
   */
   $var_navbar_register_heading				= 'Pelanggan Baru';
   $var_navbar_register_subheading			= "Jika anda pelnggan baru, silahkan mendaftar untuk mempercepat proses belanja.";
   $_var_navbar_register_email_help			= 'Kami akan mengirimkan konfirmasi order ke alamat e-mail ini';
   $_var_navbar_register_newsletter_note	= 'Kirimi saya promo dan info menarik dari '.$_global_general->website_title;
   $_var_navbar_register_button				= 'Buat Akun';
   $_var_navbar_register_login_heading		= 'Sudah Punya Akun?';
   $_var_navbar_register_login_button		= 'Masuk Disini';
   
   
   /*
   # ----------------------------------------------------------------------
   # LOGIN
   # ----------------------------------------------------------------------
   */
   $var_navbar_login_heading			= 'Masuk';
   $var_navbar_login_subheading			= "Untuk pengalaman belanja yang lebih cepat dan nyaman.";
   $_var_navbar_login_forgot_note		= 'Lupa password?';
   $_var_navbar_login_login_heading		= 'Punya akun?';
   $_var_navbar_login_button			= 'Masuk';
   $_var_navbar_login_back_button		= 'Kembali';
   $_var_navbar_login_register_heading	= 'Baru di '.$_global_general->website_title.'?';
   $_var_navbar_login_register_button	= 'Lanjut';
   
   
   /*
   # ----------------------------------------------------------------------
   # CONFIRM PAYMENT
   # ----------------------------------------------------------------------
   */
   $var_navbar_confirm_heading			= 'Konfirmasi Pembayaran';
   $var_navbar_confirm_subheading		= 'Khusus pembayaran melalui bank transfer';
   $var_navbar_confirm_label_amount		= 'Jumlah';
   $var_navbar_confirm_label_name		= 'Nama Pemegang Akun';
   $var_navbar_confirm_label_bank		= 'Kepada';
   $var_navbar_confirm_btn_confirm		= 'Konfirmasi Pembayaran';
   
   
   /*
   # ----------------------------------------------------------------------
   # FOOTER
   # ----------------------------------------------------------------------
   */
   $var_navbar_footer_support			= 'Bantuan';
   $var_navbar_footer_site				= 'Halaman';
   $var_navbar_footer_site_about		= 'Tentang Kami';
   $var_navbar_footer_site_contact		= 'Kontak';
   $var_navbar_footer_site_help			= 'Bantuan';
   $var_navbar_footer_shop				= 'Toko';
   $var_navbar_footer_newsletter_note	= 'Berlangganan newsletter '.$_global_general->website_title.' untuk mendapatkan berita-berita terbaru';
   $var_navbar_footer_newsletter_note_alt  = 'Daftar milis '.$_global_general->website_title;
   $var_navbar_footer_terms				= 'Syarat &amp; Ketentuan';
   $var_navbar_footer_privacy			= 'Kebijakan Privasi';


   /*
   # ----------------------------------------------------------------------
   # RECIPES
   # ----------------------------------------------------------------------
   */
   $var_recipes_page_title			= 'Resep';
   $var_recipes_breadcrumbs_main	= 'Beranda';
   $var_recipes_breadcrumbs_news	= 'Resep';
   $var_recipes_category			= 'Kategori';
   $var_recipes_categories			= 'Semua Kategori';


   /*
   # ----------------------------------------------------------------------
   # NEWS
   # ----------------------------------------------------------------------
   */
   $var_news_index_page_title		= 'Berita';
   $var_news_index_breadcrumbs_main	= 'Beranda';
   $var_news_index_breadcrumbs		= 'Berita';


   /*
   # ----------------------------------------------------------------------
   # ARTICLE
   # ----------------------------------------------------------------------
   */
   $var_articles_page_title			= 'Artikel';
   $var_articles_breadcrumbs_main	= 'Beranda';
   $var_articles_breadcrumbs		= 'Artikel';


   /*
   # ----------------------------------------------------------------------
   # MY ACCOUNT
   # ----------------------------------------------------------------------
   */
   $var_account_heading			= 'Akun Saya';
   $var_account_subheading		= 'Halo '.$_global_user->user_first_name.', opsi diabawah adalah hal-hal yang dapat dilakukan dengan akun anda.';
   $var_account_order_history	= 'Histori Order';
   $var_account_confirm			= 'Konfirmasi Pembayaran';
   $var_account_account			= 'Detail Akun';
   $var_account_shipping		= 'Alamat Pengiriman';


   /*
   # ----------------------------------------------------------------------
   # ORDER HISTORY
   # ----------------------------------------------------------------------
   */
   $var_history_date			= 'Tanggal';
   $var_history_amount			= 'Jumlah';
   $var_history_payment			= 'Status Pembayaran';
   $var_account_fulfillment		= 'Status Pesanan';


   /*
   # ----------------------------------------------------------------------
   # ORDER HISTORY: DETAIL
   # ----------------------------------------------------------------------
   */
   $var_history_heading					= 'Detail Order';
   $var_history_datestamp				= 'Di order pada ';
   $var_history_heading_ship_address	= 'Alamat Pengiriman';
   $var_history_heading_ship_method		= 'Metode Pengiriman';
   $var_history_heading_paid_method		= 'Metode Pembayaran';
   $var_history_heading_paid_summary	= 'Ringkasan';
   
   

}else if($_SESSION['dual-language'] === 'EN'){
   /*
   # ----------------------------------------------------------------------
   # NAVBAR
   # ----------------------------------------------------------------------
   */
   $var_navbar_login	= 'Login';
   $var_navbar_logout	= 'Logout';
   $var_navbar_join		= 'Join';
   $var_navbar_account	= 'My Account';
   $var_navbar_confirm	= 'Confirm Payment';
   
   $var_navbar_menu_product	= 'Product';
   $var_navbar_menu_recipes	= 'Recipes';
   $var_navbar_menu_news	= 'News';
   $var_navbar_menu_article	= 'Articles';
   $var_navbar_menu_gallery	= 'Gallery';
   $var_navbar_menu_bag		= 'My Bag';
   
   $var_navbar_mini_cart_view	= 'View Bag';
   $var_navbar_mini_cart_none	= 'No item(s)';
   
   
   /*
   # ----------------------------------------------------------------------
   # REGISTER
   # ----------------------------------------------------------------------
   */
   $var_navbar_register_heading				= 'New Customer';
   $var_navbar_register_subheading			= "If you're a new customer, please sign up using the form below for faster checkout.";
   $_var_navbar_register_email_help			= 'We will send your order confirmation here.';
   $_var_navbar_register_newsletter_note	= 'Subscribe to '.$_global_general->website_title.' newsletter to stay up to date with our latest news.';
   $_var_navbar_register_newsletter_note  = 'Subscribe to '.$_global_general->website_title.' mailing list.';
   $_var_navbar_register_button				= 'Create Account';
   $_var_navbar_register_login_heading		= 'Have an Account?';
   $_var_navbar_register_login_button		= 'Login Here';
   
   
   /*
   # ----------------------------------------------------------------------
   # LOGIN
   # ----------------------------------------------------------------------
   */
   $var_navbar_login_heading			= 'Sign In';
   $var_navbar_login_subheading			= "Simply for your faster and easier shopping experience.";
   $_var_navbar_login_forgot_note		= 'Forgot password?';
   $_var_navbar_login_login_heading		= 'Have an Account?';
   $_var_navbar_login_button			= 'Sign In';
   $_var_navbar_login_back_button		= 'Back';
   $_var_navbar_login_register_heading	= 'New Customer?';
   $_var_navbar_login_register_button	= 'Next';
   
   
   /*
   # ----------------------------------------------------------------------
   # CONFIRM PAYMENT
   # ----------------------------------------------------------------------
   */
   $var_navbar_confirm_heading			= 'Confirm Payment';
   $var_navbar_confirm_subheading		= 'For bank transfer only';
   $var_navbar_confirm_label_amount		= 'Amount Paid';
   $var_navbar_confirm_label_name		= 'Bank Account Name';
   $var_navbar_confirm_label_bank		= 'Paid to';
   $var_navbar_confirm_btn_confirm		= 'Confirm Payment';
   
   
   /*
   # ----------------------------------------------------------------------
   # FOOTER
   # ----------------------------------------------------------------------
   */
   
   $var_navbar_footer_support			= 'Support';
   $var_navbar_footer_site				= 'Site';
   $var_navbar_footer_site_about		= 'About';
   $var_navbar_footer_site_contact		= 'Contact';
   $var_navbar_footer_site_help			= 'Help';
   $var_navbar_footer_shop				= 'Shop';
   $var_navbar_footer_newsletter_note	= 'Subscribe to '.$_global_general->website_title.' newsletter to stay up to date with our latest news.';
   $var_navbar_footer_terms				= 'Terms &amp; Conditions';
   $var_navbar_footer_privacy			= 'Privacy Policy';


   /*
   # ----------------------------------------------------------------------
   # RECIPES
   # ----------------------------------------------------------------------
   */
   $var_recipes_page_title			= 'Recipes';
   $var_recipes_breadcrumbs_main	= 'Home';
   $var_recipes_breadcrumbs_news	= 'Recipes';
   $var_recipes_category			= 'Categories';
   $var_recipes_categories			= 'All Category';


   /*
   # ----------------------------------------------------------------------
   # NEWS
   # ----------------------------------------------------------------------
   */
   $var_news_index_page_title		= 'News';
   $var_news_index_breadcrumbs_main	= 'Home';
   $var_news_index_breadcrumbs		= 'News';


   /*
   # ----------------------------------------------------------------------
   # ARTICLE
   # ----------------------------------------------------------------------
   */
   $var_articles_page_title			= 'Article';
   $var_articles_breadcrumbs_main	= 'Home';
   $var_articles_breadcrumbs		= 'Article';


   /*
   # ----------------------------------------------------------------------
   # MY ACCOUNT
   # ----------------------------------------------------------------------
   */
   $var_account_heading			= 'My Account';
   $var_account_subheading		= 'Hello '.$_global_user->user_first_name.', here are a couple of things you can do in your account.';
   $var_account_order_history	= 'Order History';
   $var_account_confirm			= 'Confirm Payment';
   $var_account_account			= 'Account Details';
   $var_account_shipping		= 'Shipping Details';


   /*
   # ----------------------------------------------------------------------
   # ORDER HISTORY
   # ----------------------------------------------------------------------
   */
   $var_history_date			= 'Date';
   $var_history_amount			= 'Amount';
   $var_history_payment			= 'Payment Status';
   $var_account_fulfillment		= 'Fulfillment Status';


   /*
   # ----------------------------------------------------------------------
   # ORDER HISTORY: DETAIL
   # ----------------------------------------------------------------------
   */
   $var_history_heading					= 'Order Details';
   $var_history_datestamp				= 'Ordered on ';
   $var_history_heading_ship_address	= 'Shipping Address';
   $var_history_heading_ship_method		= 'Shipping Method';
   $var_history_heading_paid_method		= 'Payment Method';
   $var_history_heading_paid_summary	= 'Summary';
   
}
?>