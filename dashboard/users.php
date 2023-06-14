<?php
	include "inc/header.php";
	include "inc/sidebar.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo "<small>Hello " . $admin_name . ", welcome.</small>"; ?>
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <section class="col-lg-12 cxnectedSortable">

                <!-- Map box -->

                <div class="box box-solid bg-blue-gradient">
                    <div class="box-header">
                        <i class="fa fa-list"></i>

                        <h3 class="box-title">Users</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <!-- button with a dropdown -->
                            <!-- <a href="add_product">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm pull-right" style="background-color:orange;color:#fff"><i class="fa fa-plus"></i> Add New
                                        Item</button>
                                </div>
                            </a> -->
                        </div>
                        <!-- /. tools -->
                    </div>
                    <div class="box-footer text-black card text-center">
                        <div class="card-body">
						
                            <div class="table-responsive">
                                <table class="table table-bordered farmers-table" style="width:auto">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email Address</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Shop-No</th>
                                            <th>City</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $cnt =1;
                                        $query_user_list = mysqli_query($cxn, "SELECT * FROM users");
                                        $sn = 1;
                                        while ($fetch_user_details = mysqli_fetch_assoc($query_user_list)) {
										
                                            echo '
												<tr>
                                                <td>'.$sn.'</td>
                                                <td>'.$fetch_user_details['firstname'] . " " . $fetch_user_details['lastname'].'</td>
                                                <td>'.$fetch_user_details['email'].'</td>
                                                <td>'.$fetch_user_details['phone'].'</td>
                                                <td>'.$fetch_user_details['address'].'</td>
                                                <td>'.$fetch_user_details['shop_number'].'</td>
                                                <td>'.$fetch_user_details['city'].'</td>
                                            </tr> 
											';
											 $sn++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>

    <?php
    include "inc/footer.php";
    ?>

    <script>
        $(document).ready(function() {
            $('.farmers-table').DataTable();
        });
    </script>