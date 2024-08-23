<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="custom-form" method="POST" action="amo.php">                        
                        <?php
                        if( isset($_GET["send"]) && $_GET["send"] == "ok" ){?>
                            <p>Форма отправлена!</p>
                        <?php }
                        ?>
                        <div class="mb-3">
                            <label for="name" class="form-label">Имя</label>
                            <input type="text" name="name" class="form-control" id="name" required placeholder="Введите ваше имя">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required placeholder="Введите ваш email">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Телефон</label>
                            <input type="tel" name="phone" class="form-control" id="phone" required placeholder="Введите ваш телефон">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Цена</label>
                            <input type="number" name="price" class="form-control" id="price" placeholder="Введите цену">
                        </div>
                        <input type="hidden" id="visiting-time" name="visiting-time" required value="0">
                        <button type="submit" class="btn btn-primary float-end">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>