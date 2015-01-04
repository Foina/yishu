(function($) {
    var checkInput = function (inputID) {
        var the_input = $('#' + inputID);
        var prev_parent = the_input.parent().parent('.control-group');
        var next_span = the_input.next();
        if ($.trim(the_input.val()) == '') {
            prev_parent.addClass('error');
            next_span.html('please input');
            return false;
        } else {
            prev_parent.removeClass('error');
            next_span.html('');
        }
        
        return true;
    };
  
    $('#loginBtn').click(function(e) {
        e.preventDefault();
        var email = $('#inputEmail');
        var password = $('#inputPassword');
        var email_val = $.trim(email.val());
        var password_val = $.trim(password.val());
        
        if (checkInput('inputEmail') && checkInput('inputPassword')) {
            $.post(SITE_URL + 'signin/auth', $('#SigninForm').serialize(), function (response) {
                    if (response.success) {
                        alert('login success');
                        window.location.href = SITE_URL;
                    } else {
                        email.parent().parent('.control-group').addClass('error');
                        email.next().html(response.errors);
                        return false;
                    }
            }, 'json');
        }
    });
    
    $('#registerBtn').click(function(e) {
        e.preventDefault();
        var username= $('#inputname');
        var password = $('#inputpd');
         var email = $('#inputEm');
        
        if (checkInput('inputname') && checkInput('inputpd') && checkInput('inputEm')) {
            $.post(SITE_URL + 'signup/auth', $('#SignupForm').serialize(), function (response) {
                    if (response.success) {
                        alert('registe success');
                        window.location.href = SITE_URL;
                    } else {
                        $.each(response.errors, function(key, value) {
                            var selector = "[name=" + key + "]";
                            var controls = $(selector).closest('.controls');
                            var help = controls.children('.help-inline');
                            help == 'undefined' ? help = $('<span class="help-inline"></span>') : help;
                            help.appendTo(controls);
                            help.html(value);
                            controls.parent('.control-group').addClass('error');
                        });
                        return false;
                    }
            }, 'json');
        }
    });
  //创建文章js验证 
  /*
   $('#create_article').click(function(e){
            e.preventDefault();
            var title=$('#title');
            if(checkInput('title')){
                $.post(SITE_URL+'create/ArticleCreate',$('#article_form').serialize(),function(response){
                    if(response.success){
                        alert('success');
                        window.location.href=SITE_URL+'create/ArticleList';
                    }else{
                            title.parent().parent('.control-group').addClass('error');
       
                        
                    }
                },'json');
            }
   });
   */
  //创建图书js验证
  /*
  $('#create_book').click(function(e){
            e.preventDefault();
            var image=$('#upload');
            var bookname=$('#bookname');
            if( checkInput('bookname')){
                    $.post(SITE_URL+'create',$('#book_form').serialize(),function(response){
                        if(response.success){
                            alert('success');
                            window.location.href=SITE_URL+'create/BookList';
                        }else{
                                bookname.parent().parent('.control-group').addClass('error');
                        }
                    },'json');
            }
  });
  */
  $('.deletearticle').click(function() {
    var btn = $(this);
 $.get(SITE_URL + 'delete/Article/' + btn.attr('data-id') , function(resp) {
   if (resp.success) {
    alert('删除成功');
   window.location.href = SITE_URL+'create/BookList';
  } else {
    alert('失败');
  }

 }, 'json');

});

$('.deletebook').click(function() {
    var btn = $(this);
 $.get(SITE_URL + 'delete/Book/' + btn.attr('data-id') , function(resp) {
   if (resp.success) {
    alert('删除成功');
   window.location.href = SITE_URL+'create/BookList';
  } else {
    alert('失败');
  }

 }, 'json');

});
/*
 $('#update_article').click(function(e) {
 e.preventDefault();
            var title=$('#title');
 if(checkInput('title')){
                $.post(SITE_URL+'edit/Article',$('#article_edit_form').serialize(),function(response){
                    if(response.success){
                        alert('success');
                        window.location.href=SITE_URL+'create/ArticleList';
                    }else{
                            title.parent().parent('.control-group').addClass('error');
       
                        
                    }
                },'json');
            }

});
*/
   
      $(function(){
     $('.search-query').blur(function() {  //设置失去焦点时的方法，让文本框变短
    $(this).animate({width: "156"}, 300 );
   });
   $('.search-query').focus(function() {  //设置获得焦点时的方法，让文本框变长
    $(this).animate({width: "215"}, 300 );  
    $(this).val(''); //用于清空内容，可选操作
   });
});


$('#searchForm').submit(function(e) {
 e.preventDefault();
    var val = $.trim($('#searchBtn').val());
    if ('' == val) {
        alert('input keyowrd please.');
        $('#searchBtn').focus();
        return false;
    }
    window.location = '/cms/search/' + encodeURI(val);
});

$("[rel='tooltip']").tooltip({placement:'right'});
$("[rel='tooltipview']").tooltip({placement:'right'});

$('#myTab').find('li').click(function() {
$(this).addClass("active");
});

$('#navbar').affix();

$(function () {
    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
    $('.tree li.parent_li > span').on('click', function (e) {
        var children = $(this).parent('li.parent_li').find(' > ul > li');
        if (children.is(":visible")) {
            children.hide('fast');
            $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
        } else {
            children.show('fast');
            $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
        }
        e.stopPropagation();
    });
});
$('#myModal').modal('show');  

})(jQuery);