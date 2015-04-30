    <!-- Base JavaScript -->
    <script src="assets/js/base/jquery.min.js"></script>
    <script src="assets/js/base/smoothscroll.js"></script>
    <script src="assets/js/base/jquery.form.js"></script>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap/bootstrap.js"></script>

    <!-- JQuery UI Tabs JavaScript -->
    <script src="assets/js/base/jquery-ui.js"></script>
	
    <!-- Bootstrap Form Helpers -->
    <link href="assets/js/bootstrap-form-helpers/bootstrap-formhelpers.js"></script>
    <link href="assets/js/bootstrap-form-helpers/bootstrap-formhelpers-colorpicker.js"></script>    
    <link href="assets/js/bootstrap-form-helpers/bootstrap-formhelpers-datepicker.js"></script>

    <!-- Base JavaScript -->
    <script src="assets/js/base/offcanvas.js"></script>
    <script src="assets/js/base/scripts.js"></script>

    <!-- PACE JavaScript -->
    <script src="assets/js/pace/pace.min.js"></script>

    <!-- InstaClick JavaScript -->
    <script src="assets/js/instantclick/instantclick.min.js" data-no-instant></script>

    <!-- InstaClick Initialization-->
    <script data-no-instant>
        InstantClick.init();
    </script>

    <!-- WOW JavaScript -->
    <script src="assets/js/wow/wow.js"></script>

    <!-- WOW Initialization-->
    <script>
        new WOW().init();
    </script>

    <!-- Fade In Javascript -->
    <script>
        $(document).ready(function(){
            $("body").hide(0).delay(100).fadeIn(1000)
        });
    </script>
    
    <!-- Username Checking -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#user_username").keyup(function (e) {
                $(this).val($(this).val().replace(/\s/g, ''));
                var username = $(this).val();
                if(username.length < 1){$("#status").html('');return;}
                if(username.length >= 1){
                    $("#status").html('<img src="assets/img/ajax-loader.gif" />');
                    $.post('components/check-username-availability.php', {'user_username':username}, function(data) {
                      $("#status").html(data);
                    });
                }
            });	
        });
    </script>  

    <!-- Image Rotation -->
    <script type="text/javascript"> 
        var totalCount = 5;
        function ChangeIt() {
            var num =  Math.ceil( Math.random() * totalCount );
            document.body.background = 'assets/img/backgrounds/background'+num+'.jpg';
            document.body.style.backgroundRepeat = "repeat";
        }
    </script> 

    <!-- Search Form -->
    <script type="text/javascript">
        $(document).ready(function(){
            $(".search").keyup(function() {
                var searchbox = $(this).val();
                var dataString = 'searchword='+ searchbox;
                if(searchbox==''){
                }
                else{
                    $.ajax({
                        type: "POST",
                        url: "components/search.php",
                        data: dataString,
                        cache: false,
                        success: function(html){
                            $("#display").html(html).show();
                        }
                    });
                }return false;    
            });
        });
        jQuery(function($){
           $("#searchbox").Watermark("Search");
       });
    </script>

    <!-- Closing the Search Form when clicked outside it -->
    <script type="text/javascript">
        $(document).mouseup(function (e){
            var container = $("#display");
            if (!container.is(e.target) && container.has(e.target).length === 0){
                container.hide();
            }
        });
    </script>

    <!-- Image Upload Preview -->
    <script src="assets/js/base/jquery-1.8.0.min.js"></script>

    <!-- Avatar Upload Preview -->
    <script type="text/javascript">
        $(function(){
            $("#uploadFile").on("change", function(){
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file
                    reader.onloadend = function(){ // set image data as background of div
                        $("#uploadImagePreview").css("display","block");
                        $("#imagePreview").css("background-image", "url("+this.result+")");
                        $("#imagePreview").css("max-height","223px");    
                        $("#imagePreview").css("height","223px"); 
                    }
                }
            });
        });
    </script>

    <!-- Background Upload Preview -->
    <script type="text/javascript">
        $(function(){
            $("#uploadBackgroundFile").on("change", function(){
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file
                    reader.onloadend = function(){ // set image data as background of div
                        $("#uploadBackgroundImagePreview").css("display","block");
                        $("#imageBackgroundPreview").css("background-image", "url("+this.result+")");
                        $("#imageBackgroundPreview").css("max-height","223px");  
                        $("#imageBackgroundPreview").css("height","223px"); 
                    }
                }
            });
        });
    </script>

    <!-- Append -->
    <script type="text/javascript"> 
        ChangeIt();
    </script> 
    
    <script>
        $('.carousel').carousel({
          interval: 3500
        })
	</script>

    <script>
        $('#user_firstname').tooltip('toggle')
    </script>

    <!-- Load data on scroll down discover -->
    <script type="text/javascript">
        $(document).ready(function(){

            function last_msg_funtion() 
            { 

               var ID=$(".message_box_discover:last").attr("id");
                $('div#last_msg_loader_discover').html('<img src="../../assets/img/ajax-loader.gif">');
                $.post("controllers/tab/home-tab/discover_load/discover_user_load_data.php?action=get&last_msg_id="+ID,

                function(data){
                    if (data != "") {
                    $(".message_box_discover:last").after(data);			
                    }
                    $('div#last_msg_loader_discover').empty();
                });
            };  

            $(window).scroll(function(){
                if  ($(window).scrollTop() == $(document).height() - $(window).height()){
                   last_msg_funtion();
                }
            }); 

        });
	</script>

    <!-- Load data on scroll down viewed -->
    <script type="text/javascript">
        $(document).ready(function(){

            function last_msg_funtion() 
            { 

               var ID=$(".message_box_viewed:last").attr("id");
                $('div#last_msg_loader_viewed').html('<img src="../../assets/img/ajax-loader.gif">');
                $.post("controllers/tab/home-tab/viewed_load/viewed_user_load_data.php?action=get&last_msg_id="+ID,

                function(data){
                    if (data != "") {
                    $(".message_box_viewed:last").after(data);			
                    }
                    $('div#last_msg_loader_viewed').empty();
                });
            };  

            $(window).scroll(function(){
                if  ($(window).scrollTop() == $(document).height() - $(window).height()){
                   last_msg_funtion();
                }
            }); 

        });
	</script>

    <!-- Load data on scroll down history -->
    <script type="text/javascript">
        $(document).ready(function(){

            function last_msg_funtion() 
            { 

               var ID=$(".message_box_history:last").attr("id");
                $('div#last_msg_loader_history').html('<img src="../../assets/img/ajax-loader.gif">');
                $.post("controllers/tab/home-tab/history_load/history_user_load_data.php?action=get&last_msg_id="+ID,

                function(data){
                    if (data != "") {
                    $(".message_box_history:last").after(data);			
                    }
                    $('div#last_msg_loader_history').empty();
                });
            };  

            $(window).scroll(function(){
                if  ($(window).scrollTop() == $(document).height() - $(window).height()){
                   last_msg_funtion();
                }
            }); 

        });
	</script>

    <!-- Load data on scroll down following -->
    <script type="text/javascript">
        $(document).ready(function(){

            function last_msg_funtion() 
            { 

               var ID=$(".message_box_following:last").attr("id");
                $('div#last_msg_loader_following').html('<img src="../../assets/img/ajax-loader.gif">');
                $.post("controllers/tab/home-tab/following_load/following_user_load_data.php?action=get&last_msg_id="+ID,

                function(data){
                    if (data != "") {
                    $(".message_box_following:last").after(data);			
                    }
                    $('div#last_msg_loader_following').empty();
                });
            };  

            $(window).scroll(function(){
                if  ($(window).scrollTop() == $(document).height() - $(window).height()){
                   last_msg_funtion();
                }
            }); 

        });
	</script>

    <!-- Load data on scroll down follower -->
    <script type="text/javascript">
        $(document).ready(function(){

            function last_msg_funtion() 
            { 

               var ID=$(".message_box_follower:last").attr("id");
                $('div#last_msg_loader_follower').html('<img src="../../assets/img/ajax-loader.gif">');
                $.post("controllers/tab/home-tab/follower_load/follower_user_load_data.php?action=get&last_msg_id="+ID,

                function(data){
                    if (data != "") {
                    $(".message_box_follower:last").after(data);			
                    }
                    $('div#last_msg_loader_follower').empty();
                });
            };  

            $(window).scroll(function(){
                if  ($(window).scrollTop() == $(document).height() - $(window).height()){
                   last_msg_funtion();
                }
            }); 

        });
	</script>
