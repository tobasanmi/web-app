           <!DOCTYPE html>
           <html lang="en">

           <head>
               <meta charset="utf-8">
               <meta http-equiv="X-UA-Compatible" content="IE=edge">
               <meta name="viewport" content="width=device-width, initial-scale=1">
               <meta name="description" content="">
               <meta name="author" content="">

               <title>Advernet</title>

               <!-- Bootstrap Core css -->
               <link href="css/bootstrap.min.css" rel="stylesheet">

               <!-- MetisMenu css -->
               <link href="css/metisMenu.min.css" rel="stylesheet">

               <!-- Timeline css -->
               <link href="css/timeline.css" rel="stylesheet">

               <!-- Custom css -->
               <link href="css/startmin.css" rel="stylesheet">

               <!-- Morris Charts css -->
               <link href="css/morris.css" rel="stylesheet">

               <!-- Custom Fonts -->
               <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">


           </head>

           <body>

               <div id="wrapper">

                   <!-- Navigation -->
                   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                       <div class="navbar-header">
                           <a class="navbar-brand" href="index.html">Advanet</a>
                       </div>

                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                           <span class="sr-only">Toggle navigation</span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                       </button>

                       <ul class="nav navbar-nav navbar-left navbar-top-links">
                           <li><a href="#" style="float:right;"><i class="fa fa-home fa-fw"></i> Website</a></li>
                       </ul>

                       <ul class="nav navbar-right navbar-top-links">


                       </ul>
                       <!-- /.navbar-top-links -->

                       <div class="navbar-default sidebar" role="navigation">
                           <div class="sidebar-nav navbar-collapse">
                               <ul class="nav" id="side-menu">

                                   <li><a href="index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
                                   <li><a href="addpower.php"><i class="fa fa-shopping-cart fa-fw"></i> Add Click Power</a></li>
                                   <li><a href="how.php"><i class="fa fa-wrench fa-fw"></i> How It Works</a></li>
                                   <li><a href="cashout.php"><i class="fa fa-credit-card fa-fw"></i> Request Cash-Out</a></li>
                                   <li><a href="cashouthistory.php"><i class="fa fa-list fa-fw"></i> Cash-Out History</a></li>
                                   <li><a href="about.html"><i class="fa fa-group fa-fw"></i> About Us</a> </li>
                                   <li><a href="contact.php"><i class="fa fa-envelope fa-fw"></i> Contact Us</a></li>
                                   <li><a href="signout.php"><i class="fa  fa-sign-out fa-fw"></i> Log Out</a></li>
                               </ul>
                           </div>
                       </div>
                   </nav>

                   <div class="container" style="width:99%">
                       <div class="row">
                           <div class="col-md-4 col-md-offset-4">
                               <div class="login-panel panel panel-default">
                                   <div class="panel-heading">
                                       <h3 class="panel-title"><b style="color:deepskyblue">Cash-Out History:</b></h3>
                                   </div>
                                   <div class="panel-body">
                                       <div class="chat">
                                           <?php

                                            $sql = "SELECT * FROM cashouthistory WHERE userID ='$userID' ORDER BY rtime DESC ";
                                            $result = mysqli_query($cxn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $time = time_ago($row['rtime']);

                                                echo '

                                           <li class="right clearfix">
                                           <div>
                                               <div class="header">
                                                  <small class=" text-muted">
                                                  <i class="fa fa-clock-o fa-fw"></i>' . $time . '
                                                  </small>
                                                  <small class=" text-muted" style="float:right; color:#004B78">
                                                  &#8358; <b> ' . $row['amount'] . '</b>
                                                  </small>
                                               </div>
                                                  <p>
                                                    <span class=" text-muted">Account Name: </span>' . $row['acctname'] . '
                                                  </p>
                                                  <p>
                                                  <span class=" text-muted">Account Number: </span>' . $row['acctnum'] . '
                                                </p>
                                                <p>
                                                <span class=" text-muted">Bank: </span>' . $row['bank'] . ' <span class=" text-muted" style="float:right">Status: <b style="color:green">Success <i class="fa fa-check-circle" style="font-size:20px"></i></b></span>
                                              </p>
                                                
                                            </div>
                                         </li>
                                           ';
                                            }

                                            ?>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>




               </div>
               <!-- /.panel-body -->
               </div>
               <!-- /.panel .chat-panel -->
               </div>

               <!-- jQuery -->
               <script src="js/jquery.min.js"></script>

               <!-- Bootstrap Core JavaScript -->
               <script src="js/bootstrap.min.js"></script>

               <!-- Metis Menu Plugin JavaScript -->
               <script src="js/metisMenu.min.js"></script>

               <!-- Morris Charts JavaScript -->
               <script src="js/raphael.min.js"></script>
               <script src="js/morris.min.js"></script>
               <script src="js/morris-data.js"></script>

               <!-- Custom Theme JavaScript -->
               <script src="js/startmin.js"></script>
               <script>
                   function notif(id) {
                       alert(id);

                   };
               </script>

           </body>

           </html>