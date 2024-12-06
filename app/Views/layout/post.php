<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <!-- This is Navbar -->
    <?= $this->include('layout/navbar'); ?>

    <!-- This is Header -->
    <?= $this->include('layout/header'); ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <?= $this->renderSection('content'); ?>
            </div>
            <div class="col-md-4">
                <?= $this->include('layout/sidebar'); ?>
            </div>
        </div>
    </div>

    <?= $this->include('layout/footer'); ?>


    <!-- This is bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- Script End -->

</body>


</html>