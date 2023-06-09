<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: ../index.php');
}
$con = new mysqli('localhost', 'root', '', 'crm');
$data = $con->query('select * from admin');
$lead = $con->query('select * from leads')->fetch_assoc();

if (isset($_POST['name'])) {
  $admin = $_POST['admin_id'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $company = $_POST['company_name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $district = $_POST['district'];
  $upazilla = $_POST['upazilla'];
  $status = $_POST['status'];

  $query = "INSERT INTO leads (admin_id, name, address, company_name, phone, email,district,upazilla,status)VALUES('$admin','$name','$address','$company','$phone','$email','$district','$upazilla','$status')";
  $con->query($query);
  header('Location: leads.php');
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <link rel="stylesheet" href="./plugins/summernote/summernote-bs4.min.css">

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">


      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>


        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <?php
    require('menu.php');
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Starter Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Starter Page</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">


              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="m-0">Update Marketing </h5>
                </div>
                <div class="card-body">


                  <form action="leades_update.php?id=<?php echo $lead['id'] ?>" method="post">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Marketing Manager</label>
                            <select name="admin_id" id="admin_id" class="form-control">

                              <?php while ($d = $data->fetch_assoc()) { ?>
                                <option value="<?php echo $d['id'] ?>"><?php echo $d['name'] ?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Name </label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $lead['name'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $lead['address'] ?>">
                          </div>


                          <div class="form-group">
                            <label for="exampleInputEmail1">Company_name</label>
                            <input type="text" name="company_name" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $lead['company_name'] ?>">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">phone </label>
                            <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $lead['phone'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $lead['email'] ?>">
                          </div>

                          <div class="form-group" id="parent">
                            <!-- <label for="exampleInputEmail1">Parent </label>
                        <input type="text" name="parent" class="form-control" id="exampleInputEmail1" placeholder="" > -->
                          </div>

                        </div>
                        <div class="col-6">

                          <div class="form-group">
                            <label for="exampleInputEmail1">District</label>
                            <input type="text" name="district" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $lead['district'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Upazilla</label>
                            <input type="text" name="upazilla" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $lead['upazilla'] ?>">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>
                            <select name="status" id="status" class="form-control" value="<?php echo $lead['status'] ?>">
                              <option value="pending">Pending</option>
                              <option value="contact">Contact</option>
                              <option value="aggrement">Aggrement</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1"></label>
                            <input type="submit" class="btn btn-primary btn-block" value="Save">
                          </div>
                        </div>
                      </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">

                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->

          </div>
          <!-- /.row -->

          <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
          <h5>Title</h5>
          <p>Sidebar content</p>
        </div>
      </aside>
      <!-- /.control-sidebar -->

      <!-- Main Footer -->
      <!-- <footer>
  
  </footer>
</div> -->
      <!-- ./wrapper -->

      <!-- REQUIRED SCRIPTS -->

      <!-- jQuery -->
      <script src="../plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- AdminLTE App -->
      <script src="../dist/js/adminlte.min.js"></script>
      <script src="../plugins/summernote/summernote-bs4.min.js"></script>
      <script>
        $(function() {
          // Summernote
          $('.summernote').summernote()

          // CodeMirror
          CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
          });
        })
        $(document).ready(function() {
          $('#role').change(function() {
            let role = $(this).val();

            $.ajax({
              url: 'getUser.php',
              dataType: 'json',
              method: 'post',
              data: {
                role: role
              },
              success: function(data) {
                let ht = `<label for="exampleInputEmail1">Superior </label>
                    <select name="parent"  class="form-control">`
                data.forEach(function(d) {
                  ht += `<option value="${d.id}">${d.name}</option>`
                })
                ht += `</select>`
                $('#parent').html(ht)
              }
            })
          })
        })
      </script>
</body>

</html>