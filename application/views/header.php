<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
	<script src="<?php echo base_url();?>js/jquery-3.1.0.min.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
 
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <!--  <a class="navbar-brand" href="#"><img src="images/logo.png" alt="logo" width="80" ></a> -->
        </div>
        
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="site_url('Home/index')">Рестораны</a></li>
            <li ><a href="site_url('Home/index')">Кинотевтры</a></li>
            <li ><a href="site_url('Home/index')">Ночные клубы</a></li> 
            <li ><a href="site_url('Home/index')">Форум</a></li> 
            <li ><a href="site_url('Home/index')">Карта</a></li> 

          </ul>
           <button id="chat"  class="btn btn-success" data-toggle="modal" data-target="#myModal" >Чат</button>
          <form class="navbar-form navbar-right" role="form" method="post">
            <div class="form-group">
              <input type="text"  name="login" placeholder="Login" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="pass" placeholder="Password"  class="form-control">
            </div>
            <button type="submit" class="btn btn-success" name="vhod">Войти</button>
          </form>

        </div><!--/.navbar-collapse -->
      </div>
</div>
<!-- чат -->
<!-- Modal -->
<div class="modal fade" role="dialog" id="mymodal">
  
  <div class="modal-dialog">
    
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header" style="padding:35px 50px;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
          
    </div>
    <div class="modal-body" style="padding:40px 50px;">
      <div id="msglist" name="msglist">
      </div>
      <form role="form" method="post">
        <label for="msg">Message</label>
        <input type="text" id="msg" name="msg">
        <input type="submit" value="send" id="send" name="send">
      </form>
      
      <div class="modal-footer">
      
      </div>
    </div>
  </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    function show_mess(){
      $.ajax({url:"<?php echo base_url();?>index.php/locations/getMessages/",
      type:"post",
      success:function(data){
        console.log('date=');
        $('#msglist').html(data);
      }});
    }
    $('#chat').click(function(){
      show_mess();
      $('#mymodal').modal('show');
      return false;
    });
    $('#send').click(function(){
      msg=$('#msg').val();
      //alert('msg='+msg);
      $.ajax({
        url:"<?php echo base_url();?>index.php/locations/sendMessage/"+msg,
        type:'post',
        success:function(data){
          show_mess();
          // $('#mymodal').modal('show');
        },
        error:function(){
          alert('error');
        }
      });
      return false;
    });
  
  });
</script>