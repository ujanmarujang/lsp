<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PublicPesertaController extends Controller
{
    public function index(Request $request)
    {
        $peserta = null;

        if ($request->filled('nisn')) {
            $peserta = Peserta::where('nisn', $request->nisn)->first();
        }

        return view('public.peserta', compact('peserta'));
    }

    public function generatePdf(Peserta $peserta)
    {
        $pdf = Pdf::loadView('pdf.peserta-single', ['data' => $peserta]);
        return $pdf->download("Peserta_{$peserta->nisn}.pdf");
    }
}