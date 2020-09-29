<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	protected $table = 'categoria';
	protected $primaryKey = 'codCategoria';
	protected $fillable = ['nome'];
	public $timestamps = false;
	
	public function produtos(){
		return $this->hasMany(Produto::class, 'codCategoria');
	}
}
