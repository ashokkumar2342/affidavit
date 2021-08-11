{{-- <!DOCTYPE html>
<html>
<head>
<title>Birthday Card</title>
<style>
#Avatar {
  border-radius: 300%;
} 
div.ex1 {
  width:50px;
  margin: auto;
  border: 3px solid #73AD21;
}
</style>

</head>
@php
$backgroundImg =storage_path('app/background/f.jpeg');
@endphp
<body> 
<div style="position: fixed; left: 0px; top: 0px; bottom: 0px; right: 0px; bottom: 0px; text-align: center;">
<img src="{{ $backgroundImg }}" style="width: 100%;"> 
</div>
<div>Dilip</div>
<div>Dilip</div>
<div>Dilip</div>
dddd
 
</body>

</html>

 --}}

 <!DOCTYPE html>
<html>
<head>
	<title>Certificate</title>
</head>
<style type="text/css">
	@page{margin:0;}
@php
$backgroundImg =storage_path('app/background/nn.jpg');
@endphp
	@page first{
		background-image: url('{{ $backgroundImg }}');
       	background-repeat:no-repeat;
       	margin-top:0px;
       	margin-bottom:0px;
       	background-image-resize: 6;
   	}
	

div.first{
	page:first;
} 
img {
  border: 5px solid #555;
}
</style>
<body>
	<div class="first"> 
		<div style="padding-top: 400px;margin-left: 100px">Certificate No. : <b>{{$UserDetail->id}}</b></div>
		<div style="padding-top: 37px;margin-left: 400px"><b>{{$UserDetail->name}}</b></div> 
		<div style="padding-top: 20px;margin-left: 200px"><b>{{$UserDetail->father_name}}</b></div> 
		<div style="padding-top: -20px;margin-left: 500px"><b>{{$UserDetail->village}}</b></div> 
	</div>
	@php
		$image =storage_path('app'.$UserDetail->image);
		
	@endphp
	<div style="padding-top: 165px;margin-left: 120px">
	<img src="{{ $image }}" alt="" width = "270px">
	</div>
</body>
</html>