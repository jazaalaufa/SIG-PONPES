if ('serviceWorker' in navigator) {
  window.addEventListener('load', function() {
    navigator.serviceWorker.register('/../sw.js').then(function(registration) {
      // Registration was successful
      console.log('ServiceWorker registration successful with scope: ', registration.scope);
    }).catch(function(err) {
      // registration failed :(
      console.log('ServiceWorker registration failed: ', err);
    });
  });
}

// add2numbers.js
function kalkulator() {
    let angka = document.querySelectorAll("input.angka");
    let i1= parseInt(angka[0].value) ; //angka pertama
    let i2= parseInt(angka[1].value) ; //angka kedua
    angka[2].value= i1 + i2 ;
    let pesan = document.getElementById('message');
    pesan.innerHTML="Selesai";
}
let tombol = document.querySelector("button.tambah");
tombol.addEventListener('click', kalkulator);