<?php

include_once 'user.php';

class ApiUser{


    function getAll(){
        $user = new User();
        $users = array();
        $users["items"] = array();

        $res = $user->obtenerUsers();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                echo json_encode($row);

                $item=array(
                    "id" => $row['id_usuario'],
                );
                array_push($users["items"], $item);
            }
        
            echo json_encode($users);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }


    function getPermiso(){
        $user = new User();
        $users = array();
        $users["items"] = array();

        $res = $user->obtenerUsers();

        if($res->rowCount()){
            $row = $res->fetch(PDO::FETCH_ASSOC))
    
            echo json_encode($row);

            $item=array(
                "id" => $row['id_usuario'],
            );
            array_push($users["items"], $item);
            
        
            echo json_encode($users);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }
}

?>