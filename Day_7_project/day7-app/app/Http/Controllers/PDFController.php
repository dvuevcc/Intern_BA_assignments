<?php

namespace App\Http\Controllers;

use App\Models\user_data;
use Illuminate\Http\Request;
use DataTables;
use PDF;

class PdfController extends Controller
{
    public function generatePdf(Request $request)
    {
        if ($request->ajax()) {
            $data = user_data::latest()->get();

            $pdf = PDF::loadView('pdf.dynamic', ['data' => $data]);
            $filename = 'document.pdf';
            $pdf->save(storage_path('app/public/' . $filename));

            return response()->json(['filename' => $filename]);
        }
    }
}
