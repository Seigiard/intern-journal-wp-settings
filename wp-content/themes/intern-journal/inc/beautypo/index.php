<?php
require('vendor/autoload.php');

use DOMWrap\Document;

function prepareVideo($videoWrapper) {
  $videoIframe = $videoWrapper->children('iframe')->first()->detach();
  $videoWrapper->children('<br>')->first()->remove();
  $videoWrapper->wrap('<figure><figcaption></figcaption></figure>');
  $videoWrapper->parent()->before($videoIframe);
  $videoIframe->wrap('<div class="video-wrapper"></div>');
}

function prepareSingleVideo($videoElement) {
  if($videoElement->parent()->find('*')->count() == 1) {
    $imageClass = $videoElement->hasClass('full') ? ' class="full"' : '';
    $videoElement->removeClass('full')->unwrap('p')->wrap('<figure'.$imageClass.'><div class="video-wrapper"></div></figure>');
  }
}

function prepareImage($imageWrapper) {
  $imageElement = $imageWrapper->children('img')->first()->detach();
  $imageClass = $imageElement->hasClass('full') ? ' class="full"' : '';
  $imageElement->removeClass('full');
  $imageWrapper->children('<br>')->first()->remove();
  $imageWrapper->wrap('<figure'.$imageClass.'><figcaption></figcaption></figure>');
  $imageWrapper->parent()->before($imageElement);
}

function prepareSingleImage($imageElement) {
  if($imageElement->parent()->find('*')->count() == 1) {
    $imageClass = $imageElement->hasClass('full') ? ' class="full"' : '';
    $imageElement->removeClass('full')->unwrap('p')->wrap('<figure'.$imageClass.'></figure>');
  }
}

function getBeautypoHtml($html) {
  $doc = new Document();
  $doc->html($html);

  $doc->find('p > iframe + br')->parent()->each(prepareVideo);
  $doc->find('p > img + br')->parent()->each(prepareImage);
  $doc->find('p > img')->each(prepareSingleImage);
  $doc->find('p > iframe')->each(prepareSingleVideo);
  return $doc->find('body')->html();
}

function caption_off() {
	return true;
}

add_filter( 'disable_captions', 'caption_off' );

function beautypoContent( $html ) {
	return getBeautypoHtml($html);
}
add_filter( 'the_content', 'beautypoContent', 10, 1);