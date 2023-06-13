add_action('wp_ajax_add_rem_likes', 'add_rem_likes');
  add_action('wp_ajax_nopriv_add_rem_likes', 'add_rem_likes');

	function add_rem_likes()
  {


global $wpdb;

 $ipaddress = $_SERVER['REMOTE_ADDR'];
 Echo "Your IP Address is " . $ipaddress;
 echo "</br>";


 $postid = $_POST['postid'];


// this will get the data from your table
$retrieve_ip = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM wp_liketable WHERE userip = %s", $ipaddress ) );


if($retrieve_ip)
{
   $retrieve_postid = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM wp_liketable WHERE postid = %s", $postid ) );
   if($retrieve_ip && $retrieve_postid)
   {
      
        $wpdb->delete( 'wp_liketable', array( 'postid' => $postid ) );

   	echo "post id exist";
   }
}
else
{
   
$table   = $wpdb->prefix . "liketable";
$result_check = $wpdb->insert( $table, array("userip"  => $ipaddress, "postid" => $postid));
if($result_check){
  echo "successfully inserted.";
}else{
 echo " something gone wrong";
}

}






  }
