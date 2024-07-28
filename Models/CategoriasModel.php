<?php
class CategoriasModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }
    public function getCategorias($estado)
    {
        $sql = "SELECT * FROM categorias WHERE estado = $estado";
        return $this->selectAll($sql);
    }

    public function registrar($categoria, $descripcion)
    {
        $sql = "INSERT INTO categorias (categoria, descripcion) VALUES (?,?)";
        $array = array($categoria, $descripcion);
        return $this->insertar($sql, $array);
    }
    public function verificarCategoria($categoria)
    {
        $sql = "SELECT categoria FROM categorias WHERE categoria = '$categoria' AND estado = 1";
        return $this->select($sql);
    }

    public function eliminar($idCat)
    {
        $sql = "UPDATE categorias SET estado = ? WHERE id = ?";
        $array = array(0, $idCat);
        return $this->save($sql, $array);
    }

    public function getCatoria($idCat)
    {
        $sql = "SELECT * FROM categorias WHERE id = $idCat";
        return $this->select($sql);
    }

    public function modificar($categoria, $id, $descripcion)
    {
        $sql = "UPDATE categorias SET categoria=?, descripcion=? WHERE id = ?";
        $array = array($categoria, $id, $descripcion);
        return $this->save($sql, $array);
    }
}
 
?>