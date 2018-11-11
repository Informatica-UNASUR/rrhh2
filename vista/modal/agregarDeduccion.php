<div id="agregarDeduccionModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="nuevoDeduccion">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar descuentos</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tipo de descuento</label>
                        <input type="text" name="txtNombreDeduccion"  id="nombreDeduccion" class="form-control">
                        <input type="hidden" id="opcion" name="opcion" value="registrarDeduccion">
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-success" value="Agregar">
                </div>
            </form>
        </div>
    </div>
</div>
