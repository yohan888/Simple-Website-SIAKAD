<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Storage;
use PDF;
use Illuminate\Support\Facades\Mail;
class AdminController extends Controller
{
    public function homeAdmin(){
        return view('homeAdmin');
    }
    //BIODATA DOSEN
    public function biodata_dosen(){
        $biodata_dosen = DB::table('dosen')
        ->where('dosen.nip', 1)
        ->get();

        $matkul_dosen = DB::table('matakuliah')
        ->where('nip', 1)
        ->get();

        $jabatan = DB::table('jabatan')
        ->where('nip', 1)
        ->get();
        return view('biodata_dosen',['biodata_dosen'=>$biodata_dosen, 'jabatan' => $jabatan, 'matkul' => $matkul_dosen]);
    }

    public function tambah_matkul(Request $req){
        DB::table('matakuliah')->insert(
            [   
                'nama_matkul' => $req->matkul,
                'nip' => 1
            ]
        );
        return redirect('/biodata_dosen');
    }
    
    public function tambah_jabatan(Request $req){
        DB::table('jabatan')->insert(
            [   
                'jabatan' => $req->jabatan,
                'nip' => 1
            ]
        );
        return redirect('/biodata_dosen');
    }

    public function hapus_jabatan($id){
        DB::table('jabatan')->where('id',$id)->delete();
        return redirect('/biodata_dosen');
    }

    public function hapus_matakuliah($id){
        DB::table('matakuliah')->where('id',$id)->delete();
        return redirect('/biodata_dosen');
    }

    public function view_matakuliah($id){
        $data = DB::table('matakuliah')->where('id',$id)->get();
        return view('edit_matakuliah', ['data' => $data]);
    }

    public function view_jabatan($id){
        $data = DB::table('jabatan')->where('id',$id)->get();
        return view('edit_jabatan', ['data' => $data]);
    }

    public function edit_matakuliah(Request $req){
        DB::table('matakuliah')
        ->where('id',$req->id)
        ->update(
            [
                'nama_matkul' => $req->matkul,
                'nip' => 1
            ]
        );
        return redirect('/biodata_dosen');
    }

    public function edit_jabatan(Request $req){
        DB::table('jabatan')
        ->where('id',$req->id)
        ->update(
            [
                'jabatan' => $req->jabatan,
                'nip' => 1
            ]
        );
        
        return redirect('/biodata_dosen');
    }

    //HASIL STUDI
    public function hasil_studi(){
        $hasil_studi = DB::table('hasil_studi')
        ->join('mahasiswa', 'hasil_studi.nim', '=', 'mahasiswa.nim')
        ->select('hasil_studi.*', 'mahasiswa.nama')
        ->where('kode_kelas', '=', 'ST1')
        ->get();

        $listMahasiswa = DB::table('mahasiswa')
        ->join('kartu_studi', 'kartu_studi.nim', '=', 'mahasiswa.nim')
        ->select('mahasiswa.*')
        ->where('kartu_studi.kode_kelas', 'ST1')
        ->get();
        return view('hasil_studi',['hasil_studi'=>$hasil_studi, 'list_mahasiswa' => $listMahasiswa]);
    }

    public function simpan_hasil(Request $req){
        DB::table('hasil_studi')->insert(
            [   
                'nim' => $req->nim,
                'nilai' => $req->nilai,
                'kode_kelas' => 'ST1'
            ]
        );
        return redirect('/hasil_studi');
    }

    public function hapus_hasil($id){
        DB::table('hasil_studi')->where('id',$id)->delete();
        return redirect('/hasil_studi');
    }

    public function edit_hasil(Request $req){
        $hasil = DB::table('hasil_studi')->where('id',$req->id)->get();
        $listMahasiswa = DB::table('mahasiswa')
        ->join('kartu_studi', 'kartu_studi.nim', '=', 'mahasiswa.nim')
        ->select('mahasiswa.*')
        ->where('kartu_studi.kode_kelas', 'ST1')
        ->get();
        return view('edit_hasil',['hasil'=>$hasil, 'list_mahasiswa' => $listMahasiswa]);
    }

