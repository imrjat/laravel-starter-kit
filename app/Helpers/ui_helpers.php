<?php
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

function get_from_setting($name)
{

    $minutes = 5; # 1 day

    //Uncomment this for use cache
    
    // $settings = Cache::remember('settings', $minutes, function () {
    //     return Setting::get();
    // });

    $settings = Setting::get();

    return  $settings->where('name', $name)->first()->value ?? null;
}

function upload_multiple_files($files, $path, $file_name)
{
    $return_file = [];
    foreach ($files as $file) {
        $extension = $file->getClientOriginalExtension();
        $fileName = $file_name . '-' . Str::random(4) . time() . '.' . $extension;
        $file->move($path, $fileName);
        $return_file[] = $path . $fileName;
    }
    return serialize($return_file);
}

function upload_file($file, $path, $file_name)
{

    if (!file_exists(public_path($path))) {
        mkdir(public_path($path), 0777, true);
    }

    $extension = $file->getClientOriginalExtension();
    $fileName = $file_name . '-' . Str::random(4) . time() . '.' . $extension;
    $file->move($path, $fileName);
    return  $path . $fileName;
}

function crop_upload_file($file, $path, $file_name)
{

    if (!file_exists(public_path($path))) {
        mkdir(public_path($path), 0777, true);
    }

    $imgFile = Image::make($file->getRealPath());
    $imgFile->resize(150, 150);

    $file_name = $path . time() . $file->getClientOriginalName();
    $imgFile->save($file_name);

    return $file_name;
}
