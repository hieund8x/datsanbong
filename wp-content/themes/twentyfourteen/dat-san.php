<?php
/*
 * Template Name: Đặt Giờ Sân Bóng
 */
?>
<!doctype html>
<html lang="us">
<head>
	<meta charset="utf-8">
	<title>Đặt Giờ Sân Bóng</title>

    <link rel='stylesheet'  href='<?php echo get_template_directory_uri() . '/modulesanbong/css/jquery-ui.css' ?>' type='text/css' media='all' />
    <link rel='stylesheet'  href='<?php echo get_template_directory_uri() . '/modulesanbong/css/custom.css' ?>' type='text/css' media='all' />

    <script src="<?php echo get_template_directory_uri() . '/modulesanbong/js/jquery-1.10.2.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri() . '/modulesanbong/js/jquery-ui.min.js' ?>"></script>

    <script>
        jQuery(function ($)
        {
            $.datepicker.regional["vi-VN"] =
            {
                closeText: "Đóng",
                prevText: "Trước",
                nextText: "Sau",
                currentText: "Hôm nay",
                monthNames: ["Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"],
                monthNamesShort: ["Một", "Hai", "Ba", "Bốn", "Năm", "Sáu", "Bảy", "Tám", "Chín", "Mười", "Mười một", "Mười hai"],
                dayNames: ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"],
                dayNamesShort: ["CN", "Hai", "Ba", "Tư", "Năm", "Sáu", "Bảy"],
                dayNamesMin: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
                weekHeader: "Tuần",
                dateFormat: "dd/mm/yy",
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ""
            };

            $.datepicker.setDefaults($.datepicker.regional["vi-VN"]);
        });
    </script>
</head>
<body>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
<div id="datsan-wrapper">
    <form id="dat-san" action="" method="post">
        <div id="step-stadium">
            <div class="step-content">
                <h1 class="">Mời Bạn Chọn Sân:</h1>
                <div class="list">
                    <a class="btn-box-san" href="javascript:void(0)" value="1" loaisan="Sân cỏ" onclick="chonSan($(this))">
                        <img style="width: 100%; height: 170px" src="<?php echo get_template_directory_uri() . '/modulesanbong/css/images/san-bong.jpg' ?>" alt="" />
                        <span class="san-title">Sân 1 - Sân cỏ</span>
                    </a>
                    <a class="btn-box-san" href="javascript:void(0)" value="2" loaisan="Sân đất" onclick="chonSan($(this))">
                        <img style="width: 100%; height: 170px" src="<?php echo get_template_directory_uri() . '/modulesanbong/css/images/san-bong.jpg' ?>" alt="" />
                        <span class="san-title">Sân 2 - Sân đất</span>
                    </a>
                    <a class="btn-box-san" href="javascript:void(0)" value="3" loaisan="Sân đất" onclick="chonSan($(this))">
                        <img style="width: 100%; height: 170px" src="<?php echo get_template_directory_uri() . '/modulesanbong/css/images/san-bong.jpg' ?>" alt="" />
                        <span class="san-title">Sân 3 - Sân đất</span>
                    </a>
                    <a class="btn-box-san" href="javascript:void(0)" value="4" loaisan="Sân đất" onclick="chonSan($(this))">
                        <img style="width: 100%; height: 170px" src="<?php echo get_template_directory_uri() . '/modulesanbong/css/images/san-bong.jpg' ?>" alt="" />
                        <span class="san-title">Sân 4 - Sân đất</span>
                    </a>
                </div>
                <div class="clear"></div>
                <div class="show-selected" style="display: none;">
                    <span>Sân đã chọn: </span><span id="show-san">Chưa chọn</span>
                </div>
                <input type="hidden" id="so-san" name="so_san" value="0" messerr="Vui lòng chọn Sân để tiếp tục." />
            </div>
