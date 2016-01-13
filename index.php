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
        $game->display();
        if($game->winner('o'))
                echo 'You win';
        else if($game->winner('x'))
                echo 'I win';
        else
                echo 'No winner yet';
        

        class Game
        {
            var $position;
            var $newposition;
            function __construct($squares)
            {
                $this->position = str_split($squares);
            }
            function display()
            {
                
                echo '<table cols = "3" style="font-size:large; font-weight:bold">';
                echo '<tr>';
                for($pos=0; $pos<9;$pos++)
                {
                    echo $this->show_cell($pos);
                    if($pos % 3 == 2)
                        echo '</tr><tr>';
                }
                echo '</tr>';
                echo '</table>';
            
            }
            function show_cell($which)
            {
                $token = $this->position[$which];
                if($token <> '-')
                    return '<td>'.$token.'</td>';
                $this->newposition = $this->position;
                $this->newposition[$which] = 'o';
                $move = implode($this->newposition);
                $link = '/?board='.$move;
                return '<td><a href="'.$link.'">-</a></td>';
            }
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
