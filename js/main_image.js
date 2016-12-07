var myImage = document.getElementById("backgroundImage");
var imageArray = ["images/background (1).jpg","images/background (2).jpg","images/background (3).jpg","images/background (4).jpg",];
var imageIndex = 0;

function changeImage() {
	myImage.setAttribute("src",imageArray[imageIndex]);
	imageIndex++;
	if (imageIndex >= imageArray.length) {
		imageIndex = 0;
	}
}
function nextImage(){
	imageIndex ++;
}
var intervalHandle = setInterval(changeImage,4000);

myImage.onclick =  function() {
	clearInterval(nextImage);
};

