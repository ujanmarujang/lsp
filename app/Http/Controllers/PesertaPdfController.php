<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Template;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PesertaPdfController extends Controller
{
    public function index()
    {
        $pesertas = Peserta::all();
        return view('pdf.peserta', compact('pesertas'));
    }

    public function generatePdf(Peserta $peserta)
    {
        // Ambil data template sekolah
        $template = Template::first(); // karena template hanya satu

        // Generate PDF dengan Blade
        $pdf = Pdf::loadView('pdf.peserta-single', [
            'data' => $peserta,
            'template' => $template,
        ]);

        // Unduh PDF
        return $pdf->download("Peserta_{$peserta->nisn}.pdf");
    }
}
