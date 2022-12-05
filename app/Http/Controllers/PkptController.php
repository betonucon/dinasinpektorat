<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Pkpt;

class PkptController extends Controller
{
    public function index(){
        $headermenu = 'Perencanaan';
        $menu = 'Program Kerja Pengawasan Tahunan';
        return view('pkpt.index', compact('headermenu','menu'));
    }

    public function getdata(request $request)
    {
        error_reporting(0);
        $data = Pkpt::orderBy('id_pkpt','Asc')->get();

        return Datatables::of($data)
        ->addColumn('area_pengawasan', function($data){
            return $data['area_pengawasan'];
        })
        ->addColumn('jenis_pengawasan', function($data){
                return $data['jenis_pengawasan'];
        })
        ->addColumn('tujuan', function($data){
                return $data['tujuan'];
        })
        ->addColumn('opd', function($data){
                return $data['opd'];
        })
        ->addColumn('rmp', function($data){
                return $data['rmp'];
        })
        ->addColumn('rpl', function($data){
                return $data['rpl'];
        })
        ->addColumn('jml_laporan', function($data){
                return $data['jml_laporan'];
        })
        ->addColumn('sarana_prasarana', function($data){
                return $data['sarana_prasarana'];
        })
        ->addColumn('tingkat_resiko', function($data){
                return $data['tingkat_resiko'];
        })
        ->addColumn('ket', function($data){
                return $data['ket'];
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

        return view('pkpt.modal');
    }

    public function store(Request $request)
    {
        error_reporting(0);
        $allowed = ['xls','csv','xlsx'];
        $fillname =$_FILES['import_file']['name'];
        $checking = explode(".", $fillname);
        $file_ext=end($checking);
        
        if (in_array($file_ext, $allowed)) {
            $targetPath= $_FILES['import_file']['tmp_name'];
            $spreadsheet= \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);
            $data = $spreadsheet->getActiveSheet()->toArray();
            unset($data[5]);
            
            try {
                foreach ($data as $row) {        
                    $perusahaan= $row[0];
                    $nik= $row[1];
                    $nama= $row[2];
                    $jabatan= $row[3];
                    $no_kk= $row[4];
                    $no_ktp= $row[5];
                    $tempat_lahir= $row[6];
                    $tanggal_lahir= $row[7];
                    $umur= $row[8];
                    $npwp= $row[9];


                $personil=Pkpt::create([
                        'area_pengawasan'=> $perusahaan,
                        'jenis_pengawasan'=> $nik,
                        'tujuan'=> $nama,
                        'opd'=> $jabatan,
                        'rmp'=> $no_kk,
                        'rpl'=> $no_ktp,
                        'jml_laporan'=> $tempat_lahir,
                        'sarana_prasarana'=> $tanggal_lahir,
                        'tingkat_resiko'=> $umur,
                        'ket'=> $npwp,

                ]);

                    
                
                }
                return redirect('perencanaan/pkpt');
                
            } catch (\Throwable $th) {
                    return redirect('perencanaan/pkpt')->with('error', 'silahkan periksa kembali');
            }
        }else{
            return redirect('perencanaan/pkpt')->with('error', 'silahkan periksa kembali');  
        }


    }
}
