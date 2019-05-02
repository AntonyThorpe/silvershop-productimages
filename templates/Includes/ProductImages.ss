<div id="ProductImageWrapper">
	<% if $Image %>
		<img id="MainProductImage" class="productImage" src="$Image.Pad(275,275).URL" data-zoom-image="$Image.LargeImage.URL" />
	<% else %>
		<img id="MainProductImage" class="productImage" src="http://placehold.it/300x200" />
	<% end_if %>
</div>

<% if $SortedAdditionalImages.Count %>
	<div id="ProductImageGallery">
		<% if $Image %>
			<a href="javascript:;" data-image="$Image.Pad(275,275).URL" data-zoom-image="$Image.LargeImage.URL" class="active"><img src="$Image.CMSThumbnail.URL" /></a>
		<% end_if %>
		<% loop $SortedAdditionalImages %>
			<a href="javascript:;" data-image="$Pad(275,275).URL" data-zoom-image="$LargeImage.URL"><img src="$CMSThumbnail.URL" /></a>
		<% end_loop %>
	</div>
<% end_if %>
