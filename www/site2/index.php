<?php include 'foo.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="/bootstrap4_6_2/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" /> -->
    <!-- <link rel="stylesheet" href="/bootstrap4_6_2/css/all.css" /> -->
    <link rel="stylesheet" href="/bootstrap4_6_2/css/fontawesome-free-5.15.4-web/css/all.css">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <button class="btn btn-success mt-2" data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i></button>

                <table class="table table-striped table-hover mt-2">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $res) { ?>
                            <tr>
                                <td><?php echo $res->id; ?></td>
                                <td><?php echo $res->name; ?></td>
                                <td><?php echo $res->email; ?></td>
                                <td>
                                    <a href="?id=<?php echo $res->id; ?>" class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $res->id; ?>"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $res->id; ?>"><i class="fa fa-trash-alt"></i></a>
                                </td>
                            </tr>

                            <!-- Modal  edit -->
                            <div class="modal fade" id="edit<?php echo $res->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Изменить запись</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="?id=<?php echo $res->id; ?>" method="post">
                                                <div class="form-group">
                                                    <small>ID</small>
                                                    <input type="text" class="form-control" name="id" value="<?php echo $res->id; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <small>Имя</small>
                                                    <input type="text" class="form-control" name="name" value="<?php echo $res->name; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <small>Email</small>
                                                    <input type="text" class="form-control" name="email" value="<?php echo $res->email; ?>">
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                            <button type="submit" class="btn btn-primary" name="edit">Сохранить</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal edit -->
                            <!-- Modal  delete -->
                            <div class="modal fade" id="delete<?php echo $res->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Удалить запись № <?php echo $res->id; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="?id=<?php echo $res->id; ?>" method="post">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                                <button type="submit" class="btn btn-danger" name="delete">Удалить</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal delete -->
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn-outline-danger">Назад</a>
    </div>

    <!-- Modal create -->
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить запись</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <small>Имя</small>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <small>Email</small>
                            <input type="text" class="form-control" name="email">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary" name="add">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal create -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="/bootstrap4_6_2/js/jquery.slim.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script> -->
    <script src="/bootstrap4_6_2/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

</body>


</html>