<?php
use App\Helper\MyFuncs;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Model\UserDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
 
Route::get('/', function () {
    return view('admin.register');
 
});
Route::post('store', function (Request $request) {

	

    $UserDetail=new UserDetail(); 
    $UserDetail->name=$request->name;
    $UserDetail->father_name=$request->father_name; 
    $UserDetail->save();
    $new_id=$UserDetail->id;
    $dirpath = Storage_path() . '/app/camera_image';
    $vpath = '/camera_image/'.$new_id;
    @mkdir($dirpath, 0755, true);
    $file =$request->image;
    $imagedata = file_get_contents($file);
    $encode = base64_encode($imagedata);
    $image=base64_decode($encode); 
    $name =$new_id;
    $savepath=$vpath.'/'.$name.'.jpg';
    $image= \Storage::disk('local')->put($savepath,$image);
    $UserDetail=UserDetail::find($new_id); 
    $UserDetail->image=$savepath; 
    $UserDetail->save();
    $path=Storage_path('fonts/');
    $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
    $fontDirs = $defaultConfig['fontDir']; 
    $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
    $fontData = $defaultFontConfig['fontdata']; 
    $mpdf = new \Mpdf\Mpdf([
        'fontDir' => array_merge($fontDirs, [
             __DIR__ . $path,
        ]),
        'fontdata' => $fontData + [
             'frutiger' => [
                 'R' => 'FreeSans.ttf',
                 'I' => 'FreeSansOblique.ttf',
             ]
        ],
        'default_font' => 'freesans',
        'pagenumPrefix' => '',
        'pagenumSuffix' => '',
        'nbpgPrefix' => ' कुल ',
        'nbpgSuffix' => ' पृष्ठों का पृष्ठ'
    ]);
    $html = view('admin.pdf_page'); 
    $mpdf->WriteHTML($html); 
    $documentUrl = Storage_path() . '/app/download/';  
    @mkdir($documentUrl, 0755, true);  
    $mpdf->Output($documentUrl.'/'.$new_id.'.pdf', 'F');
    $UserDetail=UserDetail::find($new_id); 
    $UserDetail->folder_path='/app/download'.'/'.$new_id; 
    $UserDetail->save();
    $UserDetail=UserDetail::find($new_id);  
    $documentUrl = Storage_path() .$UserDetail->folder_path.'.pdf';
    return response()->file($documentUrl);
 
});
Route::post('search', function (Request $request) {

    $UserDetail=UserDetail::find($request->search);  
    $response = array();
    $response['status'] = 1; 
    $response['data'] =view('admin.search')->render();
    return response()->json($response);
 
});
Route::get('download', function () {
    $UserDetail=UserDetail::find($new_id);  
    $documentUrl = Storage_path() .$UserDetail->folder_path.'.pdf';
    return response()->file($documentUrl);
 
});

