<?php
session_start();
include('connection.php');
if(strlen($_SESSION['admin-username'])=="")
    {   
    header("Location: admin.php"); 
    }
    else{
	}
	$username=$_SESSION['admin-username'];
	 $sql = "select * from admin where username='$username'"; 
     $result = $con->query($sql);
     $row= mysqli_fetch_array($result);
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Applications Records|Online Student Admission system</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
  <!--DASHBOARD CSS-->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href= "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
     />
<script type="text/javascript">
function deldata(fullname){
if(confirm("ARE YOU SURE YOU WISH TO DELETE " + " " + fullname + " " + " FROM THE LIST?"))
{
return  true;
}
else {return false;}
	 
}

</script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    
<div class="wrapper">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../upload/no_image.jpg" alt="User Image" width="188" height="181" class="img-circle elevation-2"></div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $row['username'];  ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <div class="sidebar">
    
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">&nbsp;</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Applications' Record</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <p>&nbsp;</p>
          <table width="1161" style = 'align : center;'>
            <tr>
              <td width="1155"><div class="card">
                <div class="card-header">
                  <h2>Applications' Record</h2>
                  <h3 class="card-title">&nbsp;</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table width="85%" class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr><th width="3%">#</th>
                        <th width="13%">Fullname</th>
                        <th width="7%">Sex</th>
					    <th width="7%">Board</th>
                        <th width="9%">State</th>
                        <th width="7%">Reg. No.</th>
                        <th width="7%">12th Score</th>
                        <th width="7%">Preparation</th>
						 <th width="8%">Marksheet</th>
                        <th width="8%">Photo</th>
                        <th width="9%">Status</th>
                        <th width="16%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                		<?php 
                      $sql = "SELECT * FROM admission order by date_admission ASC";
                      $result = $con->query($sql);
					  $cnt=1;
                      while($row = $result->fetch_assoc()) { ?>
                      <tr class="gradeX">
					  <td height="47"><div style = 'align="center";'><?php echo $cnt; ?></div></td>
                        <td><div style = 'align="center";'><?php echo $row['fullname']; ?></div></td>
                        <td><div style = 'align="center";'><?php echo $row['sex']; ?></div></td>
                        	<td><div style = 'align="center";'><?php echo $row['board']; ?></div></td>
                        <td><div style = 'align="center";'><?php echo $row['state']; ?></div></td>
                        <td><div style = 'align="center";'><?php echo $row['reg_number']; ?></div></td>
                        <td><div style = 'align="center";'><?php echo $row['baord_score']; ?></div></td>
						 <td><div style = 'align="center";'><?php echo $row['details']; ?></div></td>
                        <td><div style = 'align="center";'><span class="controls"><img src="../<?php echo $row['ssce'];?>"  width="100" height="100" style = 'border="2"'/></span></div></td>
                        <td><div style = 'align="center";'><span class="controls"><img src="../<?php echo $row['photo'];?>"  width="50" height="43" style = 'border="2"' /></span></div></td>
                        <td><?php if(($row['status'])==((1)))
{ ?>
                          <span class="badge badge-primary">Offered Admission</span>
                          <?php } else {?>
                          <span class="badge badge-danger">Admission Not Ready</span>
                        <?php } ?></td>
                        <td><span class="style6">
                          <?php if(($row['status'])==((1)))
{ ?>
<a href="admit_exec.php?id=<?php echo $row['ID'];?>" >Cancel Admission </a> 
                          <?php } else {?>
<a href="admit_exec.php?uid=<?php echo $row['ID'];?>" >Admit </a> 
                         <?php } ?>/
					   <a href="delete-user.php?id=<?php echo $row['ID'];?>" onClick="return deldata('<?php echo $row['fullname']; ?>');">Delete </a>

                     </span></td>
                      </tr>
                      <?php $cnt=$cnt+1;} ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div></td>
            </tr>
          </table>
          <p>
            <!-- /.card -->
          </p>
        </div>
          <!-- /.col -->
    </div>
        <!-- /.row -->
  </div>
      <!-- /.container-fluid --><!-- /.content -->
</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script></section>
</body>
</html>
