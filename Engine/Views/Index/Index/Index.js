function deleteProfile(id, event) {
    var trgt = event.target;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/Profiles/deleteProfile/?profileId=' + id, true);
    xhr.send();
    xhr.onloadend  = function() {
        var response = xhr.responseText;
        var jsn = JSON.parse(response);
        if (jsn.result > 0) {
            trgt.parentNode.parentNode.parentNode.remove();
        }
    }
}