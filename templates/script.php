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
                    if ($(this).css("opacity")==0) {$(this).fadeTo(500,1);}
                } else { //object goes out of view (scrolling up)

                }
            });
        }).scroll(); //invoke scroll-handler on page-load
    });
</script>

