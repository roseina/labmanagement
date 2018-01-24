@extends('layouts.app')

@section('content')
<style>
.image-gallery
{
    background-image: url("backend/image-resources/404.jpg");
}
</style>
<!-- Page Content -->

<div id="page-wrapper image-gallery">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
                <div class="col-lg-8">

                    <div class="panel panel-red">
                        <div class="panel-heading">
                          !!OOPS!!
                      </div>
                      <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                    </div>
                    <div class="panel-footer">
                        Panel Footer
                    </div>
                </div>
            </div>
            <!-- /.col-lg-4 -->
        </div>
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
