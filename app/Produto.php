<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
	protected $table = 'produto';
	protected $primaryKey = 'codProduto';
    protected $fillable =['nome', 'descricao', 'quantidadeMinima'];
    public $timestamps = false;
    const categoria_codCategoria = 'codCategoria';
    
    public function categoria(){
		return $this->belongsTo(Categoria::class, 'codCategoria');
	}
    
}
