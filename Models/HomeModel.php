<?php

class HomeModel extends Mysql
{
    public $playerName;

    public function __construct()
    {
        parent::__construct();
    }

    public function addPlayer(string $playerName, int $gameId, int $carril)
    {
        $this->playerName = $playerName;
        $sql = "INSERT INTO players (name) VALUES(?)";  
        $arrData = array($this->playerName);    
        $request = $this->insert($sql, $arrData);        
        $this->registGame($request, $gameId, $carril);
        return $request;  
    }

    public function initGame(int $quantity, int $pista)
    {
        $sql = "INSERT INTO games(players, id_pista, state) VALUES(?,?,?)";
        $inGame_state = 1;
        $arrData = array($quantity, $pista, $inGame_state);
        $request = $this->insert($sql, $arrData);        
        return $request;
    }

    public function registGame(int $playerId, int $gameId, int $carril)
    {
        $sql = "INSERT INTO registers(game_id, player_id, carril ) VALUES(?,?,?)";
        $arrData = array($gameId, $playerId, $carril);
        $request = $this->insert($sql, $arrData);
        return $request;
    }

    public function getGameData(int $gameId)
    {
        $sql = "SELECT g.players, g.state, r.player_id, r.advanced_km, r.carril, p.name AS name_player, pis.name_pista, pis.kilometros AS max_kilometros, pis.id_pista FROM games g
        LEFT JOIN registers r ON g.id = r.game_id
        LEFT JOIN players p ON r.player_id = p.id_player
        LEFT JOIN pistas pis ON g.id_pista = pis.id_pista
        WHERE g.id = $gameId
        ORDER BY r.carril ASC";
        $request = $this->select_all($sql);
        return $request;      
    }   
    
    public function getCarrilView(array $gameData,int  $i)
    {
       $carrilView = '  
        <div class="form-group my-4">
            <label for="carril' . ($i + 1) . '" class="form-label">Carril ' . ($i + 1) . ', ' . $gameData[$i]['name_player'] . '</label>
            <input type="range" class="form-range" value="' . $gameData[$i]['advanced_km'] . '" min="0" max="' . $gameData[$i]['max_kilometros'] .'" id="carril' . ($i + 1) . '">
        </div>';
        return $carrilView;
    }

    public function getInfoCarril(int $gameId, int $carril)
    {
        $sql = "SELECT r.id AS id_register, r.advanced_km, r.player_id, r.carril, p.name  FROM registers  r
        LEFT JOIN players p ON r.player_id = p.id_player
        WHERE game_id = $gameId AND carril = $carril";
        $request = $this->select($sql);
        return $request;
    }

    public function lansarDado()
    {
        $result = rand(1, 6);
        return $result;
    }

    public function getDistance(int $tiro)
    {
        $distance = $tiro * 100;
        return $distance;
    }

    public function updateReg($distance, $regId)
    {
        //aqui lo deje ._. se me acabo el tiempo
    }

}

