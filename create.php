<?php 
	
	require_once 'includes/header.php'; 
	require_once 'classes/entry.php';

	if (isset($_POST['publishing'])) {

		$entry = new Entry();
		$entry->creatNewformPOST($_POST);
		$entry->sqlInsertEntry();
?>
	<a href="single.php?entry_id= <?php echo $entry->getId(); ?>">已成功發表文章，查看最新發文</a>
<?php
	}
	?>
				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2> 管理者後台發文系統</h2>
										<p></p>
									</div>
								</header>
								<div id="create_form">
									<form action="create.php" method="POST">

									<label for="">Title</label>
									<input type="text" name="entry_title" id="title" />

									<label for="">Author</label>
									<input type="text" name="entry_author" id="author" />

									<label for="">Excerpt</label>
									<textarea name="entry_excerpt" id="title" cols="30" rows="10"></textarea>

									<label for="">Content</label>
									<textarea name="entry_content" id="title" cols="30" rows="10"></textarea>

									<input type="hidden" name="publishing" />

									<input type="submit" name="submit" id="submit" value="Publish" />
									</form>
								</div>
								<footer>
									<ul class="stats">
										<li><a href="#">General</a></li>
										<li><a href="#" class="icon fa-heart">28</a></li>
										<li><a href="#" class="icon fa-comment">128</a></li>
									</ul>
								</footer>
							</article>

					</div>
					
	<?php require_once 'includes/footer.php'; ?>