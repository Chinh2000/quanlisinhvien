<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Class extends Model
{
    protected $table = 'class';
	protected $primaryKey = 'id';
	protected $fillable = ['name','id_discipline','id_course'];
	

	public $timestamps = false;
	
    public function Discipline()
    {
    	return $this->belongsTo('App\Models\Discipline', 'id_discipline');
    }
       public function Course()
    {
    	return $this->belongsTo('App\Models\Course', 'id_course');
    }
}
