<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\new_image;
use App\User;
use DB;
use Validator;
use Session;
use Redirect;
class IndexController extends Controller
{
//
	public function show(){

		$new_images  = new_image::orderBy('id','DESC')->get();
		return view('index-3') -> with(['new_images'=>$new_images]);
	}
	public function index(){
		return view('welcome');
	}
	public function message(Request $request){
		if ($request->session()->has('user')) {
			
			return view('index');

		} else {
			return redirect('auth/login');
		}
		
	}

	public function logout(Request $request){

		Session::forget('user');
		return redirect('auth/login');

	}

	public function info($id){

		$situation = new_image::select(['id','file1','file2','file3','location','descrip','name','phone','email'])->where('id',$id)->first();
		return view('index-1')->with(['situation' => $situation]);

	}

	public function fixShow($id){

		$situation = new_image::select(['id'])->where('id',$id)->first();
		return view('index-2')->with(['fixed_situation' => $situation]);  
	}


	public function fixSituation($id,Request $request){
		$current_id = $id;
		if($request->isMethod('post')){
              
            if(empty($request['works'])){
            	return Redirect::back()->withErrors(['Добавьте описание']);
            }

			if($request->hasFile('fixed_file1')) {
				$file1  = $request->file('fixed_file1');
				$file1->move(public_path() . '/fixedSituations', $_FILES['fixed_file1']['name']);
			} 

			if($request->hasFile('fixed_file2')) {
				$file2 = $request->file('fixed_file2');
				$file2->move(public_path(). '/fixedSituations', $_FILES['fixed_file2']['name']);
			} 

			if($request->hasFile('fixed_file3')) {
				$file3 = $request->file('fixed_file3');
				$file3->move(public_path(). '/fixedSituations', $_FILES['fixed_file3']['name']);
			}  



			if(!($request->hasFile('fixed_file1'))&&!($request->hasFile('fixed_file2'))&&!($request->hasFile('fixed_file3')))
			{  
				return Redirect::back()->withErrors(['Загрузите фотографию!']);
				exit();
			}

			DB::table('new_images')->where('id',$id)->update([

				'fixed_file1'=> $_FILES['fixed_file1']['name'],
				'fixed_file2'=> $_FILES['fixed_file2']['name'],
				'fixed_file3' => $_FILES['fixed_file3']['name'],
				'works'=> $request['works']
				]);
			//return redirect()->back();
		}
		return view('index-8');  
	}


	public function Image_Upload(Request $request){



		if($request->isMethod('post')){

			$validator = Validator::make($request->all(), [

				'location'  => 'required|max:255',
				'descrip'  => 'required|max:1000',
				]);

			if(!isset($request['check'])){
				$validator = Validator::make($request->all(), [
					'name'  => 'required|max:255',
					'phone' => 'required|max:255',
					'email' => 'required|max:255'
					]);
			}
			if($validator->fails()){
// $messages                                    = $validator->errors()->all();
// return view('index')->with(['messages'       => $messages]);
				return view('index') -> with(['errors' =>$validator->errors()->all()]);
			}


			if($request->hasFile('file1')) {
				$file1 = $request->file('file1');
				$file1->move(public_path() . '/newSituations', $_FILES['file1']['name']);
			} 

			if($request->hasFile('file2')) {
				$file2 = $request->file('file2');
				$file2->move(public_path(). '/newSituations', $_FILES['file2']['name']);
			} 

			if($request->hasFile('file3')) {
				$file3 = $request->file('file3');
				$file3->move(public_path(). '/newSituations', $_FILES['file3']['name']);
			}  

			if(!($request->hasFile('file1'))&&!($request->hasFile('file2'))&&!($request->hasFile('file3')))

			{  
				$message_error = 'Загрузите фотографию';
				return view('index')->with([
					'message_error' => $message_error
					]);
				exit();
			}



			DB::table('new_images')->insert([

				['file1' => $_FILES['file1']['name'],
				'file2' => $_FILES['file2']['name'],
				'file3' => $_FILES['file3']['name'], 
				'location' => $request['location'],
				'descrip' => $request['descrip'], 
				'name'=> $request['name'],
				'phone' => $request['phone'], 
				'email' => $request['email']]

				]);
			
			return view('index-6');

		}
	}

	public function listFixSit(){

		$fixed_images= new_image::orderBy('id','DESC')->get();
		return view('index-4') -> with(['fixed_images'=>$fixed_images]);

	}
	public function fixed_sit($id){

		$fixed_situation= new_image::select(['id','file1','file2','file3','location','descrip','name','phone','email','fixed_file1','fixed_file2','fixed_file3','works'])->where('id',$id)->first();
		return view('index-5')->with(['fixed_situation' => $fixed_situation]);
	}
	
	
	public function ready(){
		return view('index-5');
	}

	public function getLogin(){
		return view('index-7');
	}

	public function  postLogin(Request $request){
		$iin = $_POST['iin'];
		$user = User::select(['iin'])->where('iin',$iin)->first();
		if(!empty($user->iin)){
			$request->session()->put('user', $iin);
			return redirect('report');

		} else {
			$error = 'Пользователь не найден!';
			return redirect('auth/login')->with(['error' => $error ]);

		}
	}
}
