<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PMS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">
</head>

<body>

<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
        <a href="/welcome" class="signin ms-5"><i class=""><span><b>Patients Managment System</b></span></i></a>
            
        </div>
        <div class="social-links d-none d-md-flex align-items-center">

        <a class="signin ms-5"><i class="bi bi-person-fill"></i>{{Session::get('user_name')}}</a>
            <a href="/logout" class="signin ms-5"><i class="bi bi-logout"></i>Logout</a>
            
        </div>
    </div>
</section>

<!-- ======= Header ======= -->


<!-- ======= Hero Section ======= -->

</section><!-- End Hero -->

<main id="main">
    <!-- ======= Register Section ======= -->
    <section id="register" class="register section-bg">
        <div class="container-fluid" data-aos="fade-up">

            <div class="row" style="background: #0a53be;">
              
                <div class="col-md col-sm col-lg col-xl left-side" style="border: 5px solid #0a53be; background: #ffffff">
                    <div class="container">
                   
                        <h1 class="h1" style="color:#0a53be;">Add Appointment</h1>
                        @if(Session::has('error_message'))
                        <div class="alert alert-danger" role="alert">
                           <h4>{{Session::get('error_message')}}</h4> 
                        </div>
                        @endif
                        <form action="/welcome/view_add_appointment/save/{{$patient->id}}" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
                                             {{csrf_field()}}
                            <div class="mb-3">
                                <label for="floatingName" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="floatingName" value="{{$patient->p_name}}" readonly >
                                <div class="invalid-feedback" id="invalid-name">
                                </div>
                                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span> <br>
                    @endif
                            </div>
                            <div class="mb-3">
                                <label for="floatingMobileNumber" class="form-label">Reason</label>
                                <input type="text" name="reason" class="form-control" id="floatingMobileNumber"
                                       >
                                <div class="invalid-feedback" id="invalid-mobile-number">
                                </div>
                                @if ($errors->has('reason'))
                    <span class="text-danger">{{ $errors->first('reason') }}</span> <br>
                    @endif
                            </div>
            
                            <div class="mb-3">
                                <label for="floatingEmail" class="form-label">Date</label>
                                <input type="date" name="date" class="form-control" id="floatingEmail"
                                       >
                                <div class="invalid-feedback" id="invalid-age">
                                </div>
                                @if ($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span> <br>
                    @endif
                            </div>
                            <div class="mb-3">
                                <label for="floatingEmail" class="form-label">Payment</label>
                                <input type="number" name="payment" class="form-control" id="floatingEmail"
                                       >
                                <div class="invalid-feedback" id="invalid-age">
                                </div>
                                @if ($errors->has('payment'))
                    <span class="text-danger">{{ $errors->first('payment') }}</span> <br>
                    @endif
                            </div>
                    </div>
                    <div class="container">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                    </form>
                    <br>
                    <br>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

</main><!-- End #main -->

<!-- Start Modal -->

<!-- Vendor JS Files -->
<script src="/assets/vendor/purecounter/purecounter.js"></script>
<script src="/assets/vendor/aos/aos.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>
<script src="/assets/vendor/jquery-3.6.0.min.js"></script>

<script !src="">
    $(document).ready(function () {
        // $('#invalid-name').val("Fucking");
    })
</script>

</body>

</html>
