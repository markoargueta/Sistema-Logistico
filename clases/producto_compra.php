<?php

class Producto{
    //Atributos
	public $idpro;
    public $codpro;
    public $nompro;
	public $stockpro;
    public $costpro;
    public $cantidad;


    //Constructor
    public function  __construct($ip,$c,$n,$sp,$cp) {
		$this->idpro=$ip;
        $this->codpro=$c;
        $this->nompro=$n;
	    $this->stockpro=$sp;
		$this->costpro=$cp;
        $this->cantidad=1;
    }

    //Metodos
    public function precioTotal(){
        return number_format($this->costpro*$this->cantidad, 2, '.', '');
    }
}
?>
