<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Categorie;
use App\Models\TypeUser;
use App\Models\Agence;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function showRegistrationForm()
    {
        $categories=Categorie::all();
        $types=TypeUser::all();
        return view('auth.register',compact('categories','types'));
    }
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if(intval($data["type"])==1){
            return Validator::make($data, [
                'name' => ['required' ,'string', 'max:255'],
                'email' => [ 'required' ,'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required' , 'string', 'min:8', 'confirmed'],
                'categories' => [],
                'contact' => ['required', 'string', 'min:8'],
                'profil_image'=>'nullable|sometimes|image|mimes:png,jpg,jpeg|max:12288',
                
               'agence_name'=>["string","max:255"],
               "description"=>['string','max:255'],
               'logo'=>'nullable|sometimes|image|mimes:png,jpg,jpeg|max:12288',
               'banner'=>'nullable|sometimes|image|mimes:png,jpg,jpeg|max:12288'
         
         ]);
        }
        else{
        echo "salut";
           
            return Validator::make($data, [
                'name' => ['required' ,'string', 'max:255'],
                'email' => [ 'required' ,'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required' , 'string', 'min:8', 'confirmed'],
                'contact' => ['required', 'string', 'min:8'],
                'profil_image'=>'nullable|sometimes|image|mimes:png,jpg,jpeg|max:12288',
            ]);
        }
       
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
    
        $file1=null;
        $file2=null;
        $file3=null;
        $agence=-1;
        $type_user_id=intval($data["type"]);
      
        if($type_user_id==1){     // si il s'agit d'un organisateur on crée une agence
            if(array_key_exists("logo",$data)){
                 $imageName = time().'.'.$data["logo"]->extension();  
            $file2=$data["logo"]->move(public_path('images'), $imageName); 
            }
             
           if(array_key_exists("banner",$data)){
            $imageName = time().'.'.$data["banner"]->extension();  
            $file3=$data["banner"]->move(public_path('images'), $imageName);

           }
           

            $agence=Agence::create([
                'agence_name'=>$data["agence_name"],
                "description"=>$data["description"],
                "logo"=>$file2,
                "banner"=>$file3,
                'categories'=>json_encode($data['categories'])
            ]);
            $agence=$agence->id;
        }
      
       
       if(array_key_exists("profil_image",$data)){
        $imageName = time().'.'.$data["profil_image"]->extension();  
        $file1=$data["profil_image"]->move(public_path('images'), $imageName); 
       }
        //return view('<h1>'.$type_user_id.'</h1>');
         return User::create([
             'name' => $data['name'],
             "profil_image"=>$file1,
             'email' => $data['email'],
             "contact"=>$data['contact'],

             'password' => Hash::make($data['password']),
             "agence_id"=>$agence,
             'type_user_id'=>(int)$type_user_id, 
         ]);

    }
}
