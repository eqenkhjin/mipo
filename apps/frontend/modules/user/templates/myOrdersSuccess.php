<?php use_helper('Global'); ?>
        

        <?php use_stylesheet('template/validation.less', '', array('rel' => 'stylesheet/less')) ?>
       <!-- jScrollPane jquery plugin  -->
        <?php use_javascript('/tools/jScrollPane/script/jquery.mousewheel.js') ?>
        <?php use_javascript('/tools/jScrollPane/script/jquery.jscrollpane.min.js') ?>
        
        <?php use_stylesheet('/tools/jScrollPane/style/jquery.jscrollpane.css') ?>

        <!-- tablescroll jquery plugin  -->
        <?php use_javascript('/tools/tablescroll/jquery.tablescroll.js'); ?>
        
        <script type="text/javascript">
            jQuery(document).ready(function($)
            {
                    $('#order-list-table').tableScroll({
                        'width': 650,
                        'height': '100%'
                    });
            });
            function removeOrderField( _this)
            {
                $this = $(_this);
                
                var conf = confirm('Устгах уу?');
                
                if(!conf)
                    return false;
                
                $.ajax({
                    type: 'post',
                    url:  $this.attr('rel'),
                    success: function(){
                        $this.parent().parent().fadeOut().remove();

                        var tr_len = $('#order-list-table').find('tbody').find('tr').length;

                        for(var i = 0; i< tr_len; i++)
                            $('#order-list-table').find('tbody').find('tr').eq(i).find('td').eq(0).html(i+1);

                        $('#total_product_count').text(tr_len); // _orderListTable.php dotor bga
                        if(tr_len == 0)
                            $('#order-list-table').find('tbody').prepend('<tr><td colspan="5"><div class="info">Таны сагс хоосон байна !</div></td></tr>');
                    },error: function(){
                        alert('Устгаж чадсангүй');
                    }
                });

                return false;
            }

        </script>
<div class="validation">
    <div class="order-process-status">

        <?php include_component('stepbystep', 'userProfile'); ?>
    </div><!-- order-process-status end. -->

    
    <script type="text/javascript">
        function click(url){
            window.location = url;
        }
    </script>

    <div class="order-process-body">
        <div class="basket">
            <h4>Таны захиалгууд:</h4>
            <?php if($sf_user->hasFlash('error')): ?>
                <div class="clear"></div>
                <div class="info">
                    <?php echo $sf_user->getFlash('error'); ?>
                </div>
            <?php endif; ?>
            <?php if($sf_user->hasFlash('success')): ?>
                <div class="clear"></div>
                <div class="success">
                    <?php echo $sf_user->getFlash('success'); ?>
                </div>
            <?php endif; ?>
            <div class="clear"></div>
            <div id="order-list-table">
                <table>
                    <thead>
                        <tr>
                            <th width="10"><div class="label"><label>#</label></div></th>
                            <th>
                            <div class="label"><label>Захиалгын дугаар&nbsp;</label></div>
                            </th>
                            <th>
                            <div class="label"><label>Захиалгын төлөв байдал&nbsp;</label></div>
                            </th>
                            <th width="63"><div class="label"><label>Бараа&nbsp;</label></div></th>
                            <th width="63"><div class="label"><label>Үүссэн&nbsp;</label></div></th>
                            <th width="63"><div class="label"><label>Нийт үнэ&nbsp;</label></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pager->getResults() as $key=> $order): ?>
                            <tr onClick="click('<?php echo url_for('order/controller?id='.$order->getId()); ?>')" style="cursor: pointer" <?php echo $order->isUserAlarm()?'class="is_alarm"':''; ?>>
                                <td><a href="<?php echo url_for('order/controller?id='.$order->getId()); ?>"><?php echo (($pager->getPage()-1)*10 + $key + 1); ?></a></td>
                                <td>
                                    <a href="<?php echo url_for('order/controller?id='.$order->getId()); ?>"><?php echo $order->getCode(); ?></a>
                                    <div class="order-mode">
                                        <span class="step-0" title="Шинэ">Шинэ</span>
                                        <?php foreach($order->getOrderStatus() as $status): ?>
                                        <span class="step-<?php echo $status['id'] ?>" title="<?php echo $status['name'] ?>"><?php echo $status['name'] ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                </td>
                                <td><?php echo $order->getJimOrderStatus(); ?></td>
                                <td><?php echo $order->getJimOrderProduct()->count(); ?></td>
                                <td><?php echo $order->getCreatedAt(); ?></td>
                                <td><?php echo $order->getTotalAmount(); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php pager_navigation_v2($pager, 'user/myOrders'); ?>

            </div><!-- order-list-table -->

        </div> <!-- basket end. -->



        <div class="body-right">
            <div class="how-to-pay">
                <div class="helper"> <a href="javascript:void(0)"> help</a></div>
                <h2>Төлбөр  төлөлт</h2>
                <h5 class="advice-tooltip">Танд зөвлөе</h5>
                <div class="description">
                    <p>
                    Та үнэ бодуулсны дараа өөрийн сагсан дахь
                    барааг худалдан авах эсэхээ баталгаажуулсны
                    дараа төлбөр төлөлтийн дараах хэлбэрүүдээс
                    өөрт боломжтой хувилбарыг сонгох юм.</p>
                    <p>
                        <h6>1. <span>ОНЛАЙНААР :</span></h6>
                        Та онлайнаар шууд төлбөрөө хийж болно.
                        <br class="clear"/>
                        <img src="/images/bidmongol/images/paypal.png"/>
                            <div class="else">- Эсвэл -</div>

                        <h6>2. <span>БЭЛНЭЭР :</span></h6>
                        <p>Та манай оффис дээр ирж мөнгөө бэлнээр тушааж
                        болно.</p>

                        <h6>3. <span>ДАНСААР :</span></h6>
                        <p>
                           <strong>Голомт банк</strong><br/>
1905 0082 23₮<br/>
1905 0052 03$<br/><br/>

<strong>Хаан банк</strong><br/>
5075 0045 47₮<br/>
5085 0721 63$<br/><br/>

Гүйлгээний утга дээр захиалгын дугаар болон манай вэб дээр бүртгэлтэй өөрийн имэйл хаяг эсэл утасны дугаараа заавал бичиж өгөөрэй.<br/><br/>

Дээрх дансуудын аль нэгт төлбөрөө төлөөд бидэнд мэдэгдэнэ.<br/><br/>

Бид онлайнаар шалгаж үзээд гүйлгээ амжилттай хийгдсэний дараа таны захиалгыг эхлүүлнэ.<br/><br/>

Хэрэв банк хоорондын гүйлгээгээр төлбөрөө төлсөн бол тодорхой хугацааны дараа шилжүүлэг дансанд орох тул бид орж ирсэн үед таны захиалгыг эхлүүлнэ.<br/><br/>

Та бараагаа хүлээн автлаа шилжүүлгийн баримтаа үрэгдүүлэлгүй хадгална уу! 
                            
                            
                        </p>
                    </p>
                </div>
            </div><!-- how-top-pay end. -->

        </div><!-- body right end. -->
    </div><!-- order process body end. -->
</div><!-- validation end. -->
