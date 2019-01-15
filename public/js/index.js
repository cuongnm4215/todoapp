$(document).ready(function() {
    const _token = $('meta[name=csrf-token]').attr('content');
    const base_url = window.location.origin;
    function updateTodo(todoId) {
        $.ajax({
            method: 'POST',
            url: base_url + '/update',
            dataType: 'json',
            data: {
                id: todoId,
                _token
            },
            success: function(data) {
                if (data.status) return window.location.reload();
                return false;
            },
            error: function() {
                alert('Error');
            }
        })
    }

    function deleteTodo(todoId) {
        $.ajax({
            method: 'POST',
            url: base_url + '/delete',
            dataType: 'json',
            data: {
                id: todoId,
                _token
            },
            success: function(data) {
                if (data.status) return window.location.reload();
                return false;
            },
            error: function() {
                alert('Error');
            }
        })
    }

    $('.todo-done').click(function() {
        let id = $(this).parent().attr('data-content');
        updateTodo(id);
    });
    $('.todo-delete').click(function() {
        let id = $(this).closest('.todo-item').attr('data-content');
        deleteTodo(id);
    });
});
