<div class="row">
	<div class="col-md-2" id="left-bar">
		
		<?php if(isset($_SESSION['auth']['admin'])): ?>
			<p style="margin: 10px 0 0 15px">Ви увійшли як <b>Адміністратор</b>, тепер Ви можете редагувати та видаляти записи</p>
			<a href="home/logout-User" class="btn btn-default">Вийти</a>
		<?php else:  ?>
			<form id="auth-form"  action="home/authUser" method="post">
				<p>Авторизація</p>
				<input type="text" name="login" id="login" maxlength="32" placeholder="Введіть логін">
				<input type="password" name="pass" id="pass" maxlength="32" placeholder="Введіть пароль">
				<button type="submit" class="btn btn-default" onclick="return check_form_auth()">Увійти</button>
			</form>
		<?php endif; ?>
	
		<a href="home/add-post" class="btn btn-default">Залишити відгук</a>
	</div>

	<div class="col-md-9">
	<?php if(count($data) > 0) : ?>
		<div class="table-responsive">
		 <table class="table table-hovers tablesorter" id="myTable">
		    
			<thead>
				<tr>
					<th>#</th>
					<th>Ім'я</th>
					<th>Відгук</th>
					<th>Email</th>
					<th>Сайт</th>
					<th>Дата</th>
					<?php if(isset($_SESSION['auth']['admin'])): ?>
						<th></th>
					<?php endif; ?>
				</tr>
			</thead>
			<tbody>
			<?php $id = 1;?>
			<?php foreach ($data as $post) : ?>
				<tr>
					<td><b><?php echo $id ?></b></td>
					<td><?php echo $post['name'] ?></td>
					<td><?php echo $post['text'] ?></td>
					<td><?php echo $post['email'] ?></td>
					<td><a href="<?php echo $post['site'] ?>" target="_blank"><?php echo $post['site'] ?></a></td>
					<td><?php echo $post['date'] ?></td>
					<?php if(isset($_SESSION['auth']['admin'])): ?>
						<td>
							<a href="home/edit-post/<?php echo $post['id']?>"><img src="<?=VIEW?>img/edit.png" width="24"></a>
							&nbsp;
							<a href="home/delete-post/<?php echo $post['id']?>"><img src="<?=VIEW?>img/delete.png" width="24"></a>
						</td>
					<?php endif; ?>
				</tr>
				<?php $id++; ?>
			<?php endforeach; ?>
			</tbody>
		  </table>
		  <div id="pager" class="pager">
			<form>
			Сортування: 
				<img src="<?=VIEW?>img/first.png" class="first"/>
				<img src="<?=VIEW?>img/prev.png" class="prev"/>
				<input type="text" class="pagedisplay form-control" />

				<img src="<?=VIEW?>img/next.png" class="next"/>
				<img src="<?=VIEW?>img/last.png" class="last"/>
				<select class="pagesize" style="display: none">
					<option selected="selected"  value="5">2</option>
				</select>
			</form>
		</div>
		</div>
	<?php else : ?>
		<div style="text-align: center">
			<br><br>
			<h2>Поки що не має відгуків</h2>
			<h3>Будь-ласка залишіть відгук</h3>
			<br>
			<a href="?view=add" class="btn btn-default">Залишити відгук</a>
		</div>
	<?php endif; ?>
	</div>
	<div class="col-md-1"></div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$("#myTable").tablesorter({
		sortList:[[5,1]],
		debug:true,
		widthFixed:true,
		headers:{
			0:{
				sorter:false
			},
			2:{
				sorter:false
			},
			4:{
				sorter:false
			},
			6:{
				sorter:false
			}
		}
	}).tablesorterPager({
		size:5,
		container:$('#pager'),
		cssNext:'.next',
		cssPrev:'.prev',
		cssFirst:'.first',
		cssLast:'.last',
	});
	
});

</script>
