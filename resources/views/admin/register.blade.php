
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ladokibagiya</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome --> 
  <link rel="stylesheet" href="{{ asset('admin_asset/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('admin_asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}"> 
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin_asset/dist/css/AdminLTE.min.css')}}"> 
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
	<div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist"> 
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">Register</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Download</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent"> 
                  <div class="tab-pane fade active show" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                  	<form action="{{ url('store') }}" method="post" target="blnak">
                  	{{csrf_field()}} 
                     <div class="row">
                     	<div class="col-lg-3">
                     		<label>Name</label>
                     		<input type="text" name="name" class="form-control" maxlength="100"> 
                     	</div>
                     	<p class="text-danger">{{ $errors->first('name') }}</p>
                     	<div class="col-lg-3">
                     		<label>Father Name</label>
                     		<input type="text" name="father_name" class="form-control" maxlength="100"> 
                     	</div>
                     	<p class="text-danger">{{ $errors->first('father_name') }}</p>
                     	
                        <div class="col-md-6">
                            <div id="my_camera"></div>
                            <br/>
                            <input type=button value="Take Snapshot" onClick="take_snapshot()">
                            <input type="hidden" name="image" class="image-tag">
                        </div>
                        <div class="col-md-6" style="margin-top: 10px">
                            <div id="results">Your captured image will appear here...</div>
                        </div> 
                        <div class="col-lg-12 text-center" style="margin-top: 20px">
                            <button type="submit" class="btn btn-primary" >Save</button>
                        </div> 
                    </div>
                  	</form>
                  </div> 
                  <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                    <form action="{{ url('search') }}" method="post" success-content-id="ddddd" class="add_form">
                  	{{csrf_field()}}
                     	<div class="row">
                     	<div class="col-lg-12 form-group">
                     		<label>Search</label>
                     		<input type="text" name="search" class="form-control" maxlength="100">  
                     	</div> 
                     	<div class="col-lg-12 form-group"> 
                     		<input type="submit"  class="form-control btn-primary btn" value="Search">  
                     	</div> 
                     	</div>
                     	<div id="ddddd">
                     		
                     	</div>
                     </form>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div> 
</body>
<script src="{{ asset('admin_asset/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('admin_asset/dist/js/adminlte.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

</html>

<script language="JavaScript">
        Webcam.set({
            width: 250,
            height: 250,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
     
        Webcam.attach( '#my_camera' );
     
        function take_snapshot() {
            Webcam.snap( function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
            } );
        }
</script>
