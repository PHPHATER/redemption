<?php 

if( $is_bookmarked ){
	$favorite = ' favorited';
}else{
	$favorite = '';
}

?>

<div class="favorite_wrapper">
	<button type="button" class="btn favorite_button<?php echo $favorite; ?>"><?php echo( $is_bookmarked ? 'Added' : 'Add to Favorite' ); ?></button>
</div>