              <?php
              include_once "../darkcode/dbh.php";
               
               
               		$url= $_SERVER['REQUEST_URI'];
 
        if (($msg = strpos($url, "?")) !==FALSE ){
        $msgg = substr($url,$msg+1);
        $message = str_replace(array('%20'), ' ', $msgg);
                
        }else {
        $message = "";
        }
        
             	     $sql ="UPDATE sales SET status ='dropped' WHERE id = $message";
      	             mysqli_query($cxn, $sql);
								
				   ?>
				    <script language="JavaScript" type="text/javascript">
setTimeout("location.href = '../order.php'",0);
</script>