/*
  @anchor CanWong
  @date 2017-09-01
*/
function ajaxdelete(url) {
	$('.delete').click(function(){
    var id = $(this).attr('title');
    new PNotify({
      text:'<h2>Are you sure?</h2>',
      styling:'bootstrap3',
      delay:5000,
      confirm:{
        confirm:true,
        buttons:[
          {
            text:'Sure',
            addClass:'btn-danger btn-round',
            promptTrigger: true,
            click:function(){
              $.ajax({
                url:url,
                type:'post',
                data:'id='+id,
                success:function(response){
                  new PNotify({
                    text:response.msg,
                    type:response.code==1?'success':'',
                    styling:'fontawesome'
                  });
                  /*倒数三秒刷新*/
                  setTimeout("location.reload()",3000);
                },
                error:function(){
                  new PNotify({
                    text:'Opps~something went wrong',
                    type:'error',
                    styling:'fontawesome'
                  })
                }
              })
            }
          },
          {
            text:'Cancle',
            addClass:'btn-info btn-round',
            click:function(notice){
              notice.remove();
            }
          }
        ],
      }
    });
  })
};

function ajaxsubmit(url,form_id = '.ajax-form') {
    var formdata = new FormData($(form_id)[0]);
    $.ajax({
        url: url,
        type: 'post',
        data: formdata,
        cache: false,
        processData: false,
        contentType: false,
        success: function(response) {
            new PNotify({
                text: response.msg,
                type: response.code == 1 ? 'success' : '',
                styling: 'fontawesome'
            });
            setTimeout("location.reload()", 3500);
        },
        error: function(data) {
            new PNotify({
                text: 'Fail to Ajax submit:'+data,
                type: 'error',
                styling: 'fontawesome'
            })
        }
    })
}