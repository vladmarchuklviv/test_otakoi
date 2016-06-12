<div class="row">
  
  <div class="col-md-1" id="left-bar">
  </div>
  <div class="col-md-10">
    <h3 style="text-align: center;">Будь ласка заповніть поля</h3>
    <form class="form-horizontal" method="post">
      <div class="form-group">
        <label class="control-label col-xs-3" for="name"><span class="star">*</span>Ім'я:</label>
        <div class="col-xs-6">
          <input type="text" class="form-control" id="name" name="name" placeholder="Введіть ім'я" value="<?php if(isset($data['name'])) echo $data['name']; ?>">
        </div>
        <div class="col-xs-2"></div>
      </div>
      <div class="form-group">
        <label class="control-label col-xs-3" for="text"><span class="star">*</span>Відгук:</label>
        <div class="col-xs-6">
          <textarea class="form-control" rows="5" id="text" name="text" placeholder="Введіть текст відгука" style="resize: none"><?php if(isset($data['text'])) echo $data['text']; ?></textarea>
        </div>
        <div class="col-xs-2"></div>
      </div>
      <div class="form-group">
        <label class="control-label col-xs-3" for="email"><span class="star">*</span>Email:</label>
        <div class="col-xs-6">
          <input type="email" class="form-control" id="email" name="email" placeholder="Введіть Email адресу" value="<?php if(isset($data['email'])) echo $data['email']; ?>">
        </div>
        <div class="col-xs-2"></div>
      </div>
      <div class="form-group">
        <label class="control-label col-xs-3" for="site">Сайт:</label>
        <div class="col-xs-6">
          <input type="text" class="form-control" id="site" name="site" placeholder="Введіть назву сайта" value="<?php if(isset($data['site'])) echo $data['site']; ?>">
        </div>
        <div class="col-xs-2"></div>
      </div> 
      <input type="hidden" name="ip" value="<?php echo $_SERVER["REMOTE_ADDR"]; ?>"> 
      <input type="hidden" name="browser" value="<?php echo $_SERVER["HTTP_USER_AGENT"]; ?>"> 

      <?php if(!isset($_SESSION['auth']['admin'])) : ?>
      <div class="form-group">
        <label class="control-label col-xs-3" for="captcha"><span class="star">*</span>Первірка:</label>
        <div class="col-xs-6">
          <img src = "../<?php echo VIEW ?>captcha/captcha.php" />
          <br>
          <input type="text" class="form-control" name="captcha" id="captcha" placeholder="Введіть текст з картинки" />
        </div>
        <div class="col-xs-2"></div>
      </div>
    <?php endif; ?>


      <br />
      <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
          <input type="submit" class="btn btn-primary" value="Додати" onclick="return 1check_form_add()">
          <input type="reset" class="btn btn-default" value="Очистити">
        </div>
      </div>
    </form>

</div>

<div class="col-md-1"></div>
</div>
