<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class S3DefaultAssetsSeeder extends Seeder
{
    private string $appName;
    public function __construct()
    {
        $this->appName = config('app.name');
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $localPath = public_path('Video/Quizzes Light promo video.mp4');
        $s3Path = "{$this->appName}/videos/Quizzes Light promo video.mp4";
        if (!Storage::disk('s3')->exists($s3Path)) {

            Storage::disk('s3')->put($s3Path, file_get_contents($localPath), 'public');
        }
    }
}
