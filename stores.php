<?php
require('imports.php');



if (!empty($inputText)) {
  $Data = Data($inputText);
  echo '<div class="col-lg-3 col-md-3 col-sm-6">';
  echo '<div class="single-about-content">';
  echo '<div class="icon">';
  echo '<i class="" aria-hidden="true"><img class="lol" src="' . $Data['image']->getAttribute('src') . '" alt=""></i>';
  echo  '</div>';
  echo '<h5><a class="tran3s" href="' . $Data['ALINK'] . $Data['link'] . '">' . $Data['linkNode']->textContent . '</a></h5> ';
  echo '<p class="product-price"><strong>' . $Data['price']->textContent . $Data['priceSymbol']->textContent . '</strong></p>';
  echo '<p class="product-price">' . $Data['ratings']->textContent . '</p>';



  echo '<a class="more tran3s hvr-bounce-to-right" href="' . $Data['ALINK'] . $Data['link'] . '"> Seller Store</a>';
  echo  '</div>';
  echo  '</div>';









  $Data3 = Data3($inputText);
  echo '<div class="col-lg-3 col-md-3 col-sm-6">';
  echo '<div class="single-about-content">';
  echo '<div class="icon">';
  echo '<i class="" aria-hidden="true"><img class="lol" src="' . $Data3['element']->nodeValue . '" alt=""></i>';
  echo  '</div>';

  echo '<h5><a class="tran3s" href="' . $Data3['link'] . '">' . $Data3['linkNode']->textContent . ' </a></h5>';

  echo '<p class="product-price"><strong>' . $Data3['price']->textContent .  '</strong></p>';
  echo '<p class="product-price">' . $Data3['ratings'] . '</p>';



  echo '<a class="more tran3s hvr-bounce-to-right" href="' .  $Data3['link'] . '"> Seller Store</a>';
  echo  '</div>';
  echo  '</div>';






























}



