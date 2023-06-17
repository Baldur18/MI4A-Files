<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index(){
        $data['fakultas'] = Fakultas::all();
         $data['prodi'] = Prodi::all();
          $data['mahasiswa'] = Mahasiswa::all();
          $data['mahasiswaprodi']= DB::select(SELECT p .nama_prodi, COUNT(*) as jumlah from mahasiswas m 
JOIN prodis p 
on m.prodi_id = p.id
group by p.nama_prodi;);

          return view('dashboardapp',$data);
    }
}
