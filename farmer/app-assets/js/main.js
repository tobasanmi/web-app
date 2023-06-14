function pricereflector() {
    value = document.getElementById("pricevalue").value;
    document.getElementById("price_reflector").innerHTML = value;
}



if (window.FileReader) {
    function handleFileSelect(evt) {
        var files = evt.target.files;
        var f = files[0];
        var reader = new FileReader();
        reader.onload = (function (theFile) {
            return function (e) {

                document.getElementById('display_pic').innerHTML = ['<img src="', e.target.result, '" title="', theFile.name, '" />'].join('');
                document.getElementById('display_pic').style.borderColor = "transparent";
                document.getElementById('display_pic').style.width = "auto";
            };
        })(f);
        reader.readAsDataURL(f);
    }
}
else {
    alert('This browser does not support FileReader');
}
document.getElementById('displaypic').addEventListener('change', handleFileSelect, false);

