<?php
session_start(); // Start the session to maintain data between requests

if(isset($_POST['num'])) {
    // If a number button is pressed, append it to the input
    $_SESSION['expression'] .= $_POST['num'];
} elseif(isset($_POST['op'])) {
    // If an operator button is pressed
    // Check if the last character in the expression is not an operator
    $lastChar = substr($_SESSION['expression'], -1);
    if(!in_array($lastChar, ['+', '-', '*', '/'])) {
        // Append the operator to the input
        $_SESSION['expression'] .= $_POST['op'];
    }
} elseif(isset($_POST['clear'])) {
    // If clear button is pressed, reset the expression
    $_SESSION['expression'] = '';
} elseif(isset($_POST['equal'])) {
    // If equal button is pressed, evaluate the expression
    $expression = $_SESSION['expression'];
    // Use eval function to evaluate the expression
    $result = eval("return $expression;");
    $_SESSION['expression'] = $result; // Store the result in session for further operations
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALCU_LATER</title>
    <style>
        body {
            background-color: rgb(163, 159, 159);
        }
        .calc {
            margin: auto;
            background-color: black;
            border: 2px solid whitesmoke;
            width: 24%;
            height: 630px;
            border-radius: 20px;
            box-shadow: 10px 10px 40px;
        }
        .maininput {
            background-color: black;
            border: 1px solid grey;
            height: 125px;
            width: 98.2%;
            font-size: 80px;
            color: whitesmoke;
            font-weight: 00;
        }
        .numbtn {
            padding: 30px 35px;
            border-radius: 50px;
            font-weight: 500;
            font-size: large;
            background-color: rgb(155, 154, 154);
        }
        .numbtn:hover {
            background-color: rgb(136, 133, 133);
            color: whitesmoke;
        }
        .calbtn {
            padding: 30px 35px;
            border-radius: 50px;
            font-weight: 500;
            font-size: 30px;
            background-color: orange;
        }
        .calbtn:hover {
            background-color: rgb(211, 140, 7);
            color: whitesmoke;
        }
        .c {
            padding: 30px 35px;
            border-radius: 50px;
            font-weight: 500;
            font-size: large;
            background-color: red;
        }
        .c:hover {
            background-color: rgb(188, 16, 16);
            color: whitesmoke;
        }
        .equal {
            padding: 30px 35px;
            border-radius: 50px;
            font-weight: 500;
            font-size: large;
            background-color: rgb(8, 181, 8);
        }
        .equal:hover {
            background-color: green;
            color: whitesmoke;
        }
    </style>
</head>
<body>
    <div class="calc">
        <h2>Basic Calculator</h2>
        <form action="" method="post">
            <!-- Display the expression -->
            <input type="text" class="maininput" name="expression" value="<?php echo @$_SESSION['expression'] ?>" disabled><br><br>
            <!-- Buttons for numbers -->
            <input type="submit" class="numbtn" name="num" value="7">
            <input type="submit" class="numbtn" name="num" value="8">
            <input type="submit" class="numbtn" name="num" value="9">
            <!-- Operator buttons -->
            <input type="submit" class="calbtn" name="op" value="+"><br>
            <input type="submit" class="numbtn" name="num" value="4">
            <input type="submit" class="numbtn" name="num" value="5">
            <input type="submit" class="numbtn" name="num" value="6">
            <input type="submit" class="calbtn" name="op" value="-"><br>
            <input type="submit" class="numbtn" name="num" value="1">
            <input type="submit" class="numbtn" name="num" value="2">
            <input type="submit" class="numbtn" name="num" value="3">
            <input type="submit" class="calbtn" name="op" value="*"><br>
            <!-- Clear and equal buttons -->
            <input type="submit" class="c" name="clear" value="c">
            <input type="submit" class="numbtn" name="num" value="0">
            <input type="submit" class="equal" name="equal" value="=">
            <input type="submit" class="calbtn" name="op" value="/">
        </form>
    </div>
</body>
</html>
