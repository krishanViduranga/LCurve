<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
  protected $fillable = [
      'seqNo', 'parent','name','content',
  ];
  public function classSubject()
  {
      $this->belongsTo('App\ClassSubject');
  }
  public function lessons()
  {
      $this->hasMany('App\Lesson');
  }


  
}
