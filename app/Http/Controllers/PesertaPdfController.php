<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaPdfController extends Controller
{
    public function index()
    {
        // Ambil semua peserta dari database
        $pesertas = Peserta::all();

        // Kirim data ke Blade view
        return view('pdf.peserta', compact('pesertas'));
    }

    public function generatePdf(Peserta $peserta)
    {
        // Buat 1 file PDF untuk 1 peserta
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.peserta-single', [
            'data' => $peserta,
        ]);

        return $pdf->download("Peserta_{$peserta->nisn}.pdf");
    }
}