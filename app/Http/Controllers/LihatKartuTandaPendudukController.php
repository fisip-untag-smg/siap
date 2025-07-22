<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\LaporanAbsen;
use App\Models\KartuTandaPenduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Not needed if you stream directly, but fine to keep for other file ops
use Illuminate\Support\Facades\View; // Still needed for rendering Blade
use Barryvdh\DomPDF\Facade\Pdf; // Import the DomPDF facade
use Carbon\Carbon;

class LihatKartuTandaPendudukController extends Controller
{
    // ... (Your existing index, create, store, show, edit, update, destroy methods) ...

    /**
     * Display a full-page HTML preview of a KTP record using the lihat-ktp template.
     *
     * @param KartuTandaPenduduk $kartuTandaPenduduk
     * @return \Illuminate\View\View
     */
    public function lihatKtpHtml(KartuTandaPenduduk $kartuTandaPenduduk)
    {
        // Prepare the data to be passed to the view
        $ktpData = [
            'nik' => $kartuTandaPenduduk->nik,
            'nama' => $kartuTandaPenduduk->nama,
            'tempat_lahir' => $kartuTandaPenduduk->tempat_lahir,
            // Use Carbon for formatting dates, especially for locale-aware output
            'tanggal_lahir' => Carbon::parse($kartuTandaPenduduk->tanggal_lahir)->translatedFormat('j-m-Y'),
            'jenis_kelamin' => $kartuTandaPenduduk->jenis_kelamin,
            'golongan_darah' => $kartuTandaPenduduk->golongan_darah,
            'alamat' => $kartuTandaPenduduk->alamat,
            'rt_rw' => $kartuTandaPenduduk->rt_rw, // Using the combined rt_rw field from your schema
            'kelurahan_desa' => $kartuTandaPenduduk->kelurahan_desa,
            'kecamatan' => $kartuTandaPenduduk->kecamatan,
            'agama' => $kartuTandaPenduduk->agama,
            'status_perkawinan' => $kartuTandaPenduduk->status_perkawinan,
            'pekerjaan' => $kartuTandaPenduduk->pekerjaan,
            'kewarganegaraan' => $kartuTandaPenduduk->kewarganegaraan,
            'berlaku_hingga' => $kartuTandaPenduduk->berlaku_hingga ?? 'SEUMUR HIDUP', // Default if field is empty
            'photo_url' => $kartuTandaPenduduk->photo_camera ? asset('storage/' . $kartuTandaPenduduk->photo_camera) : null, // *** CORRECTED TO USE photo_camera ***
            'tanggal_disahkan' => Carbon::parse($kartuTandaPenduduk->tanggal_disahkan)->translatedFormat('j-m-Y'),
        ];
        // Pass the data to the 'ktp.lihat-ktp' view
        return view('ktp.lihat-ktp', compact('ktpData'));
    }
}
