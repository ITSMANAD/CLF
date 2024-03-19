
function copytoclip() {
    const span = document.getElementById("copy");

    span.onclick = function() {
        document.execCommand("copy");
    }

    span.addEventListener("copy", function(event) {
        event.preventDefault();
        if (event.clipboardData) {
            event.clipboardData.setData("text/plain", span.textContent);
            console.log(event.clipboardData.getData("text"))

        }
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