    public function ubah_hasil(Request $req){
        DB::table('hasil_studi')
        ->where('id',$req->id)
        ->update(
            [
                'nim' => $req->nim,
                'nilai' => $req->nilai,
                'kode_kelas' => 'ST1'
            ]
        );
        
        return redirect('/hasil_studi'); 
    }

    //DAFTAR KELAS
    public function daftar_kelas(){
        $daftar_kelas = DB::table('kelas')->get();
        return view('daftar_kelas', ['daftar_kelas'=>$daftar_kelas]);
    }

    public function hapus_kelas($id){
        $daftar_kelas = DB::table('kelas')->where('kode_kelas', $id)->delete();
        return redirect('/daftar_kelas');
    }

    public function simpan_kelas(Request $req){

        DB::table('kelas')->insert(
            [   
                'kode_kelas' => $req->kode_kelas,
                'waktu' => $req->waktu,
                'ruang' => $req->ruang,
                'nama_matkul' => $req->nama_matkul,
                'sks' => $req->sks,
                'nip' => 1
            ]
        );
        return redirect('/daftar_kelas');
    }

    //DAFTAR MAHASISWA
    public function daftar_mahasiswa(){
        $daftar_mahasiswa = DB::table('kartu_studi')
        ->join('kelas', 'kelas.kode_kelas', '=', 'kartu_studi.kode_kelas')
        ->join('mahasiswa', 'mahasiswa.nim', '=', 'kartu_studi.nim')
        ->where('kartu_studi.kode_kelas', '=', 'ST1')
        ->select('kelas.*', 'kartu_studi.*', 'mahasiswa.nama as namaMahasiswa')
        ->get();
        return view('daftar_mahasiswa',['daftar_mahasiswa'=>$daftar_mahasiswa]);
    }

    //dari bentuk objek diubah kedalam bentuk array agar dpt membuat xml-nya
    public function cetak_list_mahasiswa(){
        $daftar_mahasiswa = DB::table('kartu_studi')
        ->join('kelas', 'kelas.kode_kelas', '=', 'kartu_studi.kode_kelas')
        ->join('mahasiswa', 'mahasiswa.nim', '=', 'kartu_studi.nim')
        ->where('kartu_studi.kode_kelas', '=', 'ST1')
        ->select('kelas.*', 'kartu_studi.*', 'mahasiswa.nama as namaMahasiswa')
        ->get();

        $tempID = array();
        $tempNIM = array();
        $tempNama = array();
        $tempMatkul = array();
        $index = 0;
        foreach ($daftar_mahasiswa as $k) {
            $tempID[$index] = $k->id;
            $tempNIM[$index] = $k->nim;
            $tempNama[$index] =  $k->namaMahasiswa;
            $tempMatkul[$index] =  $k->nama_matkul;
            $index++;
        }

$header = 
"<?xml version='1.0' encoding='UTF-8'?>
<DOCUMENT>
";
        $body = "";
        for ($i=0; $i < count($tempNIM); $i++) { 
            $body = $body.
'   <data id="'.$tempID[$i].'">
        <nim>'.$tempNIM[$i].'</nim>
        <nama>'.$tempNama[$i].'</nama>
        <matkul>'.$tempMatkul[$i].'</matkul>
    </data>
';
        }
        
        $footer = "</DOCUMENT>";
        $xml = $header.$body.$footer;

        $pdf = PDF::loadview('pdf_template',['data'=>$daftar_mahasiswa]);

        Storage::disk('local')->put('data.xml', $xml);

        Storage::put("data.pdf", $pdf->output());
        $email = 'yohanbannar888@gmail.com';
        
            Mail::send('template_email', $daftar_mahasiswa->toArray(), function($mail) use($email) {
                $mail->to($email)
                        ->subject("Daftar Mahasiswa");
                $mail->from('yohanbanjarnahor@gmail.com', 'STTAB');

                $mail->attach(storage_path("app/data.xml"));
                $mail->attach(storage_path("app/data.pdf"));
            });
    
            // Cek kegagalan
            if (Mail::failures()) {
                return "Gagal mengirim Email";
            }
        
    	return redirect('/daftar_mahasiswa');
    }

    
}
