<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link href="css/sheetslider.min.css" type="text/css" rel="stylesheet"/>
</head>

<body>
<div class="main box">
<!--Sheet Slider-->
<div class="sheetSlider sh-default sh-auto">
   <input id="s1" type="radio" name="slide1" checked=""/> 
   <input id="s2" type="radio" name="slide1"/> 
   <input id="s3" type="radio" name="slide1"/>
   <div class="sh__content">

      <!-- Slider Item -->
      <div class="sh__item">
         <img src="img/slide-img01.jpg" alt="imgText"/>
         <!-- Item Info -->
         <div class="sh__meta">
            <h4>2 Weeks</h4>
            <span>Secondary text <a href="#urlPage">with link</a></span>
         </div>
      </div>

      <!-- Slider Item -->
      <div class="sh__item">
         <img src="img/slide-img02.jpg" alt="imgText"/>
         <!-- Item Info -->
         <div class="sh__meta">
            <h4>Artwork surreal</h4>
            <span>Secondary text without link</span>
         </div>
      </div>

      <!-- Slider Item -->
      <div class="sh__item">
         <img src="img/slide-img03.jpg" alt="imgText"/>
         <!-- Item Info -->
         <div class="sh__meta">
            <h4>Cat under a carpet</h4>
            <span>Secondary text without link</span>
         </div>
      </div>

   </div><!-- .sh__content -->

   <!--botones-->
   <div class="sh__btns">
      <label for="s1"></label>
      <label for="s2"></label>
      <label for="s3"></label>
   </div><!-- .sh__btns -->

   <!--flechas-->
   <div class="sh__arrows">
      <label for="s1"></label>
      <label for="s2"></label>
      <label for="s3"></label>
   </div><!-- .sh__arrows -->
   
   <button class="sh-control"></button> 
</div>   
</div>
</body>
</html>
