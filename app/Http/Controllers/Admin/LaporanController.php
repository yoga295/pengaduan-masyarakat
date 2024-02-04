<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(){
        return view('Admin.Laporan.index');
    }

    public function getLaporan(Request $request){
        $from = $request->from; 
        $to = $request->to;

        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();

        return view('Admin.Laporan.index', [
            'pengaduan' => $pengaduan, 
            'from' => $from, 
            'to' => $to]);
    }

    public function cetakLaporan($from, $to){
        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();

        $pdf = PDF::loadView('admin.Laporan.cetak', ['pengaduan' => $pengaduan]);
        return $pdf->download('laporan-pengaduan.pdf');
    }
}
