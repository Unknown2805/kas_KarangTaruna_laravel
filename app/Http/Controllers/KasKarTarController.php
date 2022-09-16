<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KasKarTar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Carbon;
use App\Models\ProfileKarTar;
use RealRashid\SweetAlert\Facades\Alert;


class KasKarTarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rekap()
    {
        $data = KasKarTar::all();
        $data2 = ProfileKarTar::all();
        
        // dd($data);

        return view('kaskartar.rekap',compact('data','data2'));
    }

    public function cetak_pdf() {
        $data = KasKarTar::all();
        $data2 = ProfileKarTar::all();


        $pdf = PDF::loadview('kaskartar.rekap_pdf',['data'=>$data,'data2'=>$data2]);
            
        return $pdf->download('laporan-kas-masjid.pdf');


    }

    public function masuk() {
        $data = KasKarTar::where('jenis','masuk')->get();

        return view('kaskartar.masuk',compact('data'));
    }
    
    public function keluar() {
        $data = KasKarTar::where('jenis','keluar')->get();

        return view('kaskartar.keluar',compact('data'));
    }

    //tambah data kas kartar
    public function storePemasukan(Request $request) {
        $this->validate($request,[
            'tanggal'=> 'required',
            'uraian' => 'required',
            'masuk' => 'required',

        ]);
        $data = new KasKarTar();
        $result = preg_replace("/[^0-9]/", "", $request->masuk);
        $data-> tanggal = $request-> tanggal;
        $data-> uraian = $request-> uraian;
        $data-> masuk = $result;
        $data-> jenis = 'masuk';
            // dd($data);
        $data-> save();

        Alert::success('Sukses!','Berhasil Menambah Data');
        return redirect()->back();
        
    }

    public function storePengeluaran(Request $request) {
        $this->validate($request,[
            'tanggal'=> 'required',
            'uraian' => 'required',
            'keluar' => 'required',

        ]);
        $data = new KasKarTar();
        $hasil = preg_replace("/[^0-9]/", "", $request->keluar);
        $data-> tanggal = $request-> tanggal;
        $data-> uraian = $request-> uraian;
        $data-> keluar = $hasil;
        $data-> jenis = 'keluar';
        $data-> save();

        Alert::success('Sukses!','Berhasil Menambah Data');
        return redirect()->back();
        
    }

    //edit data kas kartar
    public function editPemasukan(Request $request,$id) {
        $data = KasKarTar::where('id',$id)->firstOrFail();

        $request->validate([
            'tanggal'=> 'required',
            'uraian' => 'required',
            'masuk' => 'required',
        ]);
        // dd($request);

        $result = preg_replace("/[^0-9]/", "", $request->masuk);
        $data-> tanggal = $request-> tanggal;
        $data-> uraian = $request-> uraian;
        $data-> masuk = $result;
        $data->update();

        Alert::success('Sukses!','Berhasil Merubah Data');

        return redirect()->back();
    }
  
    public function editPengeluaran(Request $request,$id) {
        $data = KasKarTar::where('id',$id)->firstOrFail();

        $request->validate([
            'tanggal'=> 'required',
            'uraian' => 'required',
            'keluar' => 'required',
        ]);
        // dd($request);

        $hasil = preg_replace("/[^0-9]/", "", $request->keluar);
        $data-> tanggal = $request-> tanggal;
        $data-> uraian = $request-> uraian;
        $data-> keluar = $hasil;
        // dd($data);
        $data->update();

        // Alert::success('Sukses!','Berhasil Merubah Data');
        return redirect()->back();
    }

    //delete data kas kartar
    public function destroy($id)
    {
        $data = KasKarTar::find($id);

        $data->delete();

        return redirect()->back();
    }
}
