<?php 
    class Home extends Controllers{

        public function __construct()
        {
            parent::__construct();            
        }

        public function home()
        {
            $data['tag_page'] = "Home";
            $data['page_title'] = "Cart Game";
            $data['page_name'] = "home";
            $data['page_function'] = "home_functions";
            $this->views->getView($this,"home",$data);
        }
        
        public function startGame()
        {
            $pist = intval(strClean($_POST['pist']));
            $quantity = intval(strClean($_POST['quantity']));
            $gameId = $this->model->initGame($quantity, $pist);            
            for ($i = 1 ; $i <= $quantity  ; $i++) { 
                $carril = $i;
                $namePlayer = strClean($_POST["namePlayer$i"]);
                $this->model->addPlayer($namePlayer, $gameId, $carril);
            }
            $rsp = array(
                "error" => false,
                "Message" => "Juego registrado exitosamente",
                "gameId" => $gameId,                
            );
            echo json_encode($rsp, JSON_UNESCAPED_UNICODE);
            exit;            
        }
        
        public function getViewGame($gameId)
        {
            $gameId = intval(strClean($gameId));
            $gameData = $this->model->getGameData($gameId);
            $gameView = '';
            for ($i = 0; $i < count($gameData) ; $i++) { 
                $gameView .= $this->model->getCarrilView($gameData, $i);
            }
            $rsp = array(
                "error" => false,
                "Message" => "Vista obtenida",
                "view" => $gameView,
                "players" => $gameData[0]['players']   
            );
            echo json_encode($rsp, JSON_UNESCAPED_UNICODE);
            exit;
        }

        public function getInfoCarril()
        {
            $gameId = intval(strClean($_POST['gameId']));
            $carril = intval(strClean($_POST['carril']));
            $data = $this->model->getInfoCarril($gameId, $carril);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            exit;
        }

        public function advanceCart()
        {
            $regId = intval(strClean($_POST['regId']));
            $resultTiro = $this->model->lansarDado();
            $distance = $this->model->getDistance($resultTiro);
            $updateReg = $this->model->updateReg($distance, $regId);
            $rsp = array(
                "error" => false,
                "Message" => "Todo Ok",
                "tiro" => $resultTiro,
                "distance" => $distance 
            );
            echo json_encode($rsp, JSON_UNESCAPED_UNICODE);
            exit;
        }
    }
?>