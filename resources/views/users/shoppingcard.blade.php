@extends("index")

@section("shoppingcard")


<div id="dialog-notify-box" class="dialog-shopping-card">

    <p class="dialog_title"> Giỏ hàng</p> <br /><br />
    <a href="#" class="close"><img src="{{ asset('public/img/close.png') }}" class="img-close" title="Close Window" alt="Close" /></a>
    <div class="login-content" style="height: 90%; margin: 0 auto;">
    <form>
        <table class="responstable">
          <tbody>
              <tr>
                <th style="width: 100px; text-align: center;">Lọai sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th style="width: 100px; text-align: center;">Thời gian đặt</th>
                <th style="width: 80px; text-align: center;">Kích thước</th>
                <th style="width: 80px; text-align: center">Ðặt hàng</th>
              </tr>
              @foreach($shopping_card_data as $data)
              <tr>
                <td>{{$data->type_product}}</td>
                <td>{{$data->name_product}}</td>
                <td>{{$data->datetime}}</td>
                <td>{{$data->size}} KB</td>
                <td> <input type="checkbox" name="check_element" style="margin-left: 30px;"></td>
              </tr>
              @endforeach
            </tbody>

        </table>
        <ul id="pagination-flickr">
           <li class="previous-off">«Previous</li>
           @for($i=1; $i<= $shopping_card_data ->lastPage();$i=$i+1)
           <li><a href="{{ str_replace('/?','?',$shopping_card_data ->url($i))}}">{!!$i!!}</a></li>
            @endfor
           <li class="next"><a href="#">Next »</a></li>

        </ul>
        <div style="float: right;margin-right: 30px;">
            <button class="" type="button" id="checkAll" onclick="allchecked();"  style="background-color: #ffffff; height: 30px;">Tích tất cả</button>
            <button class="" type="button" id="unCheckAll"  onclick="allunchecked();" style="height: 30px;background-color: #ffffff;">Bỏ tích tất cả</button>
            <button class="" type="button" style="height: 30px;background-color: #ffffff;">Xóa giỏ hàng</button>
        </div>

        <button class="button submit-button" type="button"  style="margin-top: 40px; margin-left: -150px;">Ðặt hàng</button>
    </form>
    </div>



</div>

<script type="text/javascript">

        $('#dialog-notify-box').fadeIn("slow");

        $('body').append('<div id="over"></div>');
        $('#over').fadeIn(300);


</script>
<script language="JavaScript">
    var check_element=document.getElementsByName('check_element');
     for (var i=0,n=check_element.length;i<n;i++){
          check_element[i].id='check_element['+i+']';
          }
    function allchecked(){
        checkboxes=document.getElementsByName('check_element');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked =true;
            }

    }
    function allunchecked(){
            checkboxes=document.getElementsByName('check_element');
                for(var i=0, n=checkboxes.length;i<n;i++) {
                    checkboxes[i].checked =false;
                }

        }
</script>
@stop



