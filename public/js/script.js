
function previewImage(){
    const gambar=document.querySelector('#icon_produk');
    const previewGambar=document.querySelector('.img-preview');
    const labelGambar=document.querySelector('.custom-file-label');
    // ganti url
    labelGambar.textContent = gambar.files[0].name;
    // ganti url
    const fileGambar = new FileReader();
    fileGambar.readAsDataURL(gambar.files[0]);
    
    fileGambar.onload = function(e){
        previewGambar.src = e.target.result;
    }

}
