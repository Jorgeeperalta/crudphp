$(document).ready(function() {
    // Cargar artículos al cargar la página
    loadArticles();

    // Agregar artículo
    $('#addArticleForm').submit(function(e) {
        e.preventDefault();
    
        var formData = new FormData(this);
        formData.append('title', $('#title').val());
        formData.append('content', $('#content').val());
    
        $.ajax({
            url: 'add_article.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#addArticleModal').modal('hide');
                $('#addArticleForm')[0].reset();
                showMessage(response.message, response.class);
                loadArticles();
            }
        });
    });
    


    // Cargar artículo para editar
    $(document).on('click', '.editBtn', function() {
        var articleId = $(this).data('id');
        console.log(articleId + 'debe ser el id');
        $.ajax({
            url: 'get_article.php',
            type: 'POST',
            data: {
                id: articleId
            },
            dataType: 'json', // Especificar el tipo de datos esperados como JSON
            success: function(response) {
                $('#editArticleId').val(response.id);
                $('#editTitle').val(response.title);
                $('#editContent').val(response.content);
                $('#editArticleModal').modal('show');
                console.log(response.title);
            }
        });
    });
    
    // Guardar cambios en el artículo
    $('#editArticleForm').submit(function(e) {
        e.preventDefault();

        var articleId = $('#editArticleId').val();
       
        var title = $('#editTitle').val();
        var content = $('#editContent').val();
        console.log(articleId + '' + title + ''+ content);
        $.ajax({
            url: 'edit_article.php',
            type: 'POST',
            data: {
                id: articleId,
                title: title,
                content: content
            },
            success: function(response) {
                $('#editArticleModal').modal('hide');
                $('#editArticleForm')[0].reset();
                showMessage(response.message, response.class);
                loadArticles();
            }
        });
    });

    // Eliminar artículo
    $(document).on('click', '.deleteBtn', function() {
        if (confirm('¿Estás seguro de eliminar este artículo?')) {
            var articleId = $(this).data('id');

            $.ajax({
                url: 'delete_article.php',
                type: 'POST',
                data: {
                    id: articleId
                },
                success: function(response) {
                    showMessage(response.message, response.class);
                    loadArticles();
                }
            });
        }
    });

    // Función para cargar los artículos
    function loadArticles() {
        $.ajax({
            url: 'get_articles.php',
            type: 'GET',
            success: function(response) {
                $('#articlesList').html(response);
            }
        });
    }

    // Función para mostrar mensajes
    function showMessage(message, className) {
        $('#message').html('<div class="alert ' + className + '">' + message + '</div>');
    }
});
