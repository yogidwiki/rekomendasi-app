<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Imunisasi;
use App\Models\Notification; // Import model Notification
use App\Models\User;
use Carbon\Carbon;

class SendImunisasiReminder extends Command
{
    protected $signature = 'send:imunisasi-reminder';

    protected $description = 'Kirim notifikasi reminder H-1 minggu sebelum jadwal imunisasi';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $nextWeek = Carbon::now()->addWeek();
        $imunisasis = Imunisasi::where('tanggal_imunisasi', $nextWeek->format('Y-m-d'))->get();

        foreach ($imunisasis as $imunisasi) {
            $users = User::all(); // Atau filter sesuai kebutuhan

            foreach ($users as $user) {
                Notification::create([
                    'user_id' => $user->id,
                    'title' => 'Reminder Imunisasi',
                    'message' => 'Ingat! Jadwal imunisasi untuk ' . $imunisasi->nama_imunisasi . ' pada tanggal ' . $imunisasi->tanggal_imunisasi . ' di ' . $imunisasi->tempat_imunisasi,
                ]);
            }
        }

        return 0;
    }
}
