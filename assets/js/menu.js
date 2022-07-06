     // ---------vertical-menu with-inner-menu-active-animation-----------
    var tabsVerticalInner = $('#accordian');
    var selectorVerticalInner = $('#accordian').find('li').length;
    var activeItemVerticalInner = tabsVerticalInner.find('.active');
    var activeWidthVerticalHeight = activeItemVerticalInner.innerHeight();
    var activeWidthVerticalWidth = activeItemVerticalInner.innerWidth();
    var itemPosVerticalTop = activeItemVerticalInner.position();
    var itemPosVerticalLeft = activeItemVerticalInner.position();
    $(".selector-active").css({
        "top":itemPosVerticalTop.top + "px", 
        "left":itemPosVerticalLeft.left + "px",
        "height": activeWidthVerticalHeight + "px",
        "width": activeWidthVerticalWidth + "px"
    });
    $("#accordian").on("click","li",function(e){
    $('#accordian ul li').removeClass("active");
    $(this).addClass('active');
    var activeWidthVerticalHeight = $(this).innerHeight();
    var activeWidthVerticalWidth = $(this).innerWidth();
    var itemPosVerticalTop = $(this).position();
    var itemPosVerticalLeft = $(this).position();
        $(".selector-active").css({
            "top":itemPosVerticalTop.top + "px", 
            "left":itemPosVerticalLeft.left + "px",
            "height": activeWidthVerticalHeight + "px",
            "width": activeWidthVerticalWidth + "px"
        });
    });
