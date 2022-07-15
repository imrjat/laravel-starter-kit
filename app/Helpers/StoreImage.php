<?php
namespace App\Helpers;
use Illuminate\Support\Facades\File;

class StoreImage
{
    public static function local($file,$path){
        if (!file_exists(public_path($path))) {
            mkdir(public_path($path), 0777, true);
        }
     
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $imageName);     
        return $path.$imageName;
    }

    public static function delete_file_local($file){
        if (File::exists(public_path($file))) {
            File::delete(public_path($file));
        }
    }
}
