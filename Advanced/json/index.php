<?php
    function vd ($input) {
        echo "<pre>";
        var_dump($input);
        echo "</pre>";
    }
    // $students = ['Yusra'=>17,'Ayesha'=>20,'Khadija'=>17,'Huzaifa'=>18,'Kashan'=>19,'Hamza'=>20,'Clayton'=>19,'Anshara'=>18,'Zeeshan'=>19];    
    // vd($students);

    // $jsondata = json_encode($students);
    // vd($jsondata);

    // $mydata = json_decode($jsondata);
    // vd($mydata);

    $json_data = file_get_contents('menu.json');// reads json file
    // vd($data);
    $menus = json_decode($json_data);// decode json to array
    // vd($menu);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Sr.#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Calories</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $srno = 1;
                foreach($menus as $menu) {
            ?>
                <tr>
                    <td><?php echo $srno ?></td>
                    <td><?php echo $menu->name ?></td>
                    <td><?php echo $menu->price ?></td>
                    <td><?php echo $menu->description ?></td>
                    <td><?php echo $menu->calories ?></td>
                </tr>        
            <?php
                $srno++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>