<!--            <div class="action">-->
<!--                <button class="btn next-step" type="button" onclick="nextStep($('#so-san'),$('#step-stadium'),$('#step-date'))">Tiếp Tục</button>-->
<!--            </div>-->
            <div class="clear"></div>
        </div>
        <div id="step-date" style="display: none;">
            <div class="step-content">
                <h1 class="">Mời Bạn Chọn Ngày:</h1>
                <div id="dateselect"></div>
                <div class="clear"></div>
                <div class="show-selected">
                    <span>Ngày đã chọn: </span><span id="show-date">Chưa chọn</span>
                </div>
                <input type="hidden" id="ngay-thang" name="ngay_thang" value="" messerr="Vui lòng chọn Ngày để tiếp tục" />
            </div>
            <div class="action">
                <button class="btn prev-step" type="button" onclick="backStep($('#step-stadium'),$('#step-date'))">Quay lại</button>
                <button class="btn next-step" type="button" onclick="nextStep($('#ngay-thang'),$('#step-date'),$('#step-time'))">Tiếp Tục</button>
            </div>
            <div class="clear"></div>
        </div>
        <div id="step-time" style="display: none;">
            <h1 class="">Mời Bạn Chọn Khung Giờ:</h1>
            <div class="step-content">
                <a class="btn-box" href="javascript:void(0)" value="1" onclick="chonGio($(this))">12h30 - 14h00</a>
                <a class="btn-box" href="javascript:void(0)" value="2"  onclick="chonGio($(this))">14h00 - 15h30</a>
                <a class="btn-box" href="javascript:void(0)" value="3"  onclick="chonGio($(this))">15h30 - 17h00</a>
                <a class="btn-box" href="javascript:void(0)" value="4"  onclick="chonGio($(this))">17h00 - 18h30</a>
                <a class="btn-box" href="javascript:void(0)" value="5"  onclick="chonGio($(this))">18h30 - 20h00</a>
                <a class="btn-box" href="javascript:void(0)" value="6"  onclick="chonGio($(this))">20h00 - 21h30</a>
                <a class="btn-box" href="javascript:void(0)" value="7"  onclick="chonGio($(this))">21h30 - 23h00</a>
            </div>
            <input type="hidden" id="gio" name="gio" value="" messerr="Vui lòng chọn Khung giờ để tiếp tục" />
            <div class="action">
                <button class="btn prev-step" type="button" onclick="backStep($('#step-date'),$('#step-time'))">Quay lại</button>
            </div>
            <div class="clear"></div>
        </div>
        <div id="step-info" style="display: none;">
            <h1>Vui điền thông tin liên hệ của bạn:</h1>
            <div class="action">
                <button class="btn prev-step" type="button" onclick="backStep($('#step-time'),$('#step-info'))">Quay lại</button>
            </div>
        </div>
    </form>
</div>
<div id="over-loading" style="display: none;">
    <img src="<?php echo get_template_directory_uri() . '/modulesanbong/css/images/loading.gif' ?>" alt="" />
</div>
    <script>
        $(document).ready(function() {
            $( "#dateselect" ).datepicker({
                'dateFormat':'dd/mm/yy',
                'minDate' : 0,
                onSelect: function(selected,evnt) {
                    var date = $(this).datepicker('getDate');
                    var dayOfWeek = date.getUTCDay();
                    var day = getDayVN(dayOfWeek);
                    chonNgay(selected,day);
                }
            });
        }); // End: $(document).ready()
        function chonSan(el){
            $('#so-san').val(el.attr('value'));
            $('#show-san').html('Sân '+el.attr('value')+' - Loại sân: '+el.attr('loaisan'));
            nextStep($('#so-san'),$('#step-stadium'),$('#step-date'));
        }
        function chonNgay(value,day){
            $('#ngay-thang').val(value);
            $('#show-date').html(day +' - '+value);
        }
        function chonGio(el){
            $('#gio').val(el.attr('value'));
            nextStep($('#gio'),$('#step-time'),$('#step-info'));
        }
        function nextStep(elVal,elHide,elShow){
            if(elVal.val()=='' || elVal.val()==0){
                alert(elVal.attr('messerr'));
                return;
            }
            $('#over-loading').show();
            setTimeout(function(){
                elHide.hide();
                elShow.show('slow');
                $('#over-loading').hide();
            },2000);
        }
        function backStep(elShow,elHide){
            $('#over-loading').show();
            setTimeout(function(){
                elHide.hide();
                elShow.show('slow');
                $('#over-loading').hide();
            },2000);
        }

        function getDayVN(val){
            var dayVn = '';
            switch(val){
                case 0:
                    dayVn = 'Thứ hai';
                    break;
                case 1:
                    dayVn = 'Thứ ba';
                    break;
                case 2:
                    dayVn = 'Thứ tư';
                    break;
                case 3:
                    dayVn = 'Thứ năm';
                    break;
                case 4:
                    dayVn = 'Thứ sáu';
                    break;
                case 5:
                    dayVn = 'Thứ bảy';
                    break;
                case 6:
                    dayVn = 'Chủ nhật';
                    break;
                default :
                    dayVn = '';
                    break;
            }
            return dayVn;
        }
    </script>
<?php
endwhile;
endif;
?>
</body>
</html>