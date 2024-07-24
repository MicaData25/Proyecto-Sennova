<div class="modal fade" id="modalFinanciados" tabindex="-1" role="dialog" aria-labelledby="modalFinanciadosLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFinanciadosLabel">Proyectos Financiados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="searchForm">
                    <div class="form-group">
                        <label for="projectName">Nombre del Proyecto</label>
                        <input type="text" class="form-control" id="projectName" name="projectName">
                    </div>
                    <button type="button" class="btn btn-primary" id="searchButton">Buscar</button>
                </form>
                <div id="searchResults" class="mt-4">
                    <!-- Los resultados de búsqueda aparecerán aquí -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
