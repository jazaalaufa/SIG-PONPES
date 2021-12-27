function findLocation(x,y) {
// console.log(x,y);
	for (var i=0; i< places.length;i++) 
	{
		if (places[i].lokasi[0]==x &&
			places[i].lokasi[1]==y) {
			
			return i;
			}
		}
		return -1;
	}

function showLocation(e) {
	console.log("you clicked " + e.latlng.lat + " dan "+ e.latlng.lng);
	
	let ix= findLocation(e.latlng.lat,e.latlng.lng);
	
	if (ix >=0) 
	{
		// img.src= places[ix].gambar;
		par.textContent=places[ix].review;
	}
}

let gmb= document.getElementById("gmb");
//let gmb2= document.getElementById("gmb2");
//let gmb3= document.getElementById("gmb3");
let rev= document.getElementById("review");
let img= document.createElement('img');
let par= document.createElement('div');

gmb.appendChild(img);
//gmb2.appendChild(img);
//gmb3.appendChild(img);
rev.appendChild(par);

let r0="restoran spanyol di jakarta yang dekat dengan kantor saya";
let r1="warung kopi cita rasa yang sangat tinggi dengan harga yang murah";
let r2="Ikan bakar kualitas tinggi, hampir gosong tapi belum";
let r3="Steak lokal harga impor, 200gr dan 300gr mentah ";
let r4="<h4>dfdf</h4>seafood international lobster, king crabs, cumi, kerang, semua ada";

let places= [
{
	"lokasi"  : [-6.585659, 110.6567],
	"sponsor" : "Resto Spanyol",
	"gambar"  : "https://media-cdn.tripadvisor.com/media/photo-s/08/9e/0e/4a/restaurante-cafe-royalty.jpg",
	"review"  : r0
},
{
	"lokasi" : [-6.551723, 110.753174],
	"sponsor" : "Warung Kopi",
	"gambar" : "https://2.bp.blogspot.com/-taLprboLqh0/WWyfyXZFHDI/AAAAAAAAAH4/i6qKyELNSnYo5wow8CEaJe_jg3G5_IJ4wCLcBGAs/s1600/kedai-kopi-pegipegi.jpg",
	"review": r1
},
{
	"lokasi": [-6.589986, 110.667214], 
	"sponsor" : "Pondok Ikan Bakar", 
	"gambar" : "https://assets-pergikuliner.com/I8fTs-Ewt23disAi51vc-Fl6zTY=/385x290/smart/https://assets-pergikuliner.com/uploads/image/picture/206596/picture-1461560200.JPG", 
	"review": r2
}, 
{
	"lokasi": [-6.561785, 110.659103], 
	"sponsor" : "STEAK cow",
	"gambar": "https://img.taste.com.au/NmcRS-oj/taste/2016/11/garlic-and-rosemary-t-bone-steaks-with-warm-potato-salad-102927-1.jpeg",
	"review": r3
},
{
	"lokasi": [-6.988366, 110.381141], 
	"sponsor" : "PP Kombinasi!!", 
	"gambar": "https://www.stockland.com.au/~/media/shopping-centre/common/campaigns/a-to-z-of-mmmm/miguels-seafood-bbq/miguel-maestres-seafood-bbq--a-to-z-of-mmmm.jpg",
	"review": r4
}
];


for (var p of places) {
var marker= L.marker(p.lokasi).addTo(kombinasi)
.bindPopup(p.sponsor);
marker.on('click', showLocation);
}