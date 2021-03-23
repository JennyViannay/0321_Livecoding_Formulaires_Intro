<?php

$errors = [];

$options = ['opel','bmw','audi','volvo','peugeot'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['message']) && !empty($_POST['XXS'])) {
        // trim les valeurs post
        $data = array_map('trim', $_POST);
        // vérifier email is ok 
        $isOkEmail = filter_var($data['email'], FILTER_VALIDATE_EMAIL);

        if ($isOkEmail === false) {
            $errors[] = "L'email saisie n'est pas valide";
        }
        if (strlen($data['message']) < 5) {
            $errors[] = "Le message dpot être supp à 5 caractères !";
        }
    } else {
        $errors[] = "Tous les champs sont requis";
    }
}

// if (isset($_POST)) {
//     var_dump($_POST);
//     var_dump('2eme condition');
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livecoding - Les formulaires</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">




        <form method="POST" action="">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="XXS" class="form-label">XXS</label>
                <input type="text" name="XXS" class="form-control" id="XXS">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label"></label>
                <textarea class="form-control" name="message" id="message" rows="3"></textarea>
            </div>
            <div class="text-center">
                <label for="cars">Choose a car:</label>
                <select name="cars" id="cars" form="carform">
                <?php foreach ($options as $option) { ?>
                    <option value="<?= $option ?>"><?= $option ?></option>
                <?php } ?>
                </select>
            </div>
            <?php
            if (!empty($errors)) {
                foreach ($errors as $error) {
            ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
            <?php
                }
            }
            ?>
            <div class="text-center">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>