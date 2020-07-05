<?php

namespace App;


use Illuminate\Support\Facades\DB;

class Artikel
{
    public static function get_all()
    {
        $item = DB::table('artikel')->get();
        return $item;
    }

    public static function save($data)
    {
        $item = DB::table('artikel')->insert($data);
        return $item;
    }

    public static function lihat($id)
    {
        $item = DB::table('artikel')->where('id', $id)->first();
        return $item;
    }

    public static function updateData($data, $id)
    {
        $update = DB::table('artikel')->where('id', $id)->update($data);
    }

    public static function hapus($id)
    {
        $data = DB::table('artikel')->where('id', $id)->delete();

        return $data;
    }
}
