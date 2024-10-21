<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Carbon\Carbon;
use function Symfony\Component\String\b;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;

        $report = Report::latest()->where('created_at', '>=', $tgl_awal . ' 00:00:00')->where('created_at', '<=', $tgl_akhir . ' 23:59:59')->get();

        $view_tgl = "List data mulai dari tangal : " . $tgl_awal . " sampai tanggal : " . $tgl_akhir;

        return view('traffic.index', compact('report', 'view_tgl'));
    }

    public function up(){

        $textup = new Report();
        $textup->text = '<font color=`ff0000`>Traffic Internet Melebihi Dari 50 Mbps</font>';
        $textup->save();

        return response()->json($textup, 200);
    }

    public function down(){

        $textup = new Report();
        $textup->text = 'Traffic Internet Stabil, Kurang Dari 50 Mbps';
        $textup->save();

        return response()->json($textup, 200);
    }
}
