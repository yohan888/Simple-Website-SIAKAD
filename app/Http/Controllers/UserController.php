<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Storage;
use Illuminate\Support\Facades\Mail;
use PDF;
class UserController extends Controller
{
    public function home(){
        return view('home');
    }
    //BIODATA DOSEN
    public function biodata(){
        $biodata = DB::table('dosen')
        ->join('matakuliah', 'matakuliah.nip', '=', 'dosen.nip')
        ->select('dosen.*', 'matakuliah.*')
        ->get();
        return view('biodata',['biodata'=>$biodata]);
    }

    //HASIL STUDI
    public function hasil(){
        $hasil = DB::table('hasil_studi')->where('nim', 1)->get();
        return view('hasil',['hasil'=>$hasil]);
    }

    //REGISTRASI
    public function registrasi(){
        $registrasi = DB::table('kelas')
        ->join('dosen', 'dosen.nip', '=', 'kelas.nip')
        ->select('kelas.*', 'dosen.nama')
        ->get();
        return view('registrasi',['registrasi'=>$registrasi]);
    }

    //JADWAL
    public function jadwal(){
        $jadwal = DB::table('kartu_studi')
        ->join('kelas', 'kelas.kode_kelas', '=', 'kartu_studi.kode_kelas')
        ->join('dosen', 'dosen.nip', '=', 'kelas.nip')
        ->where('nim', '=', '1')
        ->select('kartu_studi.*', 'kelas.*', 'dosen.nama')
        ->get();

        $hargaSKS = DB::table('kartu_studi')
        ->join('kelas', 'kelas.kode_kelas', '=', 'kartu_studi.kode_kelas')
        ->where('nim', '=', '1')
        ->select('kelas.sks')
        ->get();

        $totalSKS = 0;
        foreach ($hargaSKS as $k) {
            $totalSKS += $k->sks;
        }

        $harga = $totalSKS*200000;
        DB::table('detail_tagihan')->where('id', 1)->update([
            'sks' => $totalSKS*200000
        ]);

        DB::table('tagihan')->where('nim', 1)->update([
            'total' => $harga+400000+800000
        ]);

        return view('jadwal',['jadwal'=>$jadwal]);
    }

    public function ambilKelas(Request $req){
        DB::table('kartu_studi')->insert([
            'kode_kelas' => $req->kodeKelas,
            'nim' => '1'
        ]);
        return redirect('jadwal');
    }

    public function hapusKelas($id){
        DB::table('kartu_studi')->where('id',$id)->delete();
        return redirect('/jadwal');
    }

    //TAGIHAN
    public function tagihan(){
        $tagihan = DB::table('tagihan')
        ->join('detail_tagihan', 'tagihan.id_tagihan', '=', 'detail_tagihan.id_tagihan')
        ->where('nim', '=', '1')
        ->select('detail_tagihan.*', 'tagihan.*')
        ->get();
        return view('tagihan',['tagihan'=>$tagihan]);
    }

    public function cetak_tagihan(){
        $tagihan = DB::table('tagihan')
        ->join('detail_tagihan', 'detail_tagihan.id_tagihan', '=', 'tagihan.id_tagihan')
        ->where('nim', '=', '1')
        ->select('detail_tagihan.*', 'tagihan.*')
        ->get();

        $pdf = PDF::loadview('tagihan_template',['data'=>$tagihan]);
    	return $pdf->download('tagihan.pdf');
    }
}
