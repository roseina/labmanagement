@extends('layouts.app')
@section('stylesheets')
<style>
body
{

    background-image: url("background.jpg");

}
.center {
    margin: auto;
    width: 60%;
    padding: 10px;
}
</style>
@endsection
@section('content')

<!-- Page Content -->

<div id="page-wrapper image-gallery">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>


                <div class="panel panel-red center">
                    <div class="panel-heading">
                      !!OOPS!!
                  </div>
                  <div class="panel-body">
                    <h1>Error 404</h1>
                    <h2>Page not found</h2>
                    <p>The page you are looking for has been moved or no longer exists. Use the search field below to locate the page you were looking for.</p>

                </div>
                <div class="footer">
                  <a class="btn btn-success btn-lg" href="{{URL::to('/home')}}">Return To Home Page</a>
              </div>
          </div>
      </div>
      <!-- /.col-lg-4 -->

  </div>

  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
@endsection
