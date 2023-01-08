<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $user = User::count();
        $petugas = Petugas::count();
        $siswa = Siswa::count();
        $kelas = Kelas::count();

        $none = Spp::where(['id_status' => 1])->count();
        $done = Spp::where(['id_status' => 2])->count();

        // $chartjs = app()->chartjs
        //     ->name('pieChartTest')
        //     ->type('pie')
        //     ->size(['width' => 1000, 'height' => 800])
        //     ->labels(['Lunas', 'Belum Lunas'])
        //     ->datasets([
        //         [
        //             'backgroundColor' => ['#345bcc', '#dddfeb'],
        //             'hoverBackgroundColor' => ['#345bcc', '#dddfeb'],
        //             'data' => [$done, $none],
        //         ],
        //     ])
        //     ->options([]);

        return view('admin.dashboard', [
            'user' => $user,
            'petugas' => $petugas,
            'siswa' => $siswa,
            'kelas' => $kelas,
            // 'chartjs' => $chartjs,
        ]);
    }

    public function siswa()
    {

        return view('siswa.dashboard');
    }
}
