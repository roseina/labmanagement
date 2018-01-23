<!DOCTYPE html>
<html>


<head>
    <title>EKbana Office Automation</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
   @include('frontend.layouts.styles')
</head>

<body>
    <div class="all-wrapper menu-side">
        <div class="layout-w">
            <!--------------------
START - Mobile Menu
-------------------->
            <div class="menu-mobile menu-activated-on-click color-scheme-dark">
               {{--  <div class="mm-logo-buttons-w">
                    <a class="mm-logo" href="index.html"><img src="img/logo.png"><span>Clean Admin</span>
                    </a>
                    <div class="mm-buttons">
                        <div class="content-panel-open">
                            <div class="os-icon os-icon-grid-circles"></div>
                        </div>
                        <div class="mobile-menu-trigger">
                            <div class="os-icon os-icon-hamburger-menu-1"></div>
                        </div>
                    </div>
                </div> --}}
                <div class="menu-and-user">
                    <div class="logged-user-w">
                        <div class="avatar-w"><img alt="" src="img/avatar1.jpg">
                        </div>
                        <div class="logged-user-info-w">
                            <div class="logged-user-name">Maria Gomez</div>
                            <div class="logged-user-role">Administrator</div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="content-w">

                <div class="content-i">
                    <div class="content-box">
                        <div class="big-error-w">
                            <h1>404</h1>
                            <h5>Page not Found</h5>
                            <h4>Oops, Something went missing...</h4>
                            <form>
                            <a href="{{ url('/') }}" class="btn btn-primary">Return to Home Page</a>

                            </form>
                        </div>



                    </div>
                </div>
            </div>
        </div>
        <div class="display-type"></div>
    </div>
   @include('frontend.layouts.scripts')
</body>
<!-- Mirrored from light.pinsupreme.com/misc_error_404.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Jul 2017 12:22:49 GMT -->

</html>