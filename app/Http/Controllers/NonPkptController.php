<?php

namespace App\Http\Controllers;

use App\Models\JenisPengawasan;
use App\Models\Opd;
use App\Models\Bulan;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Pkpt;

class NonPkptController extends Controller
{
        public function index()
        {
                $headermenu = 'Perencanaan';
                $menu = 'Program Kerja Pengawasan Tahunan';
                $jenis_pengawasan = JenisPengawasan::all();
                return view('non_pkpt.index', compact('headermenu', 'menu', 'jenis_pengawasan'));
        }

        public function getdata(request $request)
        {
                error_reporting(0);
                $data = Pkpt::orderBy('id_pkpt', 'Asc')->get();

                return Datatables::of($data)
                        ->addColumn('area_pengawasan', function ($data) {
                                return $data['area_pengawasan'];
                        })
                        ->addColumn('jenis_pengawasan', function ($data) {
                                return $data['jenis_pengawasan'];
                        })
                        ->addColumn('tujuan', function ($data) {
                                return $data['tujuan'];
                        })
                        ->addColumn('opd', function ($data) {
                                return $data['opd'];
                        })
                        ->addColumn('rmp', function ($data) {
                                return $data['rmp'];
                        })
                        ->addColumn('rpl', function ($data) {
                                return $data['rpl'];
                        })
                        ->addColumn('jml_laporan', function ($data) {
                                return $data['jml_laporan'];
                        })
                        ->addColumn('sarana_prasarana', function ($data) {
                                return $data['sarana_prasarana'];
                        })
                        ->addColumn('tingkat_resiko', function ($data) {
                                return $data['tingkat_resiko'];
                        })
                        ->addColumn('ket', function ($data) {
                                return $data['ket'];
                        })
                        ->addColumn('action', function ($row) {
                                $btn = '
                <span class="btn btn-ghost-success waves-effect waves-light btn-sm" onclick="tambah(' . $row['id'] . ')">Edit</span>
                <span class="btn btn-ghost-danger waves-effect waves-light btn-sm"  onclick="delete_data(' . $row['id'] . ')">Delete</span>
            ';
                                return $btn;
                        })

                        ->rawColumns(['action'])
                        ->make(true);
        }

        public function create(request $request)
        {
                error_reporting(0);
                $jenis_pengawasan = JenisPengawasan::all();
                $bulan = Bulan::all();
                $opd = Opd::all();
                $data = Pkpt::where('id_pkpt', $request->id_pkpt)->first();
                return view('non_pkpt.create', compact('id', 'jenis_pengawasan', 'opd', 'bulan'));
        }
}
