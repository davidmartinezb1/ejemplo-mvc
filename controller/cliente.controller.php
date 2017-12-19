<?php
require_once 'model/cliente.php';

class ClienteController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Cliente();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/cliente/cliente.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){        
        $cl = new Cliente();
        
        
        if(isset($_REQUEST['Id'])){
            $cl = $this->model->ObtenerCliente($_REQUEST['Id']);
            
        }
        $clPais = $this->model->ObtenerPais();
        $clDpto = $this->model->ObtenerDepartamento();
        $clCiudad = $this->model->ObtenerCiudad();
        
        require_once 'view/header.php';
        require_once 'view/cliente/cliente-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $cl = new Cliente();        
        $cl->Id = $_REQUEST['Id'];
        $cl->Cedula = $_REQUEST['Cedula'];
        $cl->Nombre = $_REQUEST['Nombre'];
        $cl->Apellidos = $_REQUEST['Apellidos'];
        $cl->Direccion = $_REQUEST['Direccion'];
        $cl->Id_pais = $_REQUEST['Pais'];
        $cl->Id_departamento = $_REQUEST['Departamento'];
        $cl->Id_ciudad = $_REQUEST['Ciudad'];
        print $cl->Id;
        //print"<pre>".print_r($cl,1).print"<pre>";exit();
        // si existe un registro se actualiza, de lo contrario se crea
        $cl->Id > 0 
            ? $this->model->Actualizar($cl)
            : $this->model->Registrar($cl);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['Id']);
        header('Location: index.php');
    }
}