$(function () {
    // 改变屏幕大小
    window.onresize = function () {
        $(".banner").height($(window).height());
    }


    // start banner
    var n = $(".banner li").length
    $(".banner li").each(function () {
        banner();
    })

    function banner() {
        //初始化banner样式
        var listN = $(".banner li").length;
        $(".banner .loader").stop().fadeOut(1000);
        for (var i = 0; i < listN; i++) {
            $(".banner li").eq(i).css('z-index', i + 1);
            // $(".banner .btns").append('<span class="span'+i+' fl"><i></i></span>');
        }
        ;
        // $(".banner .btns span").eq(0).addClass("cur");


        // 执行效果
        var sw = 0;
        $(".banner li").eq(0).css('left', '0');
        sw = 1;
        $(".banner li").eq(0).addClass('active');

        setTimeout(function () {
            var Media = document.getElementById("i-ban-video");
            if (Media) {
                var Vidnum = $(".banner li.video").index();
                if (Vidnum == 0 && $(window).width() >= 1024) {
                    // Media.play();
                }
                ;
            }
            $(".banner .gray-bg").hide();
            Fullvideo($(".banner"), $(".banner .video-sign"));
        }, 1000)


        $(".banner .btns .circle").on('click', function () {
            sw = $(this).index(".circle");
            myShow(sw);
        });

        function myShow(i) {
            for (var a = 0; a < listN; a++) {
                if (a == i && $(window).width() >= 1024) {
                    // $(".i-ban-video").get(a).play();
                } else {
                    // $(".i-ban-video").get(a).pause();
                }
            }

            for (var a = i; a < listN; a++) {
                $(".banner li").eq(a).css('opacity', '1');
                $(".banner li").eq(a).stop().animate({left: "100%"}, 600, "easeInOutQuad");
            }
            ;
            // $(".banner .btns span").eq(i).addClass("cur").siblings("span").removeClass("cur");

            $(".banner li").eq(i).stop().animate({left: '0'}, 600, "easeInOutQuad", function () {
                $(".banner li").stop().removeClass('active');
                $(".banner li").eq(i).stop().addClass('active');
            });
            // var lis = $(".banner li").eq(i).siblings();
            // lis.stop().fadeOut(1000);
            // if (i == 0) {
            // 	$(".banner .btns .line").eq(i).children('i').stop().animate({height: '100%'}, 16999, "linear");
            // }else{
            // 	$(".banner .btns .line").eq(i).children('i').stop().animate({height: '100%'}, 16999, "linear");
            // }
            // for (var a = 0; a < i; a++) {
            // 	$(".banner .btns .line").eq(a).children('i').stop().height("100%");
            // };
            $(".banner .btns .line").children('i').css({height: 0}).stop().animate({height: '100%'}, 16999, "linear");
            $(".banner .btns .nums").html(i < 9 ? '0' + (i + 1) : i + 1);
            $(".banner .btns .circle.active").removeClass('active');
            $(".banner .btns .circle").eq(i).addClass('active');
        }

        $(".banner .btns .line").children('i').stop().animate({height: '100%'}, 17000, "linear");
        //自动开始, 创建定时器
        var myTime = setInterval(function () {
            myShow(sw);
            sw++;
            if (sw == listN) {
                sw = 0;
            }
        }, 17000);


    }

    function Fullvideo(box, obj) {
        obj.eq(0).stop().fadeIn(1000)

        function resizeBg() {
            obj.removeClass("w-f").removeClass("h-f").css("margin", 0)
            var boxR = $(window).width() / ($(window).height()),
                objR = obj.width() / obj.height();
            // console.log("width:" + obj.width() + "height:" + obj.height() + "objR" + objR + "boxR" + boxR)
            if (objR < boxR) {
                obj.addClass('w-f')//.css("margin-top", -(obj.height() - ($(window).height())) / 2);
            } else {
                obj.addClass('h-f')//.css("margin-left", -(obj.width() - $(window).width()) / 2);
                console.log(obj.width(), $(window).width())
            }
        }

        $(window).resize(resizeBg).trigger("resize");
    }

    // end banner


    //start about
    var an = $(".about .imgList li").length;
    $(".about .imgList li").each(function () {
        var _this = $(this),
            src = _this.attr("data-img"),
            img = new Image();
        img.src = src;
        //处理ff下会自动读取缓存图片
        if (img.complete || img.width) {
            _this.attr("style", "background:url(" + src + ") no-repeat center");
            an--;
            if (an == 0) {
                about();
            }
            return;
        }
        $(img).load(function () {
            _this.attr("style", "background:url(" + src + ") no-repeat center");
            an--;
            if (an == 0) {
                about();
            }
        });
    })

    function about() {
        var listN = $(".about .imgList li").length - 1;
        var i = 0;
        var aboutClick = true;//是否可以点击
        $(".about .imgList .loader").stop().fadeOut(1000);
        //about 动画
        var aboutAni = function (i) {
            $(".about .imgList li").eq(i).siblings().stop().animate({opacity: 0}, 2000);
            $(".about .msg-list .msg-box").eq(i).siblings().stop().animate({opacity: 0}, 2000);
            $(".about .about-bottom .icon-box").eq(i).siblings().stop().animate({opacity: 0}, 2000);
            $(".about .imgList li").eq(i).stop().animate({opacity: 1}, 4000);
            $(".about .msg-list .msg-box").eq(i).stop().animate({opacity: 1}, 4000);
            $(".about .about-bottom .icon-box").eq(i).stop().animate({opacity: 1}, 4000);
        }
        //启动,从0开始
        aboutAni(0);
        $(".about .arrow-box").addClass("circleAni");
        var aboutSetInt;
        var aboutInt = function () {
            aboutSetInt = setInterval(function () {
                i = i == listN ? 0 : i + 1
                $(".about .arrow-box").removeClass("circleAni");
                setTimeout(function () {
                    $(".about .arrow-box").addClass("circleAni");
                    aboutAni(i)
                }, 10)
            }, 5100)
        }
        //启动循环
        aboutInt()

        $(".about svg").click(function () {
            aboutClick = false
            clearInterval(aboutSetInt)
            i = i == listN ? 0 : i + 1
            $(".arrow-box").removeClass("circleAni");
            setTimeout(function () {
                $(".about .arrow-box").addClass("circleAni");
                aboutAni(i)
                aboutClick = true
            }, 10)
            //启动
            aboutInt()
        })
        $(".about .arrow-pre-one").click(function () {
            aboutClick = false
            clearInterval(aboutSetInt)
            i = i == 0 ? listN : i - 1
            $(".about .arrow-box").removeClass("circleAni");
            setTimeout(function () {
                $(".about .arrow-box").addClass("circleAni");
                aboutAni(i)
                aboutClick = true
            }, 100)
            //启动
            aboutInt()
        })
    }

    //end about


    //start bus
    function bus(total, ln, arrowBox, svg, arrowPre, box, delayTm) {// total: 总共几个; ln: 循环个数; arrowBox: 箭头盒子; svg: 往后箭头; arrowPre: 往前箭头; box: 主要的块; delayTm: 延时
        var busSetInit;
        var setInt;
        var setNextRemove;
        var setPrevRemove;

        // if(ln === 5){ // 如果是投资者与投资组合
        // 	clearInterval(busSetInit)
        // 	clearInterval(setInt)
        // 	clearInterval(setNextRemove)
        // 	clearInterval(setPrevRemove)
        // }


        arrowBox.addClass("circleAni");
        var add = function (i, k) {
            box.find($(".silder-format")).eq(i).addClass("format-" + (k + 1))
            box.find($(".silder-format")).eq(i).css({opacity: 1})
            box.find($(".silder-format")).eq(i).find('.slide-img').addClass('slideAni')
            box.find($(".silder-format")).eq(i).find('.slide-img-effect').addClass('slideAni')
            box.find($(".silder-format")).eq(i).find('.img-container').addClass('trans3d')
            box.find($(".silder-format")).eq(i).find('.gayBg').addClass('bgAni')
        }
        var remove = function (i, k) {
            box.find($(".silder-format")).eq(i).removeClass("format-" + (k + 1))
            box.find($(".silder-format")).eq(i).find('.slide-img').removeClass('slideAni')
            box.find($(".silder-format")).eq(i).find('.slide-img-effect').removeClass('slideAni')
            box.find($(".silder-format")).eq(i).find('.img-container').removeClass('trans3d')
            box.find($(".silder-format")).eq(i).find('.gayBg').removeClass('bgAni')

            // box.find($(".format-"+i+" .slide-img,.format-"+i+" .slide-img-effect")).removeClass('slideAni')
            // box.find($(".format-"+i+" .img-container")).removeClass('trans3d')
            // box.find($(".format-"+i+" .slide-text,.format-"+i+" .slide-text-effect")).removeClass('textAni')
            // box.find($(".format-"+i+" .gayBg")).removeClass('bgAni')
        }

        // start 一开始打开的时候，先渲染3个
        var i = 0;
        busSetInit = setInterval(function () {
            i == ln ? clearInterval(busSetInit) : add(i, i)
            i++
        }, delayTm)
        // end

        // 循环开始
        var isBusClick = false;
        var int = function () {
            isBusClick = false;
            setInt = setInterval(function () {
                goNext()
            }, 3000 * ln)
        }
        // 循环结束

        //向前开始
        var goNext = function () {
            isBusClick = false;
            var k = 0;
            remove(0, k);
            var sl = box.find('.silder-format').eq(0)
            box.append(sl)
            add(ln - 1, k)
            var setNextRemove = setInterval(function () {
                k++;
                if (k == ln) {
                    clearInterval(setNextRemove)
                    isBusClick = true
                    console.log(isBusClick)
                } else {
                    remove(0, k);
                    sl = box.find('.silder-format').eq(0)
                    box.append(sl)
                    add(ln - 1, k)
                }
            }, delayTm)
            arrowBox.removeClass("circleAni");
            setTimeout(function () {
                arrowBox.addClass("circleAni");
                //add(1)
            }, 100)
        }
        //向前结束

        //向后开始
        var goPrev = function () {
            isBusClick = false;
            var k = 0;
            remove(0, k);
            var sl = box.find('.silder-format:last')
            box.prepend(sl)
            add(0, k)
            var setPrevRemove = setInterval(function () {
                k++;
                if (k == ln) {
                    clearInterval(setPrevRemove)
                    isBusClick = true
                } else {
                    remove(k + 1, k);
                    add(k, k)
                }
            }, delayTm)
            arrowBox.removeClass("circleAni");
            setTimeout(function () {
                arrowBox.addClass("circleAni");
                //add(1)
            }, 100)
        }
        //向后结束

        // 如果总数大于显示的数据，那么循环
        if (total > ln) {
            int();
        }


        box.on("mouseover mouseout", 'svg', function (event) {
            if (event.type == "mouseover") {
                //鼠标悬浮
                clearInterval(setInt)
            } else if (event.type == "mouseout") {
                //鼠标离开
                int()
            }
        })

        box.on("mouseover mouseout", '.arrow-pre-one', function (event) {
            if (event.type == "mouseover") {
                //鼠标悬浮
                clearInterval(setInt)
            } else if (event.type == "mouseout") {
                //鼠标离开
                int()
            }
        })

        box.on('click', 'svg', function (event) {
            event.preventDefault();
            console.log('点击了业务向前按钮')
            /* Act on the event */
            if (isBusClick) {
                goNext();
                console.log(111)
            }
        });
        box.on('click', '.arrow-pre-one', function (event) {
            event.preventDefault();
            /* Act on the event */
            clearInterval(setInt)
            console.log(isBusClick)
            if (isBusClick && total >= ln * 2) {
                goPrev();
                console.log(222)
            }
        });
        // svg.click(function(){
        // 	if(isBusClick){
        // 		goNext();
        // 		console.log(111)
        // 	}
        //     // isClick = false
        //     // box.find($(".format-"+i+"")).animate({opacity: 0}, 100)
        //     // remove(i)
        //     // clearInterval(setInt)
        //     // i = i ==ln ? 1 : i+1
        //     // arrowBox.removeClass("circleAni");
        //     // setTimeout(function(){
        //     //     arrowBox.addClass("circleAni");
        //     //     add(i)
        //     //     isClick = true
        //     // },100)
        //     // //启动
        //     // int()
        // })
        // arrowPre.click(function(){
        // 	clearInterval(setInt)
        // 	console.log(isBusClick)
        // 	if(isBusClick && total >= ln*2){
        // 		goPrev();
        // 		console.log(222)
        // 	}
        //     // isClick = false
        //     // box.find($(".format-"+i+"")).animate({opacity: 0}, 100)
        //     // remove(i)
        //     // clearInterval(setInt)
        //     // i = i ==1 ? ln : i-1
        //     // console.log(i)
        //     // arrowBox.removeClass("circleAni");
        //     // setTimeout(function(){
        //     //     arrowBox.addClass("circleAni");
        //     //     add(i)
        //     //     isClick = true
        //     // },100)
        //     // //启动
        //     // int()
        // })

    }

    var busSetInitInvest;
    var setIntInvest;
    var setNextRemoveInvest;
    var setPrevRemoveInvest;

    function invest(total, ln, arrowBox, svg, arrowPre, box, delayTm) {// total: 总共几个; ln: 循环个数; arrowBox: 箭头盒子; svg: 往后箭头; arrowPre: 往前箭头; box: 主要的块; delayTm: 延时

        // clearInterval(busSetInit)
        // clearInterval(setInt)
        // clearInterval(setNextRemove)
        // clearInterval(setPrevRemove)

        arrowBox.addClass("circleAni");
        var add = function (i, k) {
            box.find($(".silder-format")).eq(i).addClass("format-" + (k + 1))
            box.find($(".silder-format")).eq(i).css({opacity: 1})
            box.find($(".silder-format")).eq(i).find('.slide-img').addClass('slideAni')
            box.find($(".silder-format")).eq(i).find('.slide-img-effect').addClass('slideAni')
            box.find($(".silder-format")).eq(i).find('.img-container').addClass('trans3d')
            box.find($(".silder-format")).eq(i).find('.gayBg').addClass('bgAni')
        }
        var remove = function (i, k) {
            box.find($(".silder-format")).eq(i).removeClass("format-" + (k + 1))
            box.find($(".silder-format")).eq(i).find('.slide-img').removeClass('slideAni')
            box.find($(".silder-format")).eq(i).find('.slide-img-effect').removeClass('slideAni')
            box.find($(".silder-format")).eq(i).find('.img-container').removeClass('trans3d')
            box.find($(".silder-format")).eq(i).find('.gayBg').removeClass('bgAni')

            // box.find($(".format-"+i+" .slide-img,.format-"+i+" .slide-img-effect")).removeClass('slideAni')
            // box.find($(".format-"+i+" .img-container")).removeClass('trans3d')
            // box.find($(".format-"+i+" .slide-text,.format-"+i+" .slide-text-effect")).removeClass('textAni')
            // box.find($(".format-"+i+" .gayBg")).removeClass('bgAni')
        }

        // start 一开始打开的时候，先渲染5个
        var i = 0;
        busSetInitInvest = setInterval(function () {
            i == ln ? clearInterval(busSetInitInvest) : add(i, i)
            i++
        }, delayTm)
        // end

        // 循环开始
        var isBusClick = false;
        var int = function () {
            clearInterval(setIntInvest)
            isBusClick = false;
            setIntInvest = setInterval(function () {
                goNext()
            }, 3000 * ln)
        }
        // 循环结束

        //向前开始
        var goNext = function () {
            isBusClick = false;
            var k = 0;
            remove(0, k);
            var sl = box.find('.silder-format').eq(0)
            box.append(sl)
            add(ln - 1, k)
            setNextRemoveInvest = setInterval(function () {
                k++;
                if (k == ln) {
                    clearInterval(setNextRemoveInvest)
                    isBusClick = true
                    console.log(isBusClick)
                } else {
                    remove(0, k);
                    sl = box.find('.silder-format').eq(0)
                    box.append(sl)
                    add(ln - 1, k)
                }
            }, delayTm)
            arrowBox.removeClass("circleAni");
            setTimeout(function () {
                arrowBox.addClass("circleAni");
                //add(1)
            }, 100)
        }
        //向前结束

        //向后开始
        var goPrev = function () {
            isBusClick = false;
            var k = 0;
            remove(0, k);
            var sl = box.find('.silder-format:last')
            box.prepend(sl)
            add(0, k)
            setPrevRemoveInvest = setInterval(function () {
                k++;
                if (k == ln) {
                    clearInterval(setPrevRemoveInvest)
                    isBusClick = true
                } else {
                    remove(k + 1, k);
                    add(k, k)
                }
            }, delayTm)
            arrowBox.removeClass("circleAni");
            setTimeout(function () {
                arrowBox.addClass("circleAni");
                //add(1)
            }, 100)
        }
        //向后结束

        // 如果总数大于显示的数据，那么循环
        if (total > ln) {
            int();
        }


        box.on("mouseover mouseout", 'svg', function (event) {
            if (event.type == "mouseover") {
                //鼠标悬浮
                clearInterval(setIntInvest)
            } else if (event.type == "mouseout") {
                //鼠标离开
                int()
            }
        })

        box.on("mouseover mouseout", '.arrow-pre-one', function (event) {
            if (event.type == "mouseover") {
                //鼠标悬浮
                clearInterval(setIntInvest)
            } else if (event.type == "mouseout") {
                //鼠标离开
                int()
            }
        })

        box.on('click', 'svg', function (event) {
            event.preventDefault();
            /* Act on the event */
            console.log("点击了向前的按钮")
            console.log('isBusClick====', isBusClick)
            if (isBusClick) {
                goNext();
                console.log(111)
            }
        });
        box.on('click', '.arrow-pre-one', function (event) {
            event.preventDefault();
            /* Act on the event */
            clearInterval(setIntInvest)
            console.log(isBusClick)
            if (isBusClick && total >= ln * 2) {
                goPrev();
                console.log(222)
            }
        });


    }

    var isIdxBus = true;
    var isIdxInvest = true;
    var investFunc;
    $(window).scroll(function (event) {
        if ($(window).scrollTop() >= $(window).height() && isIdxBus) {
            isIdxBus = false;
            bus($(".bus .silder-format").length, 3, $(".bus .arrow-box"), 'svg', 'arrow-pre-one', $(".bus"), 800)
        }

        if ($(window).scrollTop() >= $(window).height() + 480 && isIdxInvest) {
            isIdxInvest = false;
            invest($(".invest .silder-format").length, 5, $(".invest .arrow-box"), 'svg', 'arrow-pre-one', $(".invest"), 800)
        }
    })
    //end bus

    $(".invest").on('click', '.invest-btn a', function (event) {
        event.preventDefault();
        /* Act on the event */
        $(".invest-btn a").removeClass("active")
        $(this).addClass("active")
        var investIdx = $(".invest-btn a").index($(this));

        $.ajax({
            url: GLOBAL_URL + 'index.php/ajaxdata',
            type: 'GET',
            data: {idx: investIdx},
            success: function (data) {
                $(".invest.project-silder").html(data)
                $(".invest-btn a").removeClass("active")
                $(".invest-btn a").eq(investIdx).addClass("active")
                clearInterval(busSetInitInvest)
                clearInterval(setIntInvest)
                clearInterval(setNextRemoveInvest)
                clearInterval(setPrevRemoveInvest)
                investFunc = invest($(".invest .silder-format").length, 5, $(".invest .arrow-box"), $(".invest svg"), $(".invest .arrow-pre-one"), $(".invest"), 800)
            }
        })
    });

    $(".h5-invest").on('click', '.sub-btns a', function (event) {
        event.preventDefault();
        $(".sub-btns a").removeClass("active")
        $(this).addClass("active")
        var investIdx = $(".sub-btns a").index($(this));
        $.ajax({
            url: GLOBAL_URL + 'index.php/ajaxH5',
            type: 'GET',
            data: {idx: investIdx},
            success: function (data) {
                $(".h5-invest").html(data)
                $(".sub-btns a").removeClass("active")
                $(".sub-btns a").eq(investIdx).addClass("active")
            }
        })
    })
    //end invest


    //start new
    function news(arrowBox, svg, arrowPre, box) {
        arrowBox.addClass("circleAni");
        var add = function () {
            box.stop(true, true).animate({left: '-25%'}, 3000, function () {
                var li = box.find("li").eq(0);
                box.find('ul').append(li);
                box.css('left', '0');
            })
        }
        var remove = function () {
            var li = box.find("li:last");
            box.find('ul').prepend(li);
            box.css('left', '-25%');
            box.stop().animate({left: '0'}, 3000, function () {
                // box.css('left', '0');
            })
        }
        // 先开始
        add();
        // 循环
        var isClick = true;
        var setInt;
        var int = function () {
            setInt = setInterval(function () {
                arrowBox.removeClass("circleAni");
                setTimeout(function () {
                    arrowBox.addClass("circleAni");
                    add()
                }, 100)
            }, 4100)
        }
        int()

        svg.click(function () {
            isClick = false
            clearInterval(setInt)
            arrowBox.removeClass("circleAni");
            setTimeout(function () {
                arrowBox.addClass("circleAni");
                add()
                isClick = true
            }, 100)
            //启动
            int()
        })
        arrowPre.click(function () {
            isClick = false
            clearInterval(setInt)
            arrowBox.removeClass("circleAni");
            setTimeout(function () {
                arrowBox.addClass("circleAni");
                remove();
                isClick = true
            }, 100)
            //启动
            int()
        })
    }

    news($(".new .arrow-box"), $(".new svg"), $(".new .arrow-pre-one"), $(".new .index-new-list"))
    //end new


    //h5
    var mySwiper = new Swiper('.swiper-container', {
        loop: true,
        autoplay: 3000,
    });


    // $(".arrow-box").addClass("circleAni");

    // var add = function(i) {
    //     $(".format-"+i+"").css({opacity: 1})
    //     $(".format-"+i+" .slide-img,.format-"+i+" .slide-img-effect").addClass('slideAni')
    //     $(".format-"+i+" .img-container").addClass('trans3d')
    //     $(".format-"+i+" .slide-text,.format-"+i+" .slide-text-effect").addClass('textAni')
    //     $(".format-"+i+" .gayBg").addClass('bgAni')
    // }
    // var remove = function(i) {
    //     $(".format-"+i+" .slide-img,.format-"+i+" .slide-img-effect").removeClass('slideAni')
    //     $(".format-"+i+" .img-container").removeClass('trans3d')
    //     $(".format-"+i+" .slide-text,.format-"+i+" .slide-text-effect").removeClass('textAni')
    //     $(".format-"+i+" .gayBg").removeClass('bgAni')
    // }

    // // 1号先开始
    // add(1)

    // // 循环
    // var i = 1;
    // var isClick = true;
    // var setInt;
    // var int=function(){
    //     setInt = setInterval(function(){
    //         remove(i)
    //         $(".arrow-box").removeClass("circleAni");
    //         setTimeout(function(){
    //             $(".arrow-box").addClass("circleAni");
    //             add(i)
    //         },100)
    //         i = i ==3 ? 1 : i+1
    //         console.log(i)
    //     },4100)
    // }
    // int()

    // $("svg").click(function(){
    //     isClick = false
    //     $(".format-"+i+"").animate({opacity: 0}, 100)
    //     remove(i)
    //     clearInterval(setInt)
    //     i = i ==3 ? 1 : i+1
    //     $(".arrow-box").removeClass("circleAni");
    //     setTimeout(function(){
    //         $(".arrow-box").addClass("circleAni");
    //         add(i)
    //         isClick = true
    //     },100)
    //     //启动
    //     int()
    // })
    // $(".arrow-pre-one").click(function(){
    //     isClick = false
    //     $(".format-"+i+"").animate({opacity: 0}, 100)
    //     remove(i)
    //     clearInterval(setInt)
    //     i = i ==1 ? 3 : i-1
    //     console.log(i)
    //     $(".arrow-box").removeClass("circleAni");
    //     setTimeout(function(){
    //         $(".arrow-box").addClass("circleAni");
    //         add(i)
    //         isClick = true
    //     },100)
    //     //启动
    //     int()
    // })
})