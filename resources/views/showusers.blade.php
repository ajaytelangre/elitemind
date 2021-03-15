

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Elite Mind</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="scss/style.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('navbar')
          
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         

          <!-- Content Row -->
          <div class="row">

                              <!-- Page Heading -->
                                <div class="col-md-12"><h2>Registerd User</h2></div>
                              <!-- Page Heading End -->
                            

                              @if(Session::has("message"))
                               <div class="col-md-12 text-danger"><h6>{{Session::get('message')}}</h6></div>
                              @endif

                              @if(Session::has("success"))
                               <div class="col-md-12 text-success"><h6>{{Session::get('success')}}</h6></div>
                              @endif

                            <!-- Add user Modal Button -->
                            <div class="col-md-3 mt-1">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add User</button>

                                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <form action="{{url('/register_user')}}" method="post" >
                                            @csrf
                                            <div class="modal-body">
                                             
                                                <div class="form-group">
                                                  <input type="text" class="form-control" name="name" placeholder="Full Name" id="recipient-name">
                                                </div>
                                                <div class="form-group">
                                                  <input type="text" class="form-control" name="mobile" placeholder="Mobile No" id="recipient-name">
                                                </div>
                                                <div class="form-group">
                                                  <input type="text" class="form-control" name="email" placeholder="Email" id="recipient-name">
                                                </div>
                                                <div class="form-group">
                                                  <input type="text" class="form-control" name="password" placeholder="Password" id="recipient-name">
                                                </div>
                                                <div class="form-group">
                                                  <input type="text" class="form-control" name="confirm_password" placeholder="Confirm Password" id="recipient-name">
                                                </div>
                                                <div class="form-group">
                                                  <input type="text" class="form-control" name="address" placeholder="Address" id="recipient-name">
                                                </div>
                                                <div class="form-group">
                                                  <input type="text" class="form-control" name="dob" placeholder="Date of Birth" id="recipient-name">
                                                </div>
                                                <div class="form-group">
                                                  <input type="text" class="form-control" name="profession" placeholder="Profession" id="recipient-name">
                                                </div>
                                                <div class="form-group">
                                                  <input type="text" class="form-control" name="qualification" placeholder="Qualification" id="recipient-name">
                                                </div>
                                             
                                            </div>
                                           
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                              </div>
                            <!-- Add user Modal Button End -->

                            @if ($errors->any())
                                <div class="text-danger" alert-danger”>
                                <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                              </div>
                              @endif
                            
                           
    </div>
         <!-- Show Users table -->
      <div class="row">
        <div class="col-lg-12">
          <table class="table mt-3">
                                          <thead class="bg-primary text-white">
                                            <tr>
                                              <th scope="col">Name</th>
                                              <th scope="col">Mobile</th>
                                              <th scope="col">Email</th>                                                                                    
                                              <th scope="col">Address</th>
                                              <th scope="col">DOB</th>
                                              <th scope="col">Profession</th>
                                              <th scope="col">Qualification</th>
                                              <th scope="col">Date of Join</th>
                                              <th scope="col">Action</th>

                                            </tr>
                                          </thead>
                                        <tbody>
                                        @foreach($users as $us)
                                        <tr>
                                        <td>{{$us->username}}</td>
                                        <td>{{$us->phone}}</td>
                                        <td>{{$us->email}}</td>                                     
                                        <td>{{$us->address}}</td>
                                        <td>{{$us->dob}}</td>
                                        <td>{{$us->profession}}</td>
                                        <td>{{$us->graduation}}</td>
                                        <td>{{$us->created}}</td>
                                       


                                        <td><a href="#"><button class="btn btn-success"><img  src="img/edit.png"  alt=""></button></a> <a href="#">
                                        <button class="btn btn-danger mt-1"><img  src="img/delete.png"  alt=""></button></a></td> 
                                        <!-- <th><a href="jcts.php?del= "><img src="Image/delete.png"></a></th> -->

                                        </tr>
                                        @endforeach
                                          </tbody>
                                         
          </table>
        </div>
      </div>
                            <!-- Show Users table End-->
          <!-- Content Row -->


          

      <!-- Footer -->
      <footer class="sticky-footer bg-white myFooter">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; E Web Digital 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current Admin Page.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{url('/logout')}}">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  

</body>

</html>
