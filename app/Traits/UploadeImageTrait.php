<?php

namespace App\Traits;
trait UploadeImageTrait {
    public function uploade_image($request, $input_name, $folder,$old_path=null){
        if($request->hasFile( $input_name))
        {
            $img = $request->file($input_name)->getClientOriginalName();
            $final_name = time() . str_replace(' ', '_', $img);
            $path = $request->file($input_name)->storeAs($folder, $final_name, 'public');
            return $path;
        }else{
             return $old_path;
        }
    }
}
