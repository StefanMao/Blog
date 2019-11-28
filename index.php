<?php
require_once 'includes/header.php'; 

require_once 'classes/entry.php';

?>				<!-- Main -->
					<div id="main">
<?php 

$query = 'SELECT * FROM entries ORDER BY entry_id DESC LIMIT 7;';

require_once('classes/dbh.php');

$dbh = new Dbh();

$rows = $dbh->executeSelect($query);

//print_r($rows);

foreach ($rows as $row) {
	$entry = new Entry();

	$entry->setByRow($row);

?>
						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="single.php?entry_id=<?php echo $entry->getId(); ?>"><?php echo $entry->getTitle(); ?></a></h2>
									</div>
									<div class="meta">
										<time class="published"><?php echo $entry->getDate(); ?></time>
										<a href="#" class="author"><span class="name">><?php echo $entry->getAuthor(); ?></span><img src="images/maomao.jpg" alt="" /></a>
									</div>
								</header>
								<div class="excerpt">
								<?php echo $entry->getExcerpt(); ?>
								</div>
								<footer>
									<ul class="actions">
										<li><a href="single.php?entry_id=<?php echo $entry->getId(); ?>" class="button big">閱讀完整內容</a></li>
									</ul>
									<ul class="stats">
										<li><a href="#">General</a></li>
										<li><a href="#" class="icon fa-heart">28</a></li>
										<li><a href="#" class="icon fa-comment">128</a></li>
									</ul>
								</footer>
							</article>
<?php } ?>
				
						<!-- Pagination -->
							<ul class="actions pagination">
								<li><a href="" class="disabled button big previous">Previous Page</a></li>
								<li><a href="#" class="button big next">Next Page</a></li>
							</ul>

					</div>
					
						<!-- Posts List -->
							<section>
								<ul class="posts">
									<li>
										<article>
											<header>
												<h3><a href="single.php?entry_id=14"<?php echo $entry->getTitle() ; ?> /a></h3>
												
											</header>
											
										</article>
									</li>
								</ul>
							</section>

						<!-- About -->
							<section class="blurb">
								
							</section>

						<!-- Footer -->
							<section id="footer">
								
									<ul class="actions">
									<li><a href="index.php" class="button">Top</a></li>
									</ul>
			
							</section>

					</section>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>