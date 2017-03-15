<script type="text/javascript" src="includes/fancybox/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="includes/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="includes/fancybox/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="includes/fancybox/jquery.fancybox.css" />
<script type='text/javascript'>
$(document).ready(function() {
$(".fancybox")
	.attr('rel', 'gallery')
	.fancybox({
		beforeLoad: function() {
			var el, id = $(this.element).data('title-id');
			if (id) {
				el = $('#' + id);
				if (el.length) {
					this.title = el.html();
				}
			}
		},
		 beforeShow: function () {
            if (this.title) {
                // New line
                this.title += '<br />';
                // Add FaceBook like button
                this.title += '<iframe src="//www.facebook.com/plugins/like.php?href=' + this.href + '&amp;layout=button_count&amp;show_faces=true&amp;width=500&amp;action=like&amp;font&amp;colorscheme=light&amp;height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:110px; height:23px;" allowTransparency="true"></iframe>';
            }
        },
		helpers : {
		title: {
			type: 'inside'
		}
	}
	});
});
</script>