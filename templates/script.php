<script>
    // Before / After Image Slider
    $(document).ready(function(){
        $('.ba-slider').each(function(){
            var cur = $(this);
            // Adjust the slider
            var width = cur.width()+'px';
            cur.find('.resize img').css('width', width);
            // Bind dragging events
            drags(cur.find('.handle'), cur.find('.resize'), cur);
        });
    });

    // Update sliders on resize.
    // Because we all do this: i.imgur.com/YkbaV.gif
    $(window).resize(function(){
        $('.ba-slider').each(function(){
            var cur = $(this);
            var width = cur.width()+'px';
            cur.find('.resize img').css('width', width);
        });
    });

    function drags(dragElement, resizeElement, container) {

        // Initialize the dragging event on mousedown.
        dragElement.on('mousedown touchstart', function(e) {

            dragElement.addClass('draggable');
            resizeElement.addClass('resizable');

            // Check if it's a mouse or touch event and pass along the correct value
            var startX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;

            // Get the initial position
            var dragWidth = dragElement.outerWidth(),
                posX = dragElement.offset().left + dragWidth - startX,
                containerOffset = container.offset().left,
                containerWidth = container.outerWidth();

            // Set limits
            minLeft = containerOffset + 10;
            maxLeft = containerOffset + containerWidth - dragWidth - 10;

            // Calculate the dragging distance on mousemove.
            dragElement.parents().on("mousemove touchmove", function(e) {

                // Check if it's a mouse or touch event and pass along the correct value
                var moveX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;

                leftValue = moveX + posX - dragWidth;

                // Prevent going off limits
                if ( leftValue < minLeft) {
                    leftValue = minLeft;
                } else if (leftValue > maxLeft) {
                    leftValue = maxLeft;
                }

                // Translate the handle's left value to masked divs width.
                widthValue = (leftValue + dragWidth/2 - containerOffset)*100/containerWidth+'%';

                // Set the new values for the slider and the handle.
                // Bind mouseup events to stop dragging.
                $('.draggable').css('left', widthValue).on('mouseup touchend touchcancel', function () {
                    $(this).removeClass('draggable');
                    resizeElement.removeClass('resizable');
                });
                $('.resizable').css('width', widthValue);
            }).on('mouseup touchend touchcancel', function(){
                dragElement.removeClass('draggable');
                resizeElement.removeClass('resizable');
            });
            e.preventDefault();
        }).on('mouseup touchend touchcancel', function(e){
            dragElement.removeClass('draggable');
            resizeElement.removeClass('resizable');
        });
    }

</script>





<script>
    document.getElementById('world-wrapper').addEventListener("mouseover",open);
    document.getElementById('world-wrapper').addEventListener("mouseleave",close);

    function open(){
        document.getElementById('world-nav').style.display = "unset";
    }

    function close(){
        document.getElementById('world-nav').style.display = "none";
    }
</script>

<script>
    $(window).on("load",function() {
        $(window).scroll(function() {
            var windowBottom = $(this).scrollTop() + $(this).innerHeight();
            $(".ce_text_inner").each(function() {
                /* Check the location of each desired element */
                var objectBottom = $(this).offset().top + $(this).outerHeight();

                /* If the element is completely within bounds of the window, fade it in */
                if (objectBottom < windowBottom) { //object comes into view (scrolling down)
                    if ($(this).css("opacity")==0) {$(this).fadeTo(1200,1);}
                } else { //object goes out of view (scrolling up)

                }
            });
        }).scroll(); //invoke scroll-handler on page-load
    });
</script>

