<div class="container bg-secondary rounded bg-opacity-10 mt-4 ">
    <div class="pt-4 pr-4">
        <div class="d-flex">
            <h4>
                Administrar Ventas
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
                    <th>Referencia</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Vendedor</th>
                    <th>Cliente</th>
                    <th>Última actualización</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($params['sales'] as $sale) : ?>
                    <tr>
                        <td>
                            <?= $sale->id ?>
                        </td>
                        <td>
                            <?= $sale->product_id ?>
                        </td>
                        <td>
                            <?= $sale->quantity ?>
                        </td>
                        <td>
                            <?= $sale->total ?>
                        </td>
                        <td>
                            <?= $sale->salesman ?>
                        </td>
                        <td>
                            <?= $sale->customer ?>
                        </td>
                        <td>
                            <?= $sale->updatedAt ?>
                        </td>
                        <td>

                            <div class="d-flex">
                                <div class="mx-3">
                                    <button class="btn btn-sm btn-warning" onclick="getProduct(<?= json_encode($sale) ?>)">
                                        <img src="https://img.icons8.com/ios-glyphs/15/ffffff/pencil--v1.png" />
                                    </button>
                                </div>

                                <form action="products/<?= $sale->id ?>" method="POST">
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ventas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="products/create" method="POST">
                    <div class="mt-1">
                        <label>Referencia:</label>
                        <input type="text" class="form-control" name="product_id" required>
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