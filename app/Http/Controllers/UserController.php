<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    
    public function index(request $request)
    {
        $headermenu = 'Master Data';
        $menu = 'Account User';
        return view('user.index', compact('headermenu','menu'));
    }
    public function create(request $request)
    {
        error_reporting(0);
        $template='top';
        $data=User::find($request->id);
        $id=$request->id;
        if($request->id==0){
            $disabled='';
        }else{
            $disabled='disabled';
        }
        return view('user.create',compact('template','data','disabled','id'));
    }
    public function getdata(request $request)
    {
        error_reporting(0);
        $data = User::orderBy('id','Asc')->get();

        return Datatables::of($data)
        ->addColumn('name', function($data){
            return $data['name'];
        })
        ->addColumn('email', function($data){
                return $data['email'];
        })
        ->addColumn('username', function($data){
                return $data['username'];
        })
        ->addColumn('role_id', function($data){
                return $data->Roles->nama;
        })
        ->addColumn('action', function ($row) {
            $btn='
                <span class="btn btn-ghost-success waves-effect waves-light btn-sm" onclick="tambah('.$row['id'].')">Edit</span>
                <span class="btn btn-ghost-danger waves-effect waves-light btn-sm"  onclick="delete_data('.$row['id'].')">Delete</span>
            ';
            return $btn;
        })
            
            ->rawColumns(['action'])
            ->make(true);
    }

    public function modal(request $request){
        error_reporting(0);

        $id= $request->id;
        $data = User::where('id',$request->id)->first();
        $role= Role::all();

        return view('user.modal', compact('data','id','role'));
    }

    public function delete_data(request $request){
        $data = User::where('id',$request->id)->update(['aktif'=>0]);
    }

   
    public function store(request $request){
        error_reporting(0);
        if($request->id==0){
            $rules = [];
            $messages = [];
            
            $rules['name']= 'required';
            $rules['email']= 'required';
            $rules['username']= 'required';
            $rules['password']= 'required';
            $rules['role_id']= 'required';
            $messages['name.required']= 'Lengkapi kolom name';
            $messages['email.required']= 'Lengkapi kolom email';
            $messages['username.required']= 'Lengkapi kolom username';
            $messages['password.required']= 'Lengkapi kolom password';
            $messages['role_id.required']= 'Pilih Role nya';

        }else{
            $rules = [];
            $messages = [];
            
            $rules['name']= 'required';
            $rules['email']= 'required';
            $rules['username']= 'required';
            $messages['name.required']= 'Lengkapi kolom name';
            $messages['email.required']= 'Lengkapi kolom email';
            $messages['username.required']= 'Lengkapi kolom username';
        }
       
        $validator = Validator::make($request->all(), $rules, $messages);
        $val=$validator->Errors();


        if ($validator->fails()) {
            echo'<div class="nitof"><b>Silahkan periksa kembali !</b><br><div class="isi-nitof">';
                foreach(parsing_validator($val) as $value){
                    
                    foreach($value as $isi){
                        echo $isi.'<br>';
                    }
                }
            echo'</div></div>';
        }else{
            if($request->id==0){
                
                $data=User::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'username'=>$request->username,
                    'password'=>Hash::make($request->password),
                    'role_id'=>$request->role_id,
                ]);

                echo'@ok';               
            }else{
                $data=User::where('id',$request->id)->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'username'=>$request->username,
                    'role_id'=>$request->role_id,
                ]);

                echo'@ok';
            }
        }
    }
}
