<?php
try{
   $settings = parse_ini_file('config/config.ini', TRUE);
   $homeDir = $settings['files']['homedir'];

   require_once "{$homeDir}/config/ToolsPDO.php";
   $bd = new ToolsPDO();

   $resultGames = $bd->query(
      'SELECT *
      FROM jogo_mgt; '
   );
   $games = $resultGames->fetchAll(PDO::FETCH_ASSOC);
   foreach($games as $game){
      echo "<p>#{$game['id_jogo_mgt']}: {$game['nome']}</p>";
   }
}
catch(Exception $e){
   echo $e->getMessage();
}

?>
