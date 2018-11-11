<div id="editarDepartamentoModal2" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="editarDepartamento">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Departamento</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="datos_ajax"></div>
                    <div class="form-group">
                        <label>Nombre del departamento</label>
                        <input type="text" name="txtNombreDepartamento"  id="edit_name" class="form-control" required>
                        <input type="hidden" name="txtIdDepartamento" id="edit_id" >
                        <input type="hidden" id="opcion" name="opcion" value="modificar">
                        <div>
                            <p class="msgExiste"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-success" value="Actualizar">
                    </div>
            </form>
        </div>
    </div>
</div>
