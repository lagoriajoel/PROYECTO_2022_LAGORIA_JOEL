<?php
 interface DAOinterface{

    // busca un registro en la bd que se corresponda con el identificador
    
    public function guardar($entidad);
    
    public function eliminar($id);

    public function actualizar($entidad);

    public function listar($filtros);

    public function cargar($id);




}

?>