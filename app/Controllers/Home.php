<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        return view('welcome_message');
    }
    public function prueba ()
    {
        echo 'hola esto es una prueba';
    }

    public function api($nombrecelulares = null)
    {

//Marcas de celulares y caracteristicas
        $celulares = [
            [
                "Marca" => "Honor",
                "Procesador" => "Snapdragon 680",
                "Costo" => "300",
                "Almacenamiento" => "128GB",
                "Sistema Operativo" => "Android"
            ],
            [
                "Marca" => "Samsung S10",
                "Procesador" => "Octa Core",
                "Costo" => "120",
                "Almacenamiento" => "32GB",
                "Sistema Operativo" => "Android"
            ],
            [
                "Marca" => "Apple",
                "Procesador" => "Apple A14 Bionic",
                "Costo" => "750",
                "Almacenamiento" => "256GB",
                "Sistema Operativo" => "iOS14"
            ],
            [
                "Marca" => "Xiomi",
                "Procesador" => "Qualcomm Snapdragon 870",
                "Costo" => "699",
                "Almacenamiento" => "256GB",
                "Sistema Operativo" => "MIUI12(basado en Android 11)"
            ],
            [
                "Marca" => "OnePlus",
                "Procesador" => " Qualcomm Snapdragon 888",
                "Costo" => "899",
                "Almacenamiento" => "128GB",
                "Sistema Operativo" => "OxygenOS"
            ],
            [
                "Marca" => "Google",
                "Procesador" => "Qualcomm Snapdragon 765G",
                "Costo" => "699",
                "Almacenamiento" => "128GB",
                "Sistema Operativo" => "Andoid11"
            ],
            [
                "Marca" => "Huawei",
                "Procesador" => "HiSilicon Kirin 9000",
                "Costo" => "899",
                "Almacenamiento" => "256GB",
                "Sistema Operativo" => "HarmonyOS 2.0"
            ],
            [
                "Marca" => "Sony",
                "Procesador" => "Qualcomm Snapdragon 888",
                "Costo" => "1,099",
                "Almacenamiento" => "128GB",
                "Sistema Operativo" => "Android11"
            ],
            [
                "Marca" => "LG",
                "Procesador" => "Qualcomm Snapdragon 765G",
                "Costo" => "$799",
                "Almacenamiento" => "256GB",
                "Sistema Operativo" => "Android10"
            ],
            [
                "Marca" => "Motorola",
                "Procesador" => "Qualcomm Snapdragon 870",
                "Costo" => "599",
                "Almacenamiento" => "128GB",
                "Sistema Operativo" => "Android11"
            ],
            [
                "Marca" => "Nokia",
                "Procesador" => "Qualcomm Snapdragon 690",
                "Costo" => "499",
                "Almacenamiento" => "64GB",
                "Sistema Operativo" => "Android11"
            ],


        ];
        if ($nombrecelulares) {
            $celularesEncontrado = null;
            foreach ($celulares as $celulares) {
                if ($celulares['Marca'] === $nombrecelulares) {
                    $celularesEncontrado = $celulares;
                    break;
                }
            }
            if ($celularesEncontrado) {
                return $this->response->setJSON($celularesEncontrado);
            } else {
                return $this->response->setJSON(["error" => "Celulares no encontrado"]);
            }
        }
    
        return $this->response->setJSON($celulares);
    }
    //
    public function login(){

 // Llamado mediante una variable
  /*$functionName = 'view';
  return $functionName('login');
    }

       public function testdb($id)
        {
        $this->db=\Config\Database::connect();
        $query=$this->db->query("SELECT id, marca, procesador, costo, almacenamiento, sistema_operativo 
        FROM celulares.marca_celulares where id='$id' ");
        $result=$query->getResult();
        return $this->response->setJSON($result);*/

      //echo "hola";


      ///AGREGAR DATOS
        }
      public function agregarDato()
     {
     $datosRecibidos = $this->request->getJSON(true); 
     // Lógica para insertar los datos en la base de datos
     $conexion = \Config\Database::connect();
     $conexion->table('marca_celulares')->set($datosRecibidos)->insert();

   
     $respuesta = [
        'mensaje' => 'Datos agregados exitosamente'
     ];

     return $this->response->setJSON($respuesta);
      }
        
      ////ACTUALIZAR LOS DATOS
      public function actualizarDato($id)
     {
     $datosRecibidos = $this->request->getJSON(true); // Recopilar la información proporcionada en la solicitud POST.   
     $conexion = \Config\Database::connect();
     $conexion->table('marca_celulares')->set($datosRecibidos)->where('id', $id)->update();
    
     //Generar una respuesta apropiadas
     $respuesta = [
        'mensaje' => 'Se actualizo correctamnete'
     ];
    
     return $this->response->setJSON($respuesta);
     }

      ///ELIMINAR DATOS
     public function eliminar($id)
      {
     $conexion = \Config\Database::connect();


     $conexion->table('marca_celulares')->where('id', $id)->delete();

     $respuesta = [
        'mensaje' => 'Eliminado correctamente'
     ];

      return $this->response->setJSON($respuesta);
      }

       
     public function testdb()
      {
     $this->db=\Config\Database::connect();
     $query=$this->db->query("SELECT id, marca, procesador, costo, almacenamiento, sistema_operativo FROM celulares.marca_celulares");
     $result=$query->getResult();
     return $this->response->setJSON($result);

      //echo "hola";
      }
      
      
    

   

}
 

