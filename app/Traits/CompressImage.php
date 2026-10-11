<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait CompressImage
{
    /**
     * Compress foto lalu convert ke WebP biar web-nya ga berat.
     * Return nama file yang disimpan (contoh: 1739281.webp).
     *
     * SVG di-skip (GD ga bisa baca SVG), tinggal dipindah apa adanya.
     */
    public function compressToWebp(UploadedFile $file, $destinationPath, $maxWidth = 1400, $quality = 82)
    {
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        //SVG ga bisa diproses GD, simpan apa adanya
        if (strtolower($file->getClientOriginalExtension()) === 'svg') {
            $filename = Str::random(20) . '.svg';
            $file->move($destinationPath, $filename);

            return $filename;
        }

        $filename = Str::random(20) . '.webp';

        $image = Image::make($file->getRealPath());

        //resize cuma kalau fotonya lebih gede dari batas, rasio dijaga biar ga gepeng
        $image->resize($maxWidth, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        //buang EXIF & convert ke webp
        $image->encode('webp', $quality)->save($destinationPath . '/' . $filename);
        $image->destroy();

        return $filename;
    }
}
