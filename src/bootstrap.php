<?php
require_once 'Autoloader.php';

spl_autoload_register(array('Autoloader', 'autoload'));

/*function deleteArticle(Article $article) {
	if ($this->getAuthUser()->access('delete')) {
			$article->delete();
                        $article->votes++;
	} else {
			throw new Exception_Unauthorized();
	}
}

/**
 * @expects Exception_Unauthorized
 *
function testDeleteArticleUnauthorized() {
	$object->setUnautorizedUser();
	$article = new Article;
	$object->deleteArticle($article, 3);
}
*/