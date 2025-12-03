<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota_m extends Model
{
   use HasFactory;

   protected $table = 'mst_anggota';
   protected $primaryKey = 'ID_Anggota';
   public $timestamps = false;

   function get_record($criteria=""){
      $result = self::select("*")
                     ->when($criteria, function($query, $criteria){
                        return $query->where('ID_Anggota', $criteria);
                     })
                     ->get();
      return $result;
   }

   function insert_record($data){
      $result = self::insert($data);
      return $result;
   }

   function update_by_id($data, $id){
      $result = self::where("ID_Anggota", $id)
                     ->update($data);        
      return $result;
   }

   function delete_by_id($id){
      $result = self::where("ID_Anggota", $id)
                     ->delete();        
      return $result;
   }
}