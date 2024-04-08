<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD on PHP MySQL AJAX Bootstrap 5.3</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center h2 my-3">CRUD on PHP MySQL AJAX Bootstrap 5.3</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button class="btn btn-primary rounded-0 btn-add" data-bs-toggle="modal" data-bs-target="#addContent">Add content</button>
            </div>
            <div class="table-responsive my-3">
                <?php if (!empty($cities)) : ?>
                    <?= $pagination; ?>
                    <table class="table table-hover table-striped">
                        <!-- <thead class="table-dark"> -->
                        <thead class="table-secondary">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Population</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cities as $city) : ?>
                                <tr id="city-<?= $city['id']; ?>">
                                    <th scope="row"><?= $city['id']; ?></th>
                                    <td><?= $city['name']; ?></td>
                                    <td><?= $city['population']; ?></td>
                                    <td>
                                        <button class="btn btn-info btn-edit" data-id="<?= $city['id']; ?>" data-bs-toggle="modal" data-bs-target="#editContent">Edit</button>
                                        <button class="btn btn-danger btn-delete" data-id="<?= $city['id']; ?>">
                                            Delete</button>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?= $pagination; ?>

                <?php else : ?>
                    <p>Cities not found...</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Modal Add -->
    <div class="modal fade" id="addContent" tabindex="-1" aria-labelledby="addContent" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add content</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit-->
    <div class="modal fade" id="editContent" tabindex="-1" aria-labelledby="editContent" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit content</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>