<?php
require dirname(__FILE__).'/../../../../static/_header.php';

class languageAbout extends HeaderDatabase{
   
   protected $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function get_languages(){
      $sql	= "SELECT * FROM tbl_language";
	  $row	= $this->fetchData('multiple', $sql);
   
      return $row;
   }
   
}

$_get		= new languageAbout();
$language 	= $_get->get_languages();

echo '<select class="form-control" style="margin-bottom: 15px" onChange="changeLanguage()" id="id_custom_select_lang">';
echo '<option value="default">Indonesia</option>';

foreach($language as $language){
  echo '<option value="'.$language->language_code.'">'.$language->language_name.'</option>';
}

echo '</select>';
?>

<script>
function selectOptionLanguage(x){
   
   if(x != ''){
      $('#id_custom_select_lang option[value="'+x+'"]').attr('selected', true);
   }else{
      $('#id_custom_select_lang option[value="default"]').attr('selected', true);
   }

}

selectOptionLanguage('<?php echo $_SESSION['lang_admin'];?>');
	
function changeLanguage(){
   var lang = $('#id_custom_select_lang option:selected').val();
   
   if(lang != "default"){
      location.href = "<?php echo BASE_URL;?>../../../../"+lang+"-about";
   }else{
      location.href = "<?php echo BASE_URL.'about';?>";
   }
   
}
</script>
