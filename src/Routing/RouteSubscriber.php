<?php
// https://www.drupal.org/docs/8/api/routing-system/altering-existing-routes-and-adding-new-routes-based-on-dynamic-ones

namespace Drupal\group_workflow\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    if ($route = $collection->get('entity.node.workflow_history')) {
      $route->setRequirement('_group_workflow_access_check', 'true');
    }
  }
}