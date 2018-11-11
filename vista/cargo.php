<?php include 'partials/head.php'; ?>
<?php
include '../controlador/CargoControlador.php';

if (isset($_SESSION["usuario"])) {

} else {
    header("location:index.php");
}
?>
<?php include 'partials/menu.php'; ?>

<div class="container listado">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    LISTADO DE CARGOS
                    <a href="#agregarCargoModal" class="btn btn-sm btn-outline-dark float-right" data-toggle="modal">Agregar cargo</a>
                </div>
                <div class="card-body">
                    <table id="dtDefault" class="table table-sm table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Nombre del cargo</th>
                            <th class="text-center">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $data = CargoControlador::mostrarCargos();

                        foreach ($data as $row) {
                            $idCargo = $row['idCargo'];
                            $nombreCargo = $row['nombreCargo'];
                        ?>
                <tr>            
                     <td><?php echo $idCargo;?></td>
                     <td><?php echo $nombreCargo; ?></td>
               <td class="text-center">
                    <a href="#" data-toggle="modal" data-target="#editarCargoModal"
                      data-id="<?php echo $idCargo; ?>"
                      data-name="<?php echo $nombreCargo;?>">
                        <i class="material-icons" data-toggle="tooltip" title="Editar" style="color: #FFC107;">edit</i>
                    </a>
                    <a href="#" data-toggle="modal" data-target="#eliminarCargoModal"
                       data-id="<?php echo $idCargo ?>"
                       data-name="<?php echo $nombreCargo ?>">
                        <i class="material-icons" data-toggle="tooltip" title="Eliminar" style="color: #F44336;">delete</i>
                    </a>                                    
                </td>
                </tr>
                       <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php include("modal/agregarCargo.php");?>
            </div>
        </div>
        <?php include 'modal/eliminarCargo.php'?>
    </div>
</div>


<?php include("modal/editarCargo.php");?>
<?php include 'partials/footer.php'; ?>
