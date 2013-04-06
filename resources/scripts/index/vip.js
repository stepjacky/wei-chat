/**
 * Created with JetBrains PhpStorm.
 * User: 饭
 * Date: 12-12-23
 * Time: 下午12:06
 * To change this template use File | Settings | File Templates.
 */

// 评论发表
function add_fund_comment()
{
    var content = $("#comment_content").val();
    if(!content==''){
        $.post('/comment/add_for_found',"content="+content,function(){
            alert('谢谢参与');
        });
    }
}