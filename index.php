<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Artículos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="container">
        <h1>CRUD de Artículos</h1>

        <div id="message"></div>

        <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addArticleModal">Agregar Artículo</button>

        <table id="table">
            <thead >
            <tr >
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Archivo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="articlesList"></tbody>
        </table>
    </div>

    <!-- Modal para agregar artículo -->
    <div class="modal fade" id="addArticleModal" tabindex="-1" role="dialog" aria-labelledby="addArticleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addArticleModalLabel">Agregar Artículo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addArticleForm">
                        <div class="form-group">
                            <label for="title">Título:</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Contenido:</label>
                            <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="content">Subir archivo:</label>
                            <input type="file" class="form-control-file" id="file" name="file">

                        </div>


                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar artículo -->
    <div class="modal fade" id="editArticleModal" tabindex="-1" role="dialog" aria-labelledby="editArticleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editArticleModalLabel">Editar Artículo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editArticleForm">
                    <input id="editArticleId" name="id">
                        <div class="form-group">
                            <label for="editTitle">Título:</label>
                            <input placeholder="sdfasd"  type="text" class="form-control" id="editTitle" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="editContent">Contenido:</label>
                            <textarea class="form-control" id="editContent" name="content" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>
