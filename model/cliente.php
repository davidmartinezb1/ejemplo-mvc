<?php 
class Cliente {
    private $pdo;
    
    public $Id;
	public $Cedula;
    public $Nombre;
    public $Apellidos;
    public $Direccion;
   	public $Id_ciudad;
	public $Id_departamento;
	public $Id_pais;

	/**
	* Declaración del metodo contructor
	*/
    public function __CONSTRUCT(){
		try{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e){
			die($e->getMessage());
		}
    }
    
	/**
	* obtiene un arreglo de ciudades donde se han registrado clientes
	* @return array()  
	*/
    public function ListarNumClCiudad(){
		try{
			$result = array();

			$stm = $this->pdo->prepare("SELECT c.nombre ciudad,COUNT(cl.Id_ciudad) AS cantidad
				FROM cliente cl
				LEFT JOIN ciudad c ON c.id= cl.Id_ciudad
				GROUP BY c.nombre");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	/**
	* obtiene un arreglo de ciudades donde se han registrado clientes
	* @return array()  
	*/
    public function ListarNumClDpto(){
		try{
			$result = array();

			$stm = $this->pdo->prepare("SELECT c.nombre departamento, COUNT(cl.Id_departamento) AS cantidad 
				FROM cliente cl
				LEFT JOIN departamento c ON c.id= cl.Id_departamento
				GROUP BY c.nombre");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	/**
	* obtiene un arreglo de ciudades donde se han registrado clientes
	* @return array()  
	*/
    public function ListarNumClPais(){
		try{
			$result = array();

			$stm = $this->pdo->prepare("SELECT c.nombre pais, COUNT(cl.Id_pais) AS cantidad 
				FROM cliente cl
				LEFT JOIN pais c ON c.id= cl.Id_pais
				GROUP BY c.nombre");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	/**
	* obtiene un arreglo de clientes almacenados
	* @return array()  
	*/
    public function Listar(){
		try{
			$result = array();

			$stm = $this->pdo->prepare("SELECT c.Id As Id, c.Cedula AS Cedula, c.Nombre AS Nombre, c.Apellidos AS Apellidos, 
            c.Direccion AS Direccion, p.nombre AS Pais, d.nombre AS Departamento, ci.nombre AS Ciudad 
            FROM cliente c
            LEFT JOIN pais p ON p.id=c.Id_pais
            LEFT JOIN departamento d ON d.id=c.Id_departamento
            LEFT JOIN ciudad ci ON ci.id=c.Id_ciudad");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	/**
	* obtiene un arreglo de clientes asociado a un Id dado
	* @param int $Id 
	* @return array()  
	*/
	public function ObtenerCliente($Id){
		try{
			$stm = $this->pdo
			          ->prepare("SELECT c.Id As Id, c.Cedula AS Cedula, c.Nombre AS Nombre, c.Apellidos AS Apellidos, 
            c.Direccion AS Direccion, p.nombre AS Pais, d.nombre AS Departamento, ci.nombre AS Ciudad 
            FROM cliente c
            LEFT JOIN pais p ON p.id=c.Id_pais
            LEFT JOIN departamento d ON d.id=c.Id_departamento
            LEFT JOIN ciudad ci ON ci.id=c.Id_ciudad WHERE c.Id = ?");			          

			$stm->execute(array($Id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}

	/**
	* obtiene un arreglo de paises almacenados
	* @return array()  
	*/
	public function ObtenerPais(){
		try{
			$stm = $this->pdo
			          ->prepare("SELECT id AS Id, nombre AS Nombre FROM pais");	          
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}

	/**
	* obtiene un arreglo de departamentos almacenados
	* @return array()  
	*/
	public function ObtenerDepartamento(){
		try{
			$stm = $this->pdo
			          ->prepare("SELECT id AS Id, nombre AS Nombre FROM departamento");	          
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}

	/**
	* obtiene un arreglo de ciudades almacenadas
	* @return array()  
	*/
	public function ObtenerCiudad(){
		try{
			$stm = $this->pdo
			          ->prepare("SELECT id AS Id, nombre AS Nombre FROM ciudad");	          
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}

	/**
	* Actualiza un registro dado una colección de datos identiticados por un Id único
	* @param array $data 
	* @return TRUE|FALSE  
	*/
	public function Actualizar($data){
		
		try{
			$sql = "UPDATE cliente SET 	
						Cedula = :Cedula,        	
						Nombre = :Nombre,
						Apellidos = :Apellidos,       
                        Direccion = :Direccion,       
						Id_ciudad = :Id_ciudad,		
						Id_departamento = :Id_departamento, 
						Id_pais = :Id_pais	
				    WHERE Id = :id";

			$exe=$this->pdo->prepare($sql);
			$exe->bindParam(':Cedula',$data->Cedula,PDO::PARAM_INT);
			$exe->bindParam(':Nombre',$data->Nombre,PDO::PARAM_STR);
			$exe->bindParam(':Apellidos',$data->Apellidos,PDO::PARAM_STR);
			$exe->bindParam(':Direccion',$data->Direccion,PDO::PARAM_STR);
			$exe->bindParam(':Id_ciudad',$data->Id_ciudad,PDO::PARAM_INT);
			$exe->bindParam(':Id_departamento',$data->Id_departamento,PDO::PARAM_INT);
			$exe->bindParam(':Id_pais',$data->Id_pais,PDO::PARAM_INT);		
			$exe->bindParam(':id',$data->Id,PDO::PARAM_INT);
			$exe->execute();
			//$exe->debugDumpParams();// debugger
			
			/*	    array(
                        $data->Cedula,  
						$data->Nombre,
						$data->Apellidos,
						$data->Direccion,
						$data->Id_ciudad,
						$data->Id_departamento,
						$data->Id_pais,
						$data->Id
					)
				);*/
				
		} catch (Exception $e){
			die($e->getMessage());
		}
	}

	/**
	* ingresa un nuevo registro dado una colección de datos
	* @Class Cliente
	* @param array $data
	* @return TRUE|FALSE
	*/
	public function Registrar(Cliente $data)	{
		try{
		$sql = "INSERT INTO cliente (Cedula,Nombre,Apellidos,Direccion,Id_pais,Id_departamento,Id_ciudad) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->Cedula,
                    $data->Nombre, 
                    $data->Apellidos, 
                    $data->Direccion,
					$data->Id_pais,
					$data->Id_departamento,
					$data->Id_ciudad,
                )
			);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}

	/**
	* Elimina un registro dado un Id
	* @param int $Id
	* @return TRUE|FALSE
	*/
	public function Eliminar($Id){
		try{
			$stm = $this->pdo
			            ->prepare("DELETE FROM cliente WHERE Id = ?"); 
			$stm->execute(array($Id));
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
}
