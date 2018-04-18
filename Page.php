<?php

class Page {
   public $config;
   public $homeDir;
   public $bd;

   function __construct(){
      $this->config = parse_ini_file('config/config.ini', TRUE);
      $this->homeDir = $this->config['files']['homedir'];

      require_once "{$this->homeDir}/config/ToolsPDO.php";
      $this->bd = new ToolsPDO();
   }

   public function show(){
      $resultGames = $this->bd->query(
         'SELECT *
         FROM jogo_mgt; '
      );
      $games = $resultGames->fetchAll(PDO::FETCH_ASSOC);
      foreach($games as $game){
         echo "<p>#{$game['id_jogo_mgt']}: {$game['nome']}</p>";
      }
   }

}
