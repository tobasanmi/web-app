              <?php
              include_once "../darkcode/dbh.php";
               
               
               		$url= $_SERVER['REQUEST_URI'];
 
        if (($msg = strpos($url, "?")) !==FALSE ){
        $msgg = substr($url,$msg+1);
        $message = str_replace(array('%20'), ' ', $msgg);
                
        }else {
        $message = "";
        }
        
        $sqldel = "DELETE FROM sales WHERE sales_id =$message";
                        $resultdel = mysqli_query($conn,$sqldel);
                     
                    ?>
				    <script language="JavaScript" type="text/javascript">
setTimeout("location.href = '../order.php'",0);
</script>