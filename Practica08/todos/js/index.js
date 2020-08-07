var $txtTodo = $('#txtTodo');
var $btnAgregarTodo = $('#btnAgregarTodo');
var $divTodos = $('#divTodos');
var $btnLoadTodos = $('#btnLoadTodos');

function btnAgregarTodo_click(e) {

    // parametros a enviar por POST.
    var params = { todo: $txtTodo.val() };

    // Llamada Ajax POST!
    $.post('ajax/add_todo.php', params, function(data) {
        console.log('Llamada Ajax completada ;)');
        console.log(data);
        console.log('id del registro ' + data.id);
        console.log('mensaje del server: ' + data.mensaje);
        if (!data.error) {
            $txtTodo.val('');
            loadTodos();
        }
        else 
            alert('ERROR: ' + data.error);
    });

    console.log('Esto se deberia ejecutar despues de la llamada Ajax.');

}

function btnLoadTodos_click(e) {
    loadTodos();
}

function loadTodos() {
    $divTodos.empty();
    $divTodos.text('Loading...');
    $divTodos.load('ajax/table_todos.php');
}

$btnLoadTodos.on('click', btnLoadTodos_click);
$btnAgregarTodo.on('click', btnAgregarTodo_click);  //  <--

loadTodos();
