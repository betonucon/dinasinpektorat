<?php

use App\Models\Role;

    function NamaRole($role){
        $data = Role::where('id', $role)->first();
        return $data;
    }

?>