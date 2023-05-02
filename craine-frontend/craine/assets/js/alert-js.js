/*

@author:    Dovletmammet Geldiyev
@version:   1.0
@project:   Alert.js
@license:   MIT

*/


function alertJS(message, type, duration) {
    if (duration == null) {
        duration = 5000;
    }
    // create alert div
    const alert = document.createElement('div');
    alert.classList.add('alert');
    alert.classList.add('alert-' + type);
    alert.innerText = message;
    document.body.appendChild(alert);
    setTimeout(() => {
        alert.remove();
    }, duration);
}