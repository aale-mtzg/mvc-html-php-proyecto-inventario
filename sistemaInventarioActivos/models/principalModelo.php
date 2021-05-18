<?php

    //confirmar si hay peticion ajax
    if($peticionAjax){
        //true
        require "../config/conexion_db.php";
    }else{
        require "./config/conexion_db.php";
    } 

    //Clase del modelo principal: funciones del sistema
    class principalModelo{
        /**----Funcion conexion de BD----*/
        protected static function conectar(){

        }

        protected static $connection;
        //paradigma
    	// Connect to the database
    	public function connect(){
    		if(!isset(self::$connection)){
    			$config = parse_ini_file('../config.ini');

    			self::$connection = new mysqli($config['dbServername'], $config['dbUsername'], $config['dbPassword'], $config['dbName']);

    			mysqli_query(self::$connection, "SET NAMES 'utf8'");

    		}
    		if(self::$connection->connect_errno){
    		    echo $config['dbName'];
    			return false;
    		}

    		return self::$connection;
    	}

    	// Connect to the database
    	public function connect_services(){
    		if(!isset(self::$connection)){
    			$config = parse_ini_file('../../config.ini');

    			self::$connection = new mysqli($config['dbServername'], $config['dbUsername'], $config['dbPassword'], $config['dbName']);

    			mysqli_query(self::$connection, "SET NAMES 'utf8'");

    		}
    		if(self::$connection->connect_errno){
    			return false;
    		}

    		return self::$connection;
    	}

    	public function Db_query($query){
    		$connection = $this -> connect();

    		$result = $connection -> query($query);

    		return $result;
    	}

    	public function Db_query_save($types, $query, $postData){
    		$connection = $this -> connect();

    		$stmt = $connection -> prepare($query);

    		$stmt->bind_param($types, ...$postData);
    		$stmt->execute();
    		$stmt->close();
    	}

    	public function Db_query_select($types, $query, $postData){
    		$connection = $this -> connect();

    		$stmt = $connection -> prepare($query);

    		$stmt->bind_param($types, ...$postData);
    		$stmt->execute();

    		$result = $stmt->get_result();

    		if($result === false){
    			return false;
    		}

            $row = $result->fetch_assoc();

            foreach ($row as $rows => $value) {
              $data[$rows] = $value;
            }
            $stmt->close();

            return $data;
    	}

    	public function Db_query_select_all($types, $query, $postData){
    		$connection = $this -> connect();

    		$stmt = $connection -> prepare($query);

    		$stmt->bind_param($types, ...$postData);
    		$stmt->execute();

    		$result = $stmt->get_result();

    		if($result === false){
    			return false;
    		}

    		$stmt->close();

    		return $result;

    	}

    	public function Db_query_delete($types, $query, $postData){
    		$connection = $this -> connect();

    		$stmt = $connection -> prepare($query);

    		$stmt->bind_param($types, ...$postData);
    		$stmt->execute();

    		$result = $stmt->get_result();

    		if($result === false){
    			return false;
    		}

    		$stmt->close();

    		return true;
    	}

    	// ---------------------------------------- Services ------------------------------------------------

    	public function Db_query_services($query){
    		$connection = $this -> connect_services();

    		$stmt = $connection -> prepare($query);

    		$stmt->execute();

    		$result = $stmt->get_result();

    		if($result === false){
    			return "false"	;
    		}

    		$stmt->close();

    		return $result;
    	}
    
    
    	public function Db_query_save_services($types, $query, $postData){
    		$connection = $this -> connect_services();

    		$stmt = $connection -> prepare($query);

    		$stmt->bind_param($types, ...$postData);
    		$stmt->execute();
    		$stmt->close();
    	}

    	public function Db_query_select_all_services($types, $query, $postData){
    		$connection = $this -> connect_services();

    		$stmt = $connection -> prepare($query);

    		$stmt->bind_param($types, ...$postData);
    		$stmt->execute();

    		$result = $stmt->get_result();

    		if($result === false){
    			return "false";
    		}

    		$stmt->close();

    		return $result;

    	}

    	public function Db_query_select_all_services_2($types, $query, $postData){
    		$connection = $this -> connect_services();

    		$stmt = $connection -> prepare($query);

    		$stmt->bind_param($types, ...$postData);
    		$stmt->execute();

    		$result = $stmt->get_result();

    		$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    		if($result === false){
    			return "false";
    		}

    		$stmt->close();

    		return $row;

    	}


    	public function Db_query_select_one_services($types, $query, $postData){
    		$connection = $this -> connect_services();

    		$stmt = $connection -> prepare($query);

    		$stmt->bind_param($types, ...$postData);

    		$stmt->execute();

    		$result = $stmt->get_result();
        
    		if(mysqli_num_rows($result) > 0){
    			$row = $result->fetch_assoc();

    			foreach ($row as $rows => $value) {
    				$data[$rows] = $value;
    			}
    		}else{
    			$data = "False";
    		}

            $stmt->close();

            return $data;
    	}

    	public function getLastId(){
    		$connection = $this -> connect_services();

    		return $connection -> insert_id;
    	}

    	public function Db_query_delete_services($types, $query, $postData){
    		$connection = $this -> connect_services();

    		$stmt = $connection -> prepare($query);

    		$stmt->bind_param($types, ...$postData);
    		$stmt->execute();

    		$result = $stmt->get_result();

    		if($result === true){
    			return "false";
    		}

    		$stmt->close();

    		return "true";
        }

		/**-------Funciones para encriptar URL/texto plano (Seguridad) -----------*/

		/**Encriptar cadenas */
		public function encryption($string){
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
			return $output;
		}

		/**Desencriptar cadenas */
		protected static function decryption($string){
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
			return $output;
		}

		/**----Funcion para generar codigos aleatorios---*/
		protected static function generar_codigo_aleatorio($letra, $longitud, $numero){
			for($i=1; $i<=$longitud; $i++){
				$aleatorio = rand(0,9);
				$letra.=$aleatorio;
			}
			return $letra."-".$numero;

		}
		

		/** ----Funcion para limpiar cadenas de texto, evitar inyeccion de codigo  */
		protected static function limpiar_cadena($cadena){
			//Eliminar espacios antes/despues del dexto
			$cadena = trim($cadena);
			//Eliminar \
			$cadena = stripcslashes($cadena);
			//Remplazar texto que se introdusca
			$cadena = str_ireplace("<script>", "", $cadena);
			$cadena = str_ireplace("</script>", "", $cadena);
			$cadena = str_ireplace("<script src", "", $cadena);
			$cadena = str_ireplace("<script type=", "", $cadena);
			$cadena = str_ireplace("SELECT * FROM", "", $cadena);
			$cadena = str_ireplace("DELETE * FROM", "", $cadena);
			$cadena = str_ireplace("INSERT INTO", "", $cadena);
			$cadena = str_ireplace("DROP TABLE", "", $cadena);
			$cadena = str_ireplace("DROP DATABASE", "", $cadena);
			$cadena = str_ireplace("TRUNCATE TABLE", "", $cadena);
			$cadena = str_ireplace("SHOW TABLE", "", $cadena);
			$cadena = str_ireplace("SHOW DATABASES", "", $cadena);
			$cadena = str_ireplace("<?php", "", $cadena);
			$cadena = str_ireplace("?>", "", $cadena);
			$cadena = str_ireplace("--", "", $cadena);
			$cadena = str_ireplace(">", "", $cadena);
			$cadena = str_ireplace("<", "", $cadena);
			$cadena = str_ireplace("[", "", $cadena);
			$cadena = str_ireplace("]", "", $cadena);
			$cadena = str_ireplace("^", "", $cadena);
			$cadena = str_ireplace("==", "", $cadena);
			$cadena = str_ireplace(";", "", $cadena);
			$cadena = str_ireplace("::", "", $cadena);

			return $cadena;

		}


    }