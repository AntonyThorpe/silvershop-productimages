# Installation and Configuration of SilverShop Product Images

## Installation
* In a terminal:
`composer require antonythorpe/silvershop-productimages`
* dev/build

## Configuration
* Load jQuery
* Load elevateZoom-Plus `jquery.ez-plus.js` exposed through the `public/resources` folder.
* Load [elevateZoom-Plus configuration](http://igorlino.github.io/elevatezoom-plus/api.htm).  An example is exposed through the `public/resources` folder.
* Load elevateZoom-Plus specific CSS.  An example is exposed through the `public/resources` folder.
* Set zoom image size in `app/_config/shop.yml`:
```yaml
SilverShop\Extension\ProductImageExtension:
  large_image_width: 750
```

## Templates
* In your `{theme}/templates/SilverShop/Page/Layout/Product.ss` file remove the image related code and replace with `<% include ProductImages %>`.
```HTML
<div class="productDetails">
    <% include ProductImages %>
    <% if $InternalItemID %>
```
* Copy `vendor/antonythorpe/silvershop-productimages/templates/includes/ProductImages.ss` to your `{theme}/templates/includes/ProductImages.ss` to adjust as needed.
