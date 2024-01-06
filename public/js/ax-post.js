function submitForm() {
    var formData = new FormData(document.getElementById('form'));
    var editorValue = CKEDITOR.instances.editor1.getData();
    formData.append('text', editorValue);
    axios.post('/admin/blog/posts/new', formData,text)
        .then(function (response) {
            window.location.pathname = "/admin/blog/posts";

        })
        .catch(function (error) {
            document.getElementById('alert').style.display = 'block';
            var result = document.getElementById('alert_text');
            result.innerHTML = translateErrors(error.response.data.errors);
            setTimeout(function() {
                document.getElementById('alert').style.display = 'none';
            }, 20000);
        });
}
function translateErrors(errors) {
    var translatedErrors = [];
    for (var field in errors) {
        if (errors.hasOwnProperty(field)) {
            translatedErrors.push(errors[field][0]);
        }
    }
    return translatedErrors.join('<br>');
}
