<?php
//  ## Snack 1
// Creiamo un array contenente le partite di basket di un’ipotetica tappa del calendario. Ogni array avrà una squadra di casa e una squadra ospite, punti fatti dalla squadra di casa e punti fatti dalla squadra ospite. Stampiamo a schermo tutte le partite con questo schema.
// Olimpia Milano - Cantù | 55-60

// ## Snack 2
// Passare come parametri GET name, mail e age e verificare (cercando i metodi che non conosciamo nella documentazione) che name sia più lungo di 3 caratteri, che mail contenga un punto e una chiocciola e che age sia un numero. Se tutto è ok stampare “Accesso riuscito”, altrimenti “Accesso negato”

// ## Snack 4
// Creare un array con 15 numeri casuali, tenendo conto che l’array non dovrà contenere lo stesso numero più di una volta
?>
<?php
//  ## Snack 1
$myArr = [
    [
    "home" =>    [     
                    "team" => "Olimpia Milano",
                    "score" => "55",
                ],
    "away" =>    [     
                    "team" => "Cantù",
                    "score" => "60",
                ],       
    ]
];
// ## Snack 2

// NAME

if (isset($_GET['name'])) {
    $name = $_GET['name'];
    if (strlen($name) <= 3) {
        $messageName = 'Name too short';
    } else {
        $messageName = 'Valid Name';
    }
} else {
    $name = '';
    $messageName = 'Insert name';
}

// MAIL

if (isset($_GET['mail']) && $_GET['mail'] != '') {
    $mail = $_GET['mail'];

    $snail = strpos($mail, '@');

    if ($snail && strpos($mail, '.', $snail)) {
        $messageMail = 'OK mail!';
    } else {
        $messageMail = 'KO mail!';
    }
} else {
    $mail = '';
    $messageMail = 'Insert mail';
};

// AGE

if (isset($_GET['age'])) {
    $age = $_GET['age'];
    if (is_numeric($age)) {
        $messageAge = 'Age is correct';
    }   else {
        $messageAge = 'Age is NaN';
    }
} else {
    $age = '';
    $messageAge = 'Insert age';
}

// ## Snack 4
$arrNumbers = [];

while (count($arrNumbers) < 15) {
    $number = rand(0, 100);
     if(!in_array($number, $arrNumbers)) {
        $arrNumbers[] = $number;
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Snacks</title>
</head>
<body>
    <h1>Snack 1</h1>
    <ul>
        <?php for ($i = 0; $i < count($myArr); $i++) { ?>
           <li>
                <?php echo $myArr[$i]['home']['team']; ?>
                - 
                <?php echo $myArr[$i]['away']['team']; ?>
                | 
                <?php echo $myArr[$i]['home']['score']; ?>
                - 
                <?php echo $myArr[$i]['away']['score']; ?>
           </li>
        <?php } ?>
    </ul>

    <h1>Snack 2</h1>
    <form action="" method="get">
        <label for="name">Name</label>
		<input type="text" name="name" id="name" value=<?= $name ?>>
		<button>Confirm</button> 
    </form>
    <h3><?= $messageName ?></h3>
    <form action="" method="get">
    <label for="mail">Mail</label>
		<input type="text" name="mail" id="mail" value=<?= $mail ?>>
		<button>Confirm</button>    
    </form>
    <h3><?= $messageMail ?></h3>
    <form action="" method="get">
    <label for="age">Age</label>
		<input type="text" name="age" id="age" value=<?= $age ?>>
		<button>Confirm</button>
    </form>
    <h3><?= $messageAge ?></h3>

    <h1>Snack 4</h1>
    <ul>
        <?php for ($i = 0; $i < count($arrNumbers); $i++) { ?>
           <li>
                <?php echo $arrNumbers[$i]; ?>
           </li>
        <?php } ?>
    </ul>
</body>
</html>