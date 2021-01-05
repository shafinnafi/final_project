<?php
  
namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
   
class Blog extends Model
{
    protected $fillable = [
        'title', 'description'
      ];
}