<div class="container bg-secondary rounded bg-opacity-10 mt-4 ">
    <div class="pt-4 pr-4">
        <div class="d-flex">
            <h4>
                Administrar Productos
            </h4>
            <div class="ms-5">
                <button class="me-5 btn btn-sm btn-info " data-bs-toggle="modal" data-bs-target="#exampleModal"><b>Nuevo</b></button>
            </div>
        </div>
    </div>

    <div class="p-3 overflow-auto">
        <table class="table table-hover table-responsive ">
            <thead class="bg-info ">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Referencia</th>
                    <th>Precio</th>
                    <th>Peso</th>
                    <th>Categoría</th>
                    <th>Stock Disponible</th>
                    <th>Última actualización</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($params['products'] as $product) : ?>
                    <tr>
                        <td>
                            <?= $product->id ?>
                        </td>
                        <td>
                            <?= $product->name ?>
                        </td>
                        <td>
                            <?= $product->reference ?>
                        </td>
                        <td>
                            <?= $product->price ?>
                        </td>
                        <td>
                            <?= $product->weigth ?>
                        </td>
                        <td>
                            <?= $product->category ?>
                        </td>
                        <td>
                            <?= $product->stock ?>
                        </td>
                        <td>
                            <?= $product->updatedAt ?>
                        </td>
                        <td>

                            <div class="d-flex">
                                <div class="mx-3">
                                    <button class="btn btn-sm btn-warning" onclick="getProduct(<?= json_encode($product) ?>)">
                                        <img src="https://img.icons8.com/ios-glyphs/15/ffffff/pencil--v1.png" />
                                    </button>
                                </div>

                                <form action="products/<?= $product->id ?>" method="POST">
                                    <input type="hidden" name="method" value="DELETE">
                                    <button class="btn btn-sm btn-danger ">
                                        <img src="https://img.icons8.com/ios-filled/15/ffffff/delete-trash.png" />
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Productos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="products/create" method="POST">
                    <div class="mt-1">
                        <label>Nombre:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mt-1">
                        <label>Referencia:</label>
                        <input type="text" class="form-control" name="reference" required>
                    </div>
                    <div class="mt-1">
                        <label>Precio:</label>
                        <input type="number" class="form-control" name="price" required>
                    </div>
                    <div class="mt-1">
                        <label>Peso:</label>
                        <input type="number" class="form-control" name="weigth" required>
                    </div>
                    <div class="mt-1">
                        <label>Categoría:</label>
                        <input type="text" class="form-control" name="category" required>
                    </div>
                    <div class="mt-1">
                        <label>Stock:</label>
                        <input type="number" min="0" class="form-control" name="stock" required>
                    </div>
                    <div class="modal-footer mt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

$jsonProducts = toJson($params['products']);
$script = <<<script
    const products = '$jsonProducts'.json()
script;
?>