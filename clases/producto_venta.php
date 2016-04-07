<?php

class Producto{
    //Atributos
	public $idpro;
    public $codpro;
    public $nompro;
	public $stockpro;
    public $costpro;
    public $prepro;
    public $cantidad;


    //Constructor
    public function  __construct($ip,$c,$n,$sp,$cp,$p) {
		$this->idpro=$ip;
        $this->codpro=$c;
        $this->nompro=$n;
	    $this->stockpro=$sp;
		$this->costpro=$cp;
        $this->prepro=$p;
        $this->cantidad=1;
    }

    //Metodos
    public function precioTotal(){
        return number_format($this->prepro*$this->cantidad, 2, '.', '');
    }
}
?>
