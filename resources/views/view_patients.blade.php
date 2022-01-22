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
<section id="profile" class="profile section-bg">
        <div class="container" data-aos="fade-up">

            <div class="row mt-5">
                <div class="col-md-3">
                    <center>
                        <div class="card text-center shadow-lg p-3 mb-5 bg-body rounded" style="width: 18rem;">
                            <center>
                                <img src="/patients_images/{{$patient->image}}" class="card-img-top rounded" alt="...">
                            </center>
                            <div class="card-body">
                                <h5 class="card-title">{{$patient->p_name}}</h5>
                            </div>
        
                        </div>
                    </center>
                </div>
                <div class="col-md-9">
                   
                    <div class="row">
                        <div class="col">
                            <div class="container box-info">
                                <div class="row">
                                    <div class="col"><strong>Mobile Number</strong><br>
                                        <p>{{$patient->p_mobile}}</p></div>

                                    <div class="col"><strong>Date of Birth</strong><br>
                                        <p>{{$patient->dob}}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col"><strong>Email</strong><br>
                                        <p>{{$patient->p_email}}</p></div>
                                   
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                        <p class="h5">Prescriptions</p>
                        @foreach($pres as $presc)
                            <div class="row">
                                <div class="col">
                                    <div class="container details-profile">
                                        <p class="h6">{{$presc->date}}</p>
                                        <pre>{{$presc->description}}</pre>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endforeach   

                            <br>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <form action="/welcome/view_patients/add_prescription/{{$patient->id}}"  method="post">
                                    {{csrf_field()}}
                                    <div class="mb-3">
                                
                                <input type="date" name="date_of_issued" class="form-control" id="floatingEmail"
                                placeholder="Enter Date Of Issued"   >
                                <div class="invalid-feedback" id="invalid-age">
                                </div>
                                @if ($errors->has('date_of_issued'))
                    <span class="text-danger">{{ $errors->first('date_of_issued') }}</span> <br>
                    @endif
                            </div>
                                <div class="mb-3">
                                <textarea class="form-control" name="prescription" id="exampleFormControlTextarea4" rows="4" placeholder="Enter Prescription"></textarea>
                                <div class="invalid-feedback" id="invalid-name">
                                </div>
                                @if ($errors->has('prescription'))
                    <span class="text-danger">{{ $errors->first('prescription') }}</span> <br>
                    @endif
                            </div>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                               
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    </form>
                                    <br>
                            <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

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
