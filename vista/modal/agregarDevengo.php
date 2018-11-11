<div id="agregarDevengoModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="nuevoDevengo">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar asignación</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tipo de asignacion</label>
                        <input type="text" name="txtNombreDevengo"  id="nombreDevengo" class="form-control">
                        <input type="hidden" id="opcion" name="opcion" value="registrarDevengo">
                        <div>
                            <p class="msgExiste"></p>
                        </div>
                    </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-success" value="Agregar">
                </div>
            </form>
        </div>
    </div>
</div>
