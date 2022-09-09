<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Employess;
use Illuminate\Http\Request;
use App\Exports\EmployessExport;
use Maatwebsite\Excel\Facades\Excel;

class EmployessController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $data = Employess::where('nama','LIKE','%' .$request->search.'%')->paginate(5);    
        }else{
            $data = Employess::paginate(5);    
        }
        return view('datapegawai',compact('data'));
    }

    public function tambahpegawai(){
        return view('tambahdata');
    }

    public function insertdata(Request $request){
        //dd($request->all());
        $data = Employess::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success','Data Berhasil di Tambahkan');
    }
    // menampilkan data
    public function tampilkandata($id){
        
        $data = Employess::find($id);
        // dd($data);
        return view('tampildata', compact('data'));

    }
    // update data
    public function updatedata(Request $request, $id){

        $data = Employess::find($id);
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success','Data Berhasil di Update');

    }
    // hapus data
    public function delete($id){
        $data = Employess::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success','Data Berhasil di Hapus');
    }

    // eksport pdf
    public function exportpdf(){
        $data = Employess::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('datapegawai-pdf');
        return $pdf->download('data.pdf');
    }

    // export excel
    public function exportexcel(){
        return Excel::download(new EmployessExport, 'datapegawai.xlsx');
    }
}