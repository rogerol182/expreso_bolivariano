<?php
/**
* @file
* Contains \Drupal\forcontu_pages\Controller\ForcontuPagesController.
*/
namespace Drupal\forcontu_pages\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\user\UserInterface;
//use Drupal\Core\Render\RendererInterface;
//use Symfony\Component\DependencyInjection\ContainerInterface;

class ForcontuPagesController extends ControllerBase {

	/*protected $renderer;
	
	public function __construct(RendererInterface $renderer) {
		$this->renderer = $renderer;
	}*/
	
	/*Parametro Simple*/
	public function simple() {
		
		return [
		      '#theme' => 'my_template',
		      '#test_var' => $this->t('Test Value'),
		    ];
	}
	
	/*Parametro Usuario*/
	public function user(UserInterface $user) {
		$list[] = $this->t("Username: @username",
		array('@username' => $user->getAccountName()));
		$list[] = $this->t("Email: @email",
		array('@email' => $user->getEmail()));
		$list[] = $this->t("Roles: @roles",
		array('@roles' => implode(', ', $user->getRoles())));
		$list[] = $this->t("Last accessed time: @lastaccess",
		array('@lastaccess' => \Drupal::service('date.formatter')->format($user->getLastAccessedTime(), 'short')));
		$output['forcontu_pages_user'] = array(
			'#theme' => 'item_list',
			'#items' => $list,
			'#title' => $this->t('User data:'),
		);
		return $output;
	}
	/*render
	public function render() {
		$build['item_dimensions'] = [
			'#theme' => 'forcontu_pages_simple',
			'#length' => 12,
			'#width' => 8,
			'#height' => 24,
		];
	return $build;
	}

	return $this->renderer->render($build);*/
	
}
