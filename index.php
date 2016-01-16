<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $squares = $_GET['board'];
        $game = new Game($squares);
       
        /* Check if I won*/
        if($game->winner('o'))
                echo 'You win';
      
        else{
            /* Check if the game tied */
            if($game->checkTie()){
                echo "Game tie";            
            }
            else{   
                /* computer moves */
                $game->makeMove();
                /* Check if the computer wins*/
                if($game->winner('x')){
                    echo 'Computer Wins';
                }else{
                    echo 'No winner yet';
                }
            }
        }
        /* Display the game board */
        $game->display();
        
        /* The game class */
        class Game
        {
            var $position;
            var $newposition;
            
            /* split the string ands store it into position */
            function __construct($squares)
            {
                $this->position = str_split($squares);
            }
            
            /* Display the game */
            function display()
            {
                echo '<h1> 4711 Tic Tac Toe</h1>';
                echo '<table cols = "3" style="font-size:large; font-weight:bold">';
                echo '<tr>';
                
                /* populate the screen */
                for($pos=0; $pos<9;$pos++)
                {
                    /* shows each cell*/
                    echo $this->show_cell($pos);
                    if($pos % 3 == 2)
                        echo '</tr><tr>';
                }
                echo '</tr>';
                echo '</table>';
            
            }
            
            /* the computer makes a move*/
            function makeMove(){
                while(1){
                    $p = rand(0,8);
                    if($this->position[$p] == '-'){
                         $this->position[$p] = 'x';
                         break;
                    }
               
                }
            }
            
            /* check if the game is tied or not */
            function checkTie($board){
                
                for($i =0 ; $i < 9; $i++){
                    if($this->position[$i] == '-')
                        return false;
                }
                
                return true;
            }
            
            /* shows each cell and updates the player's move */
            function show_cell($which)
            {
               
                    
                $token = $this->position[$which];
                if($token <> '-')
                    return '<td>'.$token.'</td>';
                $this->newposition = $this->position;
                /* updates the position */
                $this->newposition[$which] = 'o';
                
                $move = implode($this->newposition);
                $link = '?board='.$move;
                /* make a new link with the new position */
                return '<td><a href="'.$link.'">-</a></td>';
            }
            
            /* Check if the player won or not */
            function winner($token)
            {
                $won = false;
                if(($this->position[0] == $token) &&
                    ($this->position[1] == $token) && 
                    ($this->position[2] == $token)){
                    $won = true;
                }else if(($this->position[3] == $token) &&
                    ($this->position[4] == $token) && 
                    ($this->position[5] == $token)){
                    $won = true;
                }else if(($this->position[6] == $token) &&
                    ($this->position[7] == $token) && 
                    ($this->position[8] == $token)){
                        $won = true;
                }else if(($this->position[0] == $token) &&
                    ($this->position[3] == $token) && 
                    ($this->position[6] == $token)){
                        $won = true;
                }else if(($this->position[1] == $token) &&
                    ($this->position[4] == $token) && 
                    ($this->position[7] == $token)){
                        $won = true;
                }else if(($this->position[2] == $token) &&
                    ($this->position[5] == $token) && 
                    ($this->position[8] == $token)){
                        $won = true;
                }else if(($this->position[0] == $token) &&
                    ($this->position[4] == $token) && 
                    ($this->position[8] == $token)){
                        $won = true;
                }else if(($this->position[2] == $token) &&
                    ($this->position[4] == $token) && 
                    ($this->position[6] == $token)){
                        $won = true;
                }
            return $won;
            }
        }
       
        ?>
    </body>
</html>
