<!DOCTYPE>
<html>
<head>
 <title>Bulgaria in Pictures </title>
 <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
 <link rel="stylesheet" href="index.css" />
 <script>
var galleryId = 'gallery'; 
var	gallery; 
var galleryImages;
var currentImage;
var previousImage;
var preInitTimer;
preInit();

function preInit() {
	if ((document.getElementById)&&(gallery=document.getElementById(galleryId))) {
		gallery.style.visibility = "hidden";
		if (typeof preInitTimer != 'undefined') clearTimeout(preInitTimer); 
	} else {
		preInitTimer = setTimeout("preInit()",10);
	}
}

function fader(imageNumber,opacity) {
	var obj=galleryImages[imageNumber];
	if (obj.style) {
		if (obj.style.MozOpacity!=null) {  
			obj.style.MozOpacity = (opacity/100) - .001;
		} else if (obj.style.opacity!=null) {
			obj.style.opacity = (opacity/100) - .001;
		} else if (obj.style.filter!=null) {
			obj.style.filter = "alpha(opacity="+opacity+")";
		}
	}
}

function fadeInit() {
	if (document.getElementById) {
		preInit(); 
		galleryImages = new Array;
		var node = gallery.firstChild;
		while (node) {
			if (node.nodeType==1) {
				galleryImages.push(node);
			}
			node = node.nextSibling;
		}
		for(i=0;i<galleryImages.length;i++) {
			galleryImages[i].style.position='absolute';
			galleryImages[i].style.top=400;
			galleryImages[i].style.zIndex=0;
			fader(i,1);
		}
		gallery.style.visibility = 'visible';
		currentImage=0;
		previousImage=galleryImages.length-1;
		opacity=100;
		fader(currentImage,100);
		window.setTimeout("crossfade(100)", 1000);
	}
}

function crossfade(opacity) {
		if (opacity < 100) {
			fader(currentImage,opacity);
			opacity += 10;
			window.setTimeout("crossfade("+opacity+")", 50);
		} else {
			fader(previousImage,0);
			previousImage=currentImage;
			currentImage+=1;
			if (currentImage>=galleryImages.length) {
				currentImage=0;
			}
			galleryImages[previousImage].style.zIndex = 0;
			galleryImages[currentImage].style.zIndex = 100;
			opacity=0;
			window.setTimeout("crossfade("+opacity+")", 3000);
		}	
}
addEvent(window,'load',fadeInit)

function addEvent(elm, evType, fn, useCapture) 
{
 if (elm.addEventListener){
   elm.addEventListener(evType, fn, useCapture);
   return true;
 } else if (elm.attachEvent){
   var r = elm.attachEvent("on"+evType, fn);
   return r;
 }
} 
</script>
</head>
<body>
<div class="big">
     <?php 
       include "connect.php";
       isLogged();
     ?>
   <div class="container">
   <div class="header">
   </div>
  
   <ul class = "navbar">
	    <li><a class = "A" href="beginning.php"></a></li>
	    <li><a class = "B" href="look.php"></a></li>
		<li> <a class = "C" href="slideshow.php"></a></li>
		<li> <a class = "D" href="addpics.php"></a></li>
		<li> <a class = "E" href="Profile.php"></a></li>
	</ul>
 
   <div class="text">
       <div class="profile">Добре дошли в сайта ! Разгледайте България в снимки и усете красотата и :)</div>
	   <ul id="gallery"> 
		<li><img src="pics/photo1.jpg" style="" alt="" width="450" height="300" /></li> 
		<li><img src="pics/photo2.jpg" style="" alt="" width="450" height="300" /></li> 
		<li><img src="pics/photo3.jpg" style="" alt="" width="450" height="300" /></li> 
		<li><img src="pics/photo4.jpg" style="" alt="" width="450" height="300" /></li> 
		<li><img src="pics/photo5.jpg" style="" alt="" width="450" height="300" /></li> 
		</ul>
   </div>
		
</div>
 <div class="footer">
   <div class="menu">
   </div>
  
   </div>
   </div>
</div>
</body>
</html>
