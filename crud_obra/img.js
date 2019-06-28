function imgValidation(){
var fileInput = document.getElementById('file');
var filePath = fileInput.value;
var allowedExtensions = /(.jpg)|(.jpeg)|(.png)|(.bmp)|(.gif)$/i;
if(!allowedExtensions.exec(filePath)){
alert('SOLO ARCHIVOS CON EXTENCIÓN .jpg .png .bmp .gif');
$("#file").val(''); 
return false;
}
} 
