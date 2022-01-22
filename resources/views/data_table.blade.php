<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>PMS</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../../css/mdb.min.css">
  <!-- DataTables.net  -->
  <link rel="stylesheet" type="text/css" href="../../css/addons/datatables.min.css">
  <link rel="stylesheet" href="../../css/addons/datatables-select.min.css">
  <!-- Selected/Not Selected  -->
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
    rel="stylesheet">


  <!-- Your custom styles (optional) -->
  <style>
    .th {
      background-color: rgb(137, 14, 79);
      color: white;
    }

  </style>
</head>

<body class="fixed-sn deep-purple-skin">

  <!-- include('NAVBAR.PHP') -->
  <!-- Main Navigation -->
  <header>
  
    <!-- Sidebar navigation -->
   
    <!--/. Sidebar navigation -->
  
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">
      <!-- SideNav slide-out button -->
      
      <!-- Breadcrumb-->
      <div class="breadcrumb-dn mr-auto">
        <p><b>Patients Managment System</b></p>
      </div>
  
      <div class="d-flex change-mode">
  
  
  
        <!--Navbar links-->
        <ul class="nav navbar-nav nav-flex-icons ml-auto">
  
          <!-- Dropdown -->
  
          
          <a  class="nav-link waves-effect">{{Session::get('user_name')}}</a>
          <li class="nav-item">
         
            <a href="/logout" class="nav-link waves-effect"><i class="fas fa-sign-out-alt"></i> <span
                class="clearfix d-none d-sm-inline-block">Log Out</span></a>

          </li>
  
        </ul>
        <!--/Navbar links-->
      </div>
    </nav>
    <!-- /.Navbar -->
  
  </header>
  <!-- Main Navigation -->

  <!-- Main layout -->
<main>
  <div class="container-fluid"> 
  <div class="col-md-12">
  <div class="text-center">
         <a href="/welcome"> <button class="btn btn-blue btn-rounded btn-sm px-2 m-0 col-md-3">All Patients</button></a>
         <a href="/welcome/view_appointments"> <button class="btn btn-primary btn-rounded btn-sm px-2 m-0 col-md-3"> Appoinments</button></a>
         <a href="/welcome/accepted_appointments"> <button class="btn btn-danger btn-rounded btn-sm px-2 m-0 col-md-3"> Channeled Appoinments</button></a>
        </div>
        
      </div>
      <h2>All Patients</h2>  
      <br> 
      <div class="col-md-12">
        <div class="text-center">
         <a href="/welcome/add_patients"> <button class="btn btn-success">+ Add New Patients</button></a>
        </div>
      </div>
      @if(Session::has('message'))
                        <div class="alert alert-primary" role="alert">
                            {{Session::get('message')}}
                        </div>
                        @endif
      <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead class="th">

        <tr>
         
          <th class="th-sm">Patient's Name
          </th>
          <th class="th-sm">Contact Number
          </th>
          <th class="th-sm">Appointment
          </th>
         
          <th class="th-sm"> View | Edit | Delete
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($all as $data)
        <tr>
         
          <td>{{$data->p_name}}</td>
          
          <td>{{$data->p_mobile}}</td>
          <td> <a href="/welcome/view_add_appointment/{{$data->id}}"> <button class="btn btn-dark btn-rounded btn-sm px-2 m-0 col-md-3" title="Add Appointment">add</button></a></td>
          <td>
            <a href="/welcome/view_patients/{{$data->id}}"><button type="button" class="btn btn-unique btn-rounded btn-sm px-2 m-0 col-md-3" title="View"><i class="far fa-eye"></i></button></a>
            <a href="/welcome/edit_patients/{{$data->id}}"><button type="button" class="btn btn-blue btn-rounded btn-sm px-2 m-0 col-md-3" title="Edit"><i class="far fa-edit"></i></button></a>
            <a href="/welcome/delete_patients/{{$data->id}}"><button type="button" class="btn btn-danger btn-rounded btn-sm px-2 m-0 col-md-3" title="Delete"><i class="far fa-trash-alt"></i></button></a>
            </td>
        </tr>
        
        @endforeach
       
      </tbody>
    </table>



  </div>
</main>


  
  <!-- Main layout -->


  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script src="../../js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../../js/bootstrap.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../../js/mdb.min.js"></script>
  <!-- DataTables  -->
  <script type="text/javascript" src="../../js/addons/datatables.min.js"></script>
  <!-- DataTables Select  -->
  <script type="text/javascript" src="../../js/addons/datatables-select.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
  <!-- Custom scripts -->
  <script>
    // SideNav Initialization
    $(".button-collapse").sideNav();

    $(document).ready(function () {
      $('#dtBasicExample').DataTable();
      $('.dataTables_length').addClass('bs-select');
    });

    var container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

    $('#dtMaterialDesignExample').DataTable();

    $('#dt-material-checkbox').dataTable({

      columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
      }],
      select: {
        style: 'os',
        selector: 'td:first-child'
      }
    });

    $('#dtMaterialDesignExample_wrapper, #dt-material-checkbox_wrapper').find('label').each(function () {
      $(this).parent().append($(this).children());
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_filter, #dt-material-checkbox_wrapper .dataTables_filter').find(
      'input').each(function () {
        $('input').attr("placeholder", "Search");
        $('input').removeClass('form-control-sm');
      });
    $('#dtMaterialDesignExample_wrapper .dataTables_length, #dt-material-checkbox_wrapper .dataTables_length').addClass(
      'd-flex flex-row');
    $('#dtMaterialDesignExample_wrapper .dataTables_filter, #dt-material-checkbox_wrapper .dataTables_filter').addClass(
      'md-form');
    $('#dtMaterialDesignExample_wrapper select, #dt-material-checkbox_wrapper select').removeClass(
      'custom-select custom-select-sm form-control form-control-sm');
    $('#dtMaterialDesignExample_wrapper select, #dt-material-checkbox_wrapper select').addClass('mdb-select');
    $('#dtMaterialDesignExample_wrapper .mdb-select, #dt-material-checkbox_wrapper .mdb-select').materialSelect();
    $('#dtMaterialDesignExample_wrapper .dataTables_filte, #dt-material-checkbox_wrapper .dataTables_filterr').find(
      'label').remove();

    // Material Select Initialization
    $(document).ready(function () {
      $('.mdb-select').materialSelect();
    });

  </script>
</body>

</html>

