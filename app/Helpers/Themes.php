<?php
use App\Models\Themes;
function CheckThemeStatus($ThemeName)
{
    $Check = Themes::all()->whereIn('name',$ThemeName)->first();
    if(!is_null($Check)){
        if ($Check->status){
            return true;
        }else{
            return false;
        }
    }else{
        return 'error';
    }
}


