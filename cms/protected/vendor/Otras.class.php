<?php
Class Otras
{

    function __construct()
    {

    }
    public static function verificar_extension($file)
    {
        $ext = explode('.',$file);
        $ext = strtolower(end($ext));

       if( ($ext === 'jpg') || ($ext === 'png') || ($ext === 'jpeg') || ($ext === 'gif'))
       {
            return true;
       }
       else
       {
            return false;
       }

    }
}
?>