<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="style.css?v=<?= time(); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>
<body>
   <div class="logdash-cover ">
    <div class="d-flex justify-content-center w-100 vh-100">
        <div class="right w-75 d-flex flex-column justify-content-center align-items-center">
            <h3>Khusus Admin Yang Mengakses.</h3>
            <form class="w-50 py-5" id="regisdaft">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control form-control-sm rounded-3" id="floatingInput" id="username" placeholder="Masukan Nama" require>
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control form-control-sm rounded-3" id="floatingPassword" placeholder="Password" require>
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-text mb-4 text-center">
                    Pastikan <span  class="link-success text-decoration-none">Username</span> dan <span class="link-success text-decoration-none">Password</span> sudah sesuai.
                </div>
                <button type="submit" class="btn btn-success fw-semibold rounded-0 w-100" id="subkir">Masuk</button>
            </form>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>