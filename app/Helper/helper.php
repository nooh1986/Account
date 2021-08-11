<?php

    function uploadFile($name , $path)
    {
        $rand       = rand();
        $time       = time();
        $Extension  = $name->getClientoriginalExtension();
        $NameFile   = $time . $rand .  '.'.$Extension;
        $name -> move($path,$NameFile);
        return $NameFile;
    }

    // $NameFile = uploadFile($request->photo , "photos/colors");
    // $data['photo'] = $NameFile;
?>