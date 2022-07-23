<div class="layout-footer">
    <div class="layout-footer-body text-center">
        <small class="copyright">2018 &copy; Hallo</small>
    </div>
</div>
</div>
  <script src="{{asset('/Admin/js/jquery.min.js')}}"></script>
<script src="{{asset('/Admin/js/vendor.min.js')}}"></script>
    <script src="{{asset('/Admin/js/elephant.min.js')}}"></script>
    <script src="{{asset('/Admin/js/application.min.js')}}"></script>
    <script src="{{asset('/Admin/js/iEdit.js')}}"></script>
    <script src="{{asset('/Admin/js/profile.min.js')}}"></script>
    <script src="{{asset('/Admin/js/product.min.js')}}"></script>
    <script src="{{asset('/Admin/js/demo.min.js')}}"></script>
    <script src="{{asset('/Admin/js/multiselect-dropdown.js')}}"></script>

   
    <script type="text/javascript">
    $(window).load(function(){

      // For Driver Page
      if ( $('.profilePage').length ) {
        $('.sidenav-item').removeClass("active");
        $('.profilePageNav').addClass("active");
      }
      if ( $('.dashboardPage').length ) {
        $('.sidenav-item').removeClass("active");
        $('.dashboardPageNav').addClass("active");
      }
      if ( $('.userListPage').length ) {
        $('.sidenav-item').removeClass("active");
        $('.accNav-a').addClass("active");
        $('.accountNav').addClass("open");
        $('.accountNav ul').css("display","block");
      }
      if ( $('.restaurantPage').length ) {
        $('.sidenav-item').removeClass("active");
        $('.accNav-b').addClass("active");
        $('.accountNav').addClass("open");
        $('.accountNav ul').css("display","block");
      }
      if ( $('.rest-profilePage').length ) {
        $('.sidenav-item').removeClass("active");
        $('.accNav-b').addClass("active");
        $('.accountNav').addClass("open");
        $('.accountNav ul').css("display","block");
      }
      
      
      
    });
            $(window).scroll(function (){
                var window_top = $(window).scrollTop();
                var div_top = $('.tabs-new').position().top;
                console.log(window_top);
                console.log(div_top);
                if (window_top > div_top) {
                    $('.tabs-new').addClass('stick');
                    $('.tabs-new').parents('.layout-content-body').removeClass('layout-content-body').addClass('layout-content-body-dummy');
                } else {
                    $('.tabs-new').parents('.layout-content-body').removeClass('layout-content-body-dummy').addClass('layout-content-body')
                }
                if ( window_top < 74 ) {
                  $('.tabs-new').removeClass('stick');
                }
            });

    </script>
  </body>
</html>