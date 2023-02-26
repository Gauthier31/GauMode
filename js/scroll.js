var outfit = 0;

window.addEventListener('wheel', function (event) {
    if (event.deltaY < 0) {
        outfit--
    } else if (event.deltaY > 0) {
        outfit++
    }
    if (outfit < 1)
        outfit = 1

    test(outfit)
});

function test(value) {
    console.log(value)
    //document.querySelector('#btnotf' + value).click();
    window.location.href = "http://localhost/GauMode/#otf" + value;
    //window.location.assign("http://localhost/GauMode/#otf3")
}