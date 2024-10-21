<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Carbon\Carbon;
use function Symfony\Component\String\b;

class ReportController extends Controller
{
    public function index()
    {
        $report = Report::latest()->limit(20)->get();

        return view('traffic.index', compact('report'));
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
