

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="/usertemplate/vendors/feather/feather.css">
    <link rel="stylesheet" href="/usertemplate/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/usertemplate/vendors/css/vendor.bundle.base.css">
    <script src="https://kit.fontawesome.com/YOUR_KIT_ID.js" crossorigin="anonymous"></script>

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/usertemplate/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/usertemplate/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="/usertemplate/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/usertemplate/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/usertemplate/images/favicon.png" />
</head>

<body>

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('user.includes.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <!-- <div id="settings-trigger"><i class="ti-settings"></i></div> -->
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('user.includes.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Welcome @if($LoggedUserInfo)
                                        <span>{{ $LoggedUserInfo ['name'] }}</span>
                                        @endif
                                    </h3>
                                    <h6 class="font-weight-normal mb-0">All systems are running smoothly! </h6>
                                </div>
                                @if (session('success'))
                    <div class="alert alert-success fade show" role="alert">
                        <strong>Success:</strong> {{ session('success') }}
                    </div>
                    @endif
                                <br>
                                <div class="col-md-12 mt-4 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Users Profile Info</h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <!-- Display user information -->
                                                    <p><strong>Name:</strong> {{ $LoggedUserInfo->name }}</p>
                                                    <p><strong>Email:</strong> {{ $LoggedUserInfo->email }}</p>
                                                    <p><strong>Phone:</strong> {{ $LoggedUserInfo->phone_number }}</p>
                                                    <p><strong>Phone:</strong> {{ $LoggedUserInfo->role }}</p>
                                                   
                                                    <p><strong>Account Created At :</strong> {{ $LoggedUserInfo->created_at}}</p>

                                                    
                                                    <p><strong>Bio:</strong> {{ $LoggedUserInfo->bio}}</p>

                                                        <!-- Add more fields as needed -->
                                                </div>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="col-md-3 ">
                                                    <!-- Display user image with a smaller size -->
                                                    @if($LoggedUserInfo->picture)
                                                    <img src="{{ asset('storage/' . $LoggedUserInfo->picture) }}"
                                                        alt="Profile Picture" class="img-fluid rounded"
                                                        style="width: 150px; height: 150px;">
                                                    @else
                                                    <p class="text-muted">No profile picture available</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">

                        </div>
                    </div>

                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <!-- <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                                2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                                    template</a> from BootstrapDash. All rights reserved.</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                                with <i class="ti-heart text-danger ml-1"></i></span>
                        </div>
                    </footer> -->
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('5a25223c01be17bf3e9e', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('new-message', function(data) {
            // Check if 'post' property exists and contains 'author' and 'title'
            if (data && data.post && data.post.author && data.post.title) {
                // Display a Toastr notification (sticky)
                toastr.success('New Post Created', 'Author: ' + data.post.author + '<br>Title: ' + data.post
                    .title, {
                        timeOut: 0, // Set timeOut to 0 for a sticky notification
                        extendedTimeOut: 0, // Set extendedTimeOut to 0 for a sticky notification
                    });
            } else {
                console.error('Invalid data structure received:', data);
            }
        });
        </script>
        <!-- plugins:js -->
        <script src="/usertemplate/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="/usertemplate/vendors/chart.js/Chart.min.js"></script>
        <script src="/usertemplate/vendors/datatables.net/jquery.dataTables.js"></script>
        <script src="/usertemplate/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
        <script src="/usertemplate/js/dataTables.select.min.js"></script>

        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="/usertemplate/js/off-canvas.js"></script>
        <script src="/usertemplate/js/hoverable-collapse.js"></script>
        <script src="/usertemplate/js/template.js"></script>
        <script src="/usertemplate/js/settings.js"></script>
        <script src="/usertemplate/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="/usertemplate/js/dashboard.js"></script>
        <script src="/usertemplate/js/Chart.roundedBarCharts.js"></script>
        <!-- End custom js for this page-->
</body>

</html>
