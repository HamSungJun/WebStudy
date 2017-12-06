<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?
        $seoul_data = file("seoul.txt");
        // print_r($seoul_data);
        
        $lines = array();
        $pointer = 0;
        foreach ($seoul_data as $data_lines) {
            $lines[$pointer] = $data_lines;
            $pointer++;
        }

      
        $SN = array();
        $SHH = array();
        $Ncar = array();
        $SHouse = array();
        $income = array();

        
        // print_r($lines);

       
        
        

    
        // for ($i=0; $i < count($lines) ; $i++) { 
            
        // // }
        
        
    ?>
</body>
</html